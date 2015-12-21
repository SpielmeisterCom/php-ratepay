<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\PhoneType;

class ContactsType {
    /**
     * Customer’s email address
     * @var string
     */
    protected $email;

    /**
     * @var PhoneType
     */
    protected $phone;

    /**
     * @var PhoneType
     */
    protected $fax;

    /**
     * @var PhoneType
     */
    protected $mobile;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return PhoneType
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param PhoneType $phone
     */
    public function setPhone(PhoneType $phone = null)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return PhoneType
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param PhoneType $fax
     */
    public function setFax(PhoneType $fax = null)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return PhoneType
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param PhoneType $mobile
     */
    public function setMobile(PhoneType $mobile = null)
    {
        $this->mobile = $mobile;
        return $this;
    }


}