<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\RatepayException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\RejectionException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\TechnicalErrorException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\WarningException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseType;

interface RatepayBrokerInterface {

    /**
     * @return RequestBuilder
     */
    public function getRequestBuilder();

    /**
     * Initialize new payment transaction and return the transaction id upon success
     * @throws RatepayException
     * @throws TechnicalErrorException
     * @return string
     */
    public function paymentInit();

    /**
     * @throws RatepayException
     * @return ResponseType
     */
    public function paymentRequest($transactionId, RequestType $req);

    /**
     * @throws RatepayException
     * @throws TechnicalErrorException
     * @throws WarningException
     * @throws RejectionException
     * @return ResponseType
     */
    public function paymentConfirm($transactionId);

    /**
     * @param $transactionId
     * @param $subType
     * @param RequestType $req
     * @throws RatepayException
     * @throws TechnicalErrorException
     * @throws WarningException
     * @throws RejectionException
     * @return ResponseType
     */
    public function paymentChange($transactionId, $subType, RequestType $req);

    /**
     * @param $transactionId
     * @param $subType
     * @param RequestType $req
     * @throws RatepayException
     * @throws TechnicalErrorException
     * @throws WarningException
     * @throws RejectionException
     * @return ResponseType
     */
    public function confirmationDeliver($transactionId, RequestType $req);

    /**
     * @throws RatepayException
     * @throws TechnicalErrorException
     * @return ResponseType
     */
    public function configurationRequest();

}