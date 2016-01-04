<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;

use DateTime;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\ContactsType;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class CustomerType {
    const GENDER_MALE = 'M';

    const GENDER_FEMALE = 'F';

    const GENDER_UNKNOWN = 'U';

    /**
     * Customer’s first name
     * @var string
     * @SerializedName("first-name")
     */
    protected $firstName;

    /**
     * Customer’s last name
     * @var string
     * @SerializedName("last-name")
     */
    protected $lastName;

    /**
     * Customer’s middle name
     * @var string
     * @SerializedName("middle-name")
     */
    protected $middleName;

    /**
     * Name suffix e.g. “Sen.” or “Jun.”
     * @var string
     * @SerializedName("name-suffix")
     */
    protected $nameSuffix;

    /**
     * Salutation e.g. “Mr.” or “Mrs.”
     * @var string
     */
    protected $salutation;

    /**
     * Company name, applicable for B2B customers only
     * @var string
     * @SerializedName("company-name")
     */
    protected $companyName;

    /**
     * Customer’s title, e.g. “Dr.”
     * @var string
     */
    protected $title;

    /**
     * Customer’s gender. If the attribute is
     * unknown, the value “U” (unknown) must be used.
     * @var string
     */
    protected $gender;

    /**
     * Customer’s date of birth; applicable for
     * retail customers (B2C) only
     * @var DateTime
     * @SerializedName("date-of-birth")
     * @Type("DateTime<'Y-m-d'>")
     */
    protected $dateOfBirth;

    /**
     * Customer’s IP address
     * @var string
     * @SerializedName("ip-address")
     */
    protected $ipAddress;

    /**
     * @var ContactsType
     */
    protected $contacts;

    /**
     * @var AddressType[]
     * @XmlList(entry="address")
     */
    protected $addresses;

    /**
     * @var BankAccountType
     * @SerializedName("bank-account")
     */
    protected $bankAccount;

    /**
     * @var string
     */
    protected $nationality;

    /**
     * @var bool
     * @SerializedName("customer-allow-marketing")
     */
    protected $customerAllowMarketing;

    /**
     * @var bool
     * @SerializedName("customer-allow-credit-inquiry")
     */
    protected $customerAllowCreditInquiry;

    /**
     * @var string
     * @SerializedName("vat-id")
     */
    protected $vatId;

    /**
     * @var string
     * @SerializedName("company-id")
     */
    protected $companyId;

    /**
     * @return BankAccountType
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccountType $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomerAllowMarketing()
    {
        return $this->customerAllowMarketing;
    }

    /**
     * @param boolean $customerAllowMarketing
     */
    public function setCustomerAllowMarketing($customerAllowMarketing)
    {
        $this->customerAllowMarketing = $customerAllowMarketing;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomerAllowCreditInquiry()
    {
        return $this->customerAllowCreditInquiry == 'yes';
    }

    /**
     * @param boolean $customerAllowCreditInquiry
     */
    public function setCustomerAllowCreditInquiry($customerAllowCreditInquiry)
    {
        $this->customerAllowCreditInquiry = (!!$customerAllowCreditInquiry) ? 'yes' : 'no';
        return $this;
    }

    /**
     * @return string
     */
    public function getVatId()
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     */
    public function setVatId($vatId)
    {
        $this->vatId = $vatId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameSuffix()
    {
        return $this->nameSuffix;
    }

    /**
     * @param string $nameSuffix
     */
    public function setNameSuffix($nameSuffix)
    {
        $this->nameSuffix = $nameSuffix;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param DateTime $dateOfBirth
     */
    public function setDateOfBirth(DateTime $dateOfBirth = null)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return ContactsType
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param ContactsType $contacts
     */
    public function setContacts(ContactsType $contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return AdressType[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param AdressType[] $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
        return $this;
    }
}