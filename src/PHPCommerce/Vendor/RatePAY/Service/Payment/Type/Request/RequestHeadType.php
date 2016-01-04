<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Request;
use JMS\Serializer\Annotation\SerializedName;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\CredentialType;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\OperationType;

class RequestHeadType {
    /**
     * Name or IP address of the sending system
     * @var string
     * @SerializedName("system-id")
     */
    protected $systemId;

    /**
     * @var string
     * @SerializedName("transaction-id")
     */
    protected $transactionId;

    /**
     * @var string
     * @SerializedName("transaction-short-id")
     */
    protected $transactionShortId;

    /**
     * Name of the RatePAY operation
     * @var string
     */
    protected $operation;

    /**
     * @var CredentialType
     */
    protected $credential;

    /**
     * @var CustomerDeviceType
     * @SerializedName("customer-device")
     */
    protected $customerDevice;

    /**
     * @var ExternalType
     */
    protected $external;

    /**
     * @var MetaType
     */
    protected $meta;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getSystemId()
    {
        return $this->systemId;
    }

    /**
     * @param string $systemId
     * @return RequestHeadType
     */
    public function setSystemId($systemId)
    {
        $this->systemId = $systemId;
        return $this;
    }

    /**
     * @return OperationType
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param OperationType $operation
     * @return RequestHeadType
     */
    public function setOperation(OperationType $operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return CredentialType
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param CredentialType $credential
     * @return RequestHeadType
     */
    public function setCredential(CredentialType $credential)
    {
        $this->credential = $credential;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return RequestHeadType
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionShortId()
    {
        return $this->transactionShortId;
    }

    /**
     * @param string $transactionShortId
     * @return RequestHeadType
     */
    public function setTransactionShortId($transactionShortId)
    {
        $this->transactionShortId = $transactionShortId;
        return $this;
    }

    /**
     * @return CustomerDeviceType
     */
    public function getCustomerDevice()
    {
        return $this->customerDevice;
    }

    /**
     * @param CustomerDeviceType $customerDevice
     * @return RequestHeadType
     */
    public function setCustomerDevice($customerDevice)
    {
        $this->customerDevice = $customerDevice;
        return $this;
    }

    /**
     * @return ExternalType
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * @param ExternalType $external
     * @return RequestHeadType
     */
    public function setExternal($external)
    {
        $this->external = $external;
        return $this;
    }

    /**
     * @return MetaType
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param MetaType $meta
     * @return RequestHeadType
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }
}