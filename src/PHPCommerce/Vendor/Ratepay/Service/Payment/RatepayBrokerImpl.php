<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\RatepayException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\RejectionException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\TechnicalErrorException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\WarningException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\OperationType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseType;

class RatepayBrokerImpl implements RatepayBrokerInterface {

    /**
     * @var RatepayConfiguration
     */
    protected $ratepayConfiguration;

    /**
     * @var GatewayClientInterface
     */
    protected $gatewayClient;

    /**
     * @var RequestBuilder
     */
    protected $requestBuilder;

    public function __construct(RatepayConfiguration $ratepayConfiguration, GatewayClientInterface $gatewayClient) {
        $this->ratepayConfiguration     = $ratepayConfiguration;
        $this->gatewayClient            = $gatewayClient;
        $this->requestBuilder           = new RequestBuilder($ratepayConfiguration);
    }

    /**
     * Scan the response for the expected success & error codes. Throw an exception if an error is detected.
     * @param ResponseType $res
     * @param $successCode
     * @param $rejectionCode
     * @param $technicalErrorCode
     * @param $warningCode
     * @throws RejectionException
     * @throws TechnicalErrorException
     * @throws WarningException
     * @throws RatepayException
     */
    protected function validateResponse(ResponseType $res, $successCode, $rejectionCode, $technicalErrorCode, $warningCode) {
        $processing             = $res->getHead()->getProcessing();
        $resultDescription      = $processing->getResult()->getDescription();
        $resultCode             = $processing->getResult()->getCode();

        $reasonDescription      = $processing->getReason()->getDescription();
        $reasonCode             = $processing->getReason()->getCode();

        $customerMessage        = $processing->getCustomerMessage();

        $exception              = null;

        if(null !== $rejectionCode && (int)$resultCode === (int)$rejectionCode) {
            $exception = new RejectionException($resultDescription, $resultCode);

        } elseif(null !== $technicalErrorCode && (int)$resultCode === (int)$technicalErrorCode) {
            $exception = new TechnicalErrorException($resultDescription, $resultCode);

        } elseif(null !== $warningCode && (int)$resultCode === (int)$warningCode) {
            $exception = new WarningException($resultDescription, $resultCode);

        } elseif(null !== $successCode && (int)$resultCode !== (int)$successCode) {
            $exception = new RatepayException($resultDescription, $resultCode);

        }

        if(null !== $exception) {
            $exception
                ->setReasonCode($reasonCode)
                ->setReasonDescription($reasonDescription)
                ->setCustomerMessage($customerMessage);

            throw $exception;
        }
    }

    public function paymentInit()
    {
        $req = $this->requestBuilder
            ->operation(OperationType::OPERATION_PAYMENT_INIT)
            ->build();

        $res = $this->gatewayClient->postRequest($req);

        $this->validateResponse($res, 350, NULL, 150, NULL);

        return $res->getHead()->getTransactionId();
    }

    public function paymentRequest($transactionId, RequestType $req)
    {
        $req->getHead()->setTransactionId($transactionId);
        $req->getHead()->getOperation()->setValue(OperationType::OPERATION_PAYMENT_REQUEST);

        $res = $this->gatewayClient->postRequest($req);

        $this->validateResponse($res, 402, 401, 150, 405);

        return $res;
    }

    public function paymentConfirm($transactionId)
    {
        $req = $this->requestBuilder
            ->operation(OperationType::OPERATION_PAYMENT_CONFIRM)
            ->transactionId($transactionId)
            ->build();

        $res = $this->gatewayClient->postRequest($req);

        $this->validateResponse($res, 400, 401, 150, 405);
    }

    public function configurationRequest() {
        $req = $this->requestBuilder
            ->operation(OperationType::OPERATION_CONFIGURATION_REQUEST)
            ->build();

        $res = $this->gatewayClient->postRequest($req);

        $this->validateResponse($res, 500, null, 150, null);

        return $res;
    }

    /**
     * @return RequestBuilder
     */
    public function getRequestBuilder()
    {
        return $this->requestBuilder;
    }
}