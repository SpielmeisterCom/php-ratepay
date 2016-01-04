<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("address")
 */
class AddressType {
    const ADDRESS_TYPE_BILLING = 'BILLING';

    const ADDRESS_TYPE_DELIVERY = 'DELIVERY';

    /**
     * Meldeadresse
     */
    const ADDRESS_TYPE_REGISTRY = 'REGISTRY';

    /**
     * Address type
     * @var string
     * @XmlAttribute
     */
    protected $type;

    /**
     * First name of delivery addressee
     * @var string
     * @SerializedName("first-name")
     */
    protected $firstName;

    /**
     * Last name of delivery addressee
     * @var string
     * @SerializedName("last-name")
     */
    protected $lastName;

    /**
     * Salutation of delivery addressee, e.g.
     * “Mr.” or “Mrs.”
     * @var string
     */
    protected $salutation;

    /**
     * Additional delivery address information
     * e.g. corporate address or c/o info
     * @var string
     */
    protected $company;

    /**
     * Street name
     * @var string
     */
    protected $street;

    /**
     * Street name supplement
     * @var string
     * @SerializedName("street-additional")
     */
    protected $streetAdditional;

    /**
     * Street number. If it is not possible to
     * send the street number separately, it
     * may be sent together with the street.
     * @var string
     * @SerializedName("street-number")
     */
    protected $streetNumber;

    /**
     * Zip code
     * @var string
     * @SerializedName("zip-code")
     */
    protected $zipCode;

    /**
     * City
     * @var string
     */
    protected $city;

    /**
     * ISO-3166 alpha 2
     * @var string
     * @SerializedName("country-code")
     */
    protected $countryCode;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAdditional()
    {
        return $this->streetAdditional;
    }

    /**
     * @param string $streetAdditional
     */
    public function setStreetAdditional($streetAdditional)
    {
        $this->streetAdditional = $streetAdditional;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }
}