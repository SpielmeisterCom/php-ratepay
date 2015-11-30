<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

class RatepayConfiguration
{
    /**
     * @var
     */
    protected $gatewayRequestSystemVersion;

    protected $gatewayRequestSystemName;

    protected $gatewayRequestCredentialSecuritycode;

    protected $gatewayRequestCredentialProfileId;

    protected $gatewayRequestSystemId;

    protected $gatewayUrl;

    protected $loggingPath;

    /**
     * @return mixed
     */
    public function getGatewayRequestSystemVersion()
    {
        return $this->gatewayRequestSystemVersion;
    }

    /**
     * @param mixed $gatewayRequestSystemVersion
     */
    public function setGatewayRequestSystemVersion($gatewayRequestSystemVersion)
    {
        $this->gatewayRequestSystemVersion = $gatewayRequestSystemVersion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayRequestSystemName()
    {
        return $this->gatewayRequestSystemName;
    }

    /**
     * @param mixed $gatewayRequestSystemName
     */
    public function setGatewayRequestSystemName($gatewayRequestSystemName)
    {
        $this->gatewayRequestSystemName = $gatewayRequestSystemName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayRequestCredentialSecuritycode()
    {
        return $this->gatewayRequestCredentialSecuritycode;
    }

    /**
     * @param mixed $gatewayRequestCredentialSecuritycode
     */
    public function setGatewayRequestCredentialSecuritycode($gatewayRequestCredentialSecuritycode)
    {
        $this->gatewayRequestCredentialSecuritycode = $gatewayRequestCredentialSecuritycode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayRequestCredentialProfileId()
    {
        return $this->gatewayRequestCredentialProfileId;
    }

    /**
     * @param mixed $gatewayRequestCredentialProfileId
     */
    public function setGatewayRequestCredentialProfileId($gatewayRequestCredentialProfileId)
    {
        $this->gatewayRequestCredentialProfileId = $gatewayRequestCredentialProfileId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayRequestSystemId()
    {
        return $this->gatewayRequestSystemId;
    }

    /**
     * @param mixed $gatewayRequestSystemId
     */
    public function setGatewayRequestSystemId($gatewayRequestSystemId)
    {
        $this->gatewayRequestSystemId = $gatewayRequestSystemId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayUrl()
    {
        return $this->gatewayUrl;
    }

    /**
     * @param mixed $gatewayUrl
     */
    public function setGatewayUrl($gatewayUrl)
    {
        $this->gatewayUrl = $gatewayUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoggingPath()
    {
        return $this->loggingPath;
    }

    /**
     * @param mixed $loggingPath
     */
    public function setLoggingPath($loggingPath)
    {
        $this->loggingPath = $loggingPath;
        return $this;
    }


}