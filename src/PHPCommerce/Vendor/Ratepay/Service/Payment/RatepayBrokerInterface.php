<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment;

use PHPCommerce\Vendor\RatePAY\Service\Payment\Exception\RatePAYException;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Exception\RejectionException;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Exception\TechnicalErrorException;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Exception\WarningException;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ResponseType;

interface RatepayBrokerInterface {

    /**
     * @return RequestBuilder
     */
    public function getRequestBuilder();

    /**
     * Initialize new payment transaction and return the transaction id upon success
     * @throws RatePAYException
     * @throws TechnicalErrorException
     * @return string
     */
    public function paymentInit();

    /**
     * @throws RatePAYException
     * @return ResponseType
     */
    public function paymentRequest($transactionId, RequestType $req);

    /**
     * @throws RatePAYException
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
     * @throws RatePAYException
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
     * @throws RatePAYException
     * @throws TechnicalErrorException
     * @throws WarningException
     * @throws RejectionException
     * @return ResponseType
     */
    public function confirmationDeliver($transactionId, RequestType $req);

    /**
     * @throws RatePAYException
     * @throws TechnicalErrorException
     * @return ResponseType
     */
    public function configurationRequest();

}