<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\Tests;

use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\SFTPClient;
use PHPUnit_Framework_TestCase;

class SFTPClientTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
    }

    public function testUpload() {
        $uploader = new SFTPClient(
            PAYMENT_HISTORY_UPLOAD_HOSTNAME,
            PAYMENT_HISTORY_UPLOAD_PORT,
            PAYMENT_HISTORY_UPLOAD_USERNAME,
            __DIR__ . '/../../../../../../../' . PAYMENT_HISTORY_UPLOAD_PUB_KEY_FILE,
            __DIR__ . '/../../../../../../../' . PAYMENT_HISTORY_UPLOAD_PRIV_KEY_FILE
        );

        $uploader->connect();


        $tmpfname = tempnam("/tmp", "FOO");

        $handle = fopen($tmpfname, "w");
        fwrite($handle, "some random data");
        fclose($handle);


        //force relative path
        $remoteFile = time() . ".txt";

        $uploader->upload($tmpfname, $remoteFile);

        $uploader->delete($remoteFile);
        unlink($tmpfname);


        //$uploader->upload();
    }
}