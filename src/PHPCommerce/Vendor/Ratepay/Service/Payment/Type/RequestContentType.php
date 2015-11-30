<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

use JMS\Serializer\Annotation\SerializedName;

class RequestContentType
{
    /**
     * @var CustomerType
     */
    protected $customer;


    /**
     * @var InvoicingType
     */
    protected $invoicing;


    /**
     * @var ShoppingBasketType
     * @SerializedName("shopping-basket")
     */
    protected $shoppingBasket;

    /**
     * @var PaymentType
     */
    protected $payment;

    /**
     * @SerializedName("installment-calculation")
     * @var InstallmentCalculationType
     */
    protected $installmentCalculation;

    /**
     * @var AdditionalType
     */
    protected $additional;

    /**
     * @return CustomerType
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param CustomerType $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return InvoicingType
     */
    public function getInvoicing()
    {
        return $this->invoicing;
    }

    /**
     * @param InvoicingType $invoicing
     */
    public function setInvoicing($invoicing)
    {
        $this->invoicing = $invoicing;
        return $this;
    }

    /**
     * @return ShoppingBasketType
     */
    public function getShoppingBasket()
    {
        return $this->shoppingBasket;
    }

    /**
     * @param ShoppingBasketType $shoppingBasket
     */
    public function setShoppingBasket($shoppingBasket)
    {
        $this->shoppingBasket = $shoppingBasket;
        return $this;
    }

    /**
     * @return PaymentType
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param PaymentType $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return InstallmentCalculationType
     */
    public function getInstallmentCalculation()
    {
        return $this->installmentCalculation;
    }

    /**
     * @param InstallmentCalculationType $installmentCalculation
     */
    public function setInstallmentCalculation($installmentCalculation)
    {
        $this->installmentCalculation = $installmentCalculation;
        return $this;
    }

    /**
     * @return AdditionalType
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param AdditionalType $additional
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;
        return $this;
    }


}