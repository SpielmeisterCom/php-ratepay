<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Exception;

class RatePAYException extends \Exception
{
    protected $reasonCode;

    protected $reasonDescription;

    protected $customerMessage;

    /**
     * @return mixed
     */
    public function getCustomerMessage()
    {
        return $this->customerMessage;
    }

    /**
     * @param mixed $customerMessage
     */
    public function setCustomerMessage($customerMessage)
    {
        $this->customerMessage = $customerMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * @param mixed $reasonDescription
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = $reasonDescription;
        return $this;
    }

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
        return $this;
    }
}