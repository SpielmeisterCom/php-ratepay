<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;
use JMS\Serializer\Annotation\SerializedName;

class CredentialType {

    /**
     * @var string
     * @SerializedName("profile-id")
     */
    protected $profileId;

    /**
     * @var string
     */
    protected $securitycode;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param mixed $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecuritycode()
    {
        return $this->securitycode;
    }

    /**
     * @param mixed $securitycode
     */
    public function setSecuritycode($securitycode)
    {
        $this->securitycode = $securitycode;
        return $this;
    }
}