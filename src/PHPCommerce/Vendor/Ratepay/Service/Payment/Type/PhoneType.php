<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;
use JMS\Serializer\Annotation\SerializedName;

class PhoneType {
    /**
     * Area code of phone number.
     * @var string
     * @SerializedName("area-code")
     */
    protected $areaCode;

    /**
     * Direct dial of phone number. If a distinction
     * between the area code and direct dial is not
     * possible, the complete phone number may be
     * entered in the direct dial field
     * @var string
     * @SerializedName("direct-dial")
     */
    protected $directDial;

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param string $areaCode
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirectDial()
    {
        return $this->directDial;
    }

    /**
     * @param string $directDial
     */
    public function setDirectDial($directDial)
    {
        $this->directDial = $directDial;
        return $this;
    }
}