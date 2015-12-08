<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response;

use JMS\Serializer\Annotation\Type;

class PaymentPermissionResponseType {
    /**
     * @var CustomerResponseType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\CustomerResponseType")
     */
    protected $customer;

}