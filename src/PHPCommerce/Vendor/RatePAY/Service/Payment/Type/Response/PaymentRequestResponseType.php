<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response;

use JMS\Serializer\Annotation\Type;

class PaymentRequestResponseType extends ResponseContentType {
    /**
     * @var CustomerResponseType
     * @Type("PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\CustomerResponseType")
     */
    protected $customer;

    /**
     * @var PaymentResponseType
     * @Type("PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentResponseType")
     */
    protected $payment;

    /**
     * @return CustomerResponseType
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param CustomerResponseType $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return PaymentResponseType
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param PaymentResponseType $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }
}