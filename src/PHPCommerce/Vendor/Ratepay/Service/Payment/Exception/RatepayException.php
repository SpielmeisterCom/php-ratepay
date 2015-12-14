<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Exception;

class RatepayException
{
    protected $reasonCode;

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param mixed $reasonCode
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
    }
}