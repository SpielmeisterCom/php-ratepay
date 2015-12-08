<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\CredentialType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\CustomerType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ExternalType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\InstallmentCalculationType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\InvoicingType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\OperationType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\PaymentType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestContentType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestHeadType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ShoppingBasketType;

class RequestBuilder
{
    const REQUEST_VERSION = "1.0";

    /**
     * @var RatepayConfiguration
     */
    protected $configuration;

    /**
     * @var RequestType
     */
    protected $request;

    public function __construct(RatepayConfiguration $ratepayConfiguration) {
        $this->configuration = $ratepayConfiguration;
        $this->request       = $this->createRequest();
    }

    /**
     * @param $transactionId
     * @return $this
     */
    public function transactionId($transactionId) {
        $this->request->getHead()->setTransactionId($transactionId);
        return $this;
    }

    /**
     * @param $operation
     * @return $this
     */
    public function operation($operation) {
        $this->request->getHead()->getOperation()->setValue($operation);
        return $this;
    }

    /**
     * @param $operationSubtype
     * @return $this
     */
    public function operationSubtype($operationSubtype) {
        $this->request->getHead()->getOperation()->setSubtype($operationSubtype);
        return $this;
    }

    /**
     * @param ExternalType $external
     * @return $this
     */
    public function external(ExternalType $external) {
        $this->request->getHead()->setExternal($external);
        return $this;
    }

    /**
     * @param CustomerType $customer
     * @return $this
     */
    public function customer(CustomerType $customer) {
        $this->addRequestContentTypeIfNull();
        $this->request->getContent()->setCustomer($customer);
        return $this;
    }

    /**
     * @param ShoppingBasketType $shoppingBasket
     * @return $this
     */
    public function shoppingBasket(ShoppingBasketType $shoppingBasket) {
        $this->addRequestContentTypeIfNull();
        $this->request->getContent()->setShoppingBasket($shoppingBasket);
        return $this;
    }

    /**
     * @param PaymentType $payment
     * @return $this
     */
    public function payment(PaymentType $payment) {
        $this->addRequestContentTypeIfNull();
        $this->request->getContent()->setPayment($payment);
        return $this;
    }

    /**
     * @param InvoicingType $invoicing
     * @return $this
     */
    public function invoicing(InvoicingType $invoicing) {
        $this->addRequestContentTypeIfNull();
        $this->request->getContent()->setInvoicing($invoicing);
        return $this;
    }

    /**
     * @param InstallmentCalculationType $installmentCalculation
     * @return $this
     */
    public function installmentCalculation(InstallmentCalculationType $installmentCalculation) {
        $this->addRequestContentTypeIfNull();
        $this->request->getContent()->setInstallmentCalculation($installmentCalculation);
        return $this;
    }

    protected function addRequestContentTypeIfNull() {
        if($this->request->getContent() != null) {
            return;
        }

        $this->request->setContent(new RequestContentType());
    }

    /**
     * @return RequestType
     */
    public function build() {
        $request = $this->request;
        $this->request = $this->createRequest();

        return $request;
    }

    /**
     * @return RequestType
     */
    protected function createRequest() {
        $request = (new RequestType())
            ->setVersion(self::REQUEST_VERSION)
            ->setHead(
                (new RequestHeadType())
                    ->setOperation(new OperationType())
                    ->setSystemId($this->configuration->getGatewayRequestSystemId())
                    ->setCredential(
                        (new CredentialType())
                            ->setProfileId($this->configuration->getGatewayRequestCredentialProfileId())
                            ->setSecuritycode($this->configuration->getGatewayRequestCredentialSecuritycode())
                    )
            );

        return $request;
    }
}