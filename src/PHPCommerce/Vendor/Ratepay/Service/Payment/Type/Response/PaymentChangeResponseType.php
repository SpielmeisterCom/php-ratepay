<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response;
use JMS\Serializer\Annotation\Type;

class PaymentChangeResponseType extends ResponseContentType {
    /**
     * @var PaymentResponseType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\PaymentResponseType")
     */
    protected $payment;

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
        return $this;
    }
}