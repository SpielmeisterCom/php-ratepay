<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseType;

interface GatewayClientInterface {
    /**
     * @param RequestType $request
     * @return ResponseType
     */
    public function postRequest(RequestType $request);
}