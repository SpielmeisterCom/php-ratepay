<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class PaymentResponseType {
    /**
     * Customer's chosen payment method
     * @XmlAttribute
     * @var string
     * @Type("string")
     */
    protected $method;

    /**
     * Payment Currency
     * @XmlAttribute
     * @var string
     * @Type("string")
     */
    protected $currency;


    /**
     * Amont to be paid by the customer
     * @var float
     * @Type("double")
     */
    protected $amount;

    /**
     * @var InstallmentDetailsType
     * @SerializedName("installment-details")
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\InstallmentDetailsType")
     */
    protected $installmentDetails;

    /**
     * Descriptor (narrative) to identify the transaction on documents and bank transfers
     * (German: "Verwendungszweck")
     * @var string
     * @Type("string")
     */
    protected $descriptor;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return InstallmentDetailsType
     */
    public function getInstallmentDetails()
    {
        return $this->installmentDetails;
    }

    /**
     * @param InstallmentDetailsType $installmentDetails
     */
    public function setInstallmentDetails($installmentDetails)
    {
        $this->installmentDetails = $installmentDetails;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    /**
     * @param string $descriptor
     */
    public function setDescriptor($descriptor)
    {
        $this->descriptor = $descriptor;
        return $this;
    }
}