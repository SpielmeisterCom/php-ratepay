<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class PaymentType {
    const METHOD_INVOICE = 'INVOICE';

    const METHOD_INSTALLMENT = 'INSTALLMENT';

    const METHOD_ELV = 'ELV';

    const METHOD_PREPAYMENT = 'PREPAYMENT';

    const CURRENCY_EUR = 'EUR';

    const CURRENCY_USD = 'USD';

    const CURRENCY_GBP = 'GBP';

    const CURRENCY_CHF = 'CHF';

    const CURRENCY_JPY = 'JPY';

    const CURRENCY_AUD = 'AUD';

    const CURRENCY_RUB = 'RUB';

    const CURRENCY_CAD = 'CAD';

    const DEBIT_PAY_TYPE_DIRECT_DEBIT = 'DIRECT-DEBIT';

    const DEBIT_PAY_TYPE_BANK_TRANSFER = 'BANK-TRANSFER';

    /**
     * Customer's chosen payment method
     * @XmlAttribute
     * @var string
     */
    protected $method;

    /**
     * Payment Currency
     * @XmlAttribute
     * @var string
     */
    protected $currency;

    /**
     * Amont to be paid by the customer
     * @var float
     */
    protected $amount;

    /**
     * @var InstallmentDetailsType
     * @SerializedName("installment-details")
     */
    protected $installmentDetails;

    /**
     * @var string
     * @SerializedName("debit-pay-type")
     */
    protected $debitPayType;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setInstallmentDetails($installmentDetails)
    {
        $this->installmentDetails = $installmentDetails;
        return $this;
    }

    /**
     * @return string
     */
    public function getDebitPayType()
    {
        return $this->debitPayType;
    }

    /**
     * @param string $debitPayType
     * @return $this
     */
    public function setDebitPayType($debitPayType)
    {
        $this->debitPayType = $debitPayType;
        return $this;
    }
}