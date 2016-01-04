<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;


class ProcessingType {
    /**
     * @var DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.000'>")
     */
    protected $timestamp;

    /**
     * @var StatusType
     * @Type("PHPCommerce\Vendor\RatePAY\Service\Payment\Type\StatusType")
     */
    protected $status;

    /**
     * @var ResultType
     * @Type("PHPCommerce\Vendor\RatePAY\Service\Payment\Type\ResultType")
     */
    protected $result;

    /**
     * @var ReasonType
     * @Type("PHPCommerce\Vendor\RatePAY\Service\Payment\Type\ReasonType")
     */
    protected $reason;

    /**
     * @SerializedName("customer-message")
     * @var string
     * @Type("string")
     */
    protected $customerMessage;

    /**
     * @return DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return StatusType
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param StatusType $status
     */
    public function setStatus(StatusType $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return ResultType
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param ResultType $result
     */
    public function setResult(ResultType $result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return ReasonType
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(ReasonType $reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerMessage()
    {
        return $this->customerMessage;
    }

    /**
     * @param string $customerMessage
     */
    public function setCustomerMessage($customerMessage)
    {
        $this->customerMessage = $customerMessage;
        return $this;
    }
}