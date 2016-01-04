<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment;

use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ResponseType;

interface GatewayClientInterface {
    /**
     * @param RequestType $request
     * @return ResponseType
     */
    public function postRequest(RequestType $request);
}