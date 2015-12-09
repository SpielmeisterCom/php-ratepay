<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class ResponseHeadType {
    const RESPONSE_TYPE_STATUS_RESPONSE     = 'PAYMENT_STATUS_RESPONSE';

    const RESPONSE_TYPE_PAYMENT_PRODUCTS    = 'PAYMENT_PRODUCTS';

    const RESPONSE_TYPE_PAYMENT_PERMISSION  = 'PAYMENT_PERMISSION';

    const RESPONSE_TYPE_STATUS_ERROR        = 'STATUS_ERROR';

    /**
     * @var string
     * @SerializedName("system-id")
     * @Type("string")
     */
    protected $systemId;

    /**
     * @var string
     * @SerializedName("transaction-id")
     * @Type("string")
     */
    protected $transactionId;

    /**
     * @var string
     * @SerializedName("transaction-short-id")
     * @Type("string")
     */
    protected $transactionShortId;

    /**
     * @var string
     * @Type("string")
     */
    protected $operation;

    /**
     * @var string
     * @SerializedName("response-type")
     * @Type("string")
     */
    protected $responseType;

    /**
     * @var ExternalType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ExternalType")
     */
    protected $external;

    /**
     * @var ProcessingType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ProcessingType")
     */
    protected $processing;

    /**
     * @return string
     */
    public function getSystemId()
    {
        return $this->systemId;
    }

    /**
     * @param string $systemId
     */
    public function setSystemId($systemId)
    {
        $this->systemId = $systemId;
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
     */
    public function setTransactionShortId($transactionShortId)
    {
        $this->transactionShortId = $transactionShortId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param string $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseType()
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;
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
     */
    public function setExternal(ExternalType $external)
    {
        $this->external = $external;
        return $this;
    }

    /**
     * @return ProcessingType
     */
    public function getProcessing()
    {
        return $this->processing;
    }

    /**
     * @param ProcessingType $processing
     */
    public function setProcessing(ProcessingType $processing)
    {
        $this->processing = $processing;
        return $this;
    }


}