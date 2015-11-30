<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;
use JMS\Serializer\Annotation\SerializedName;

class BankAccountType {
    /**
     * Name of bank accountholder
     * @var string
     */
    protected $owner;

    /**
     * Bank account number
     * @var string
     * @SerializedName("bank-account-number")
     */
    protected $bankAccountNumber;

    /**
     * Bank's name
     * @var string
     * @SerializedName("bank-name")
     */
    protected $bankName;

    /**
     * National bank code (German: Bankleitzahl, BLZ)
     * @var string
     * @SerializedName("bank-code")
     */
    protected $bankCode;

    /**
     * International bank account number
     * @var string
     */
    protected $iban;

    /**
     * Ineratnional bank identifier code
     * @var string
     * @SerializedName("bic-swift")
     */
    protected $bicSwift;

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * @param string $bankAccountNumber
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getBicSwift()
    {
        return $this->bicSwift;
    }

    /**
     * @param string $bicSwift
     */
    public function setBicSwift($bicSwift)
    {
        $this->bicSwift = $bicSwift;
    }
}