<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers;

use Exception;

class SFTPClient {
    protected $hostname;

    protected $port;

    protected $username;

    protected $pubKeyFile;

    protected $privKeyFile;

    protected $connection;

    protected $sftpSession;

    public function __construct($hostname, $port, $username, $pubKeyFile, $privKeyFile) {
        $this->hostname = $hostname;
        $this->port = $port;
        $this->username = $username;
        $this->pubKeyFile = $pubKeyFile;
        $this->privKeyFile = $privKeyFile;
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function disconnect() {
        $this->connection = null;
    }

    public function connect() {
        $this->connection = @ssh2_connect($this->hostname, $this->port, array('hostkey'=>'ssh-rsa'));

        $fingerprint = ssh2_fingerprint($this->connection, SSH2_FINGERPRINT_SHA1 | SSH2_FINGERPRINT_HEX);

        if (!@ssh2_auth_pubkey_file($this->connection, $this->username, $this->pubKeyFile, $this->privKeyFile)) {
            throw new Exception("Authentification Failed");
        }

        $this->sftpSession = @ssh2_sftp($this->connection);

        if(!$this->sftpSession) {
            throw new Exception("Could not initialize SFTP subsystem.");
        }

    }

    protected function resolvePath($remoteFile) {
        if(substr($remoteFile, 0, 1) != '/') {
            //resolve relative path
            $absolutePath = @ssh2_sftp_realpath($this->sftpSession, ".");

            $remoteFile =  $absolutePath . '/' . $remoteFile;
        }

        return $remoteFile;
    }

    public function upload($localFile, $remoteFile) {
        $remoteFile = $this->resolvePath($remoteFile);
        $stream = @fopen("ssh2.sftp://" . $this->sftpSession . $remoteFile, 'w');

        if (!$stream) {
            throw new Exception("Could not open remote file: " . $remoteFile);
        }

        $localFileContent = @file_get_contents($localFile);
        if ($localFileContent === false) {
            throw new Exception("Could not open local file:" . $localFile);
        }

        if (@fwrite($stream, $localFileContent) === false)
            throw new Exception("Could not send data from file: " . $localFile);

        @fclose($stream);
    }

    public function delete($remoteFile){
        $remoteFile = $this->resolvePath($remoteFile);

        if(!@unlink("ssh2.sftp://" . $this->sftpSession . $remoteFile)) {
            throw new Exception("Could not unlink file: ".$remoteFile);
        }
    }

}