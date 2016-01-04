<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class AddressResponseType {
    /**
     * Street name (normalized)
     * @var string
     * @Type("string")
     */
    protected $street;

    /**
     * Street number (normalized)
     * @var string
     * @SerializedName("street-number")
     * @Type("string")
     */
    protected $streetNumber;

    /**
     * Zip code (normalized)
     * @var string
     * @Type("string")
     * @SerializedName("zip-code")
     */
    protected $zipCode;

    /**
     * City (normalized)
     * @var string
     * @Type("string")
     */
    protected $city;

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
}