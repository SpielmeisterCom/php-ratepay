<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response;

use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\ContactsType;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class CustomerResponseType {
    /**
     * Contains customer's normalized billing address
     * @var AddressResponseType[]
     * @Type("array<PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\AddressResponseType>")
     * @XmlList(entry="address")
     */
    protected $addresses;
}