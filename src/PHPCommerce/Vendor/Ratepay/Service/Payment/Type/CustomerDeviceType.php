<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;
use JMS\Serializer\Annotation\SerializedName;

class CustomerDeviceType
{
    /**
     * @SerializedName("device-token")
     * @var string
     */
    protected $deviceToken;

    /**
     * @return string
     */
    public function getDeviceToken()
    {
        return $this->deviceToken;
    }

    /**
     * @param string $deviceToken
     */
    public function setDeviceToken($deviceToken)
    {
        $this->deviceToken = $deviceToken;
        return $this;
    }
}