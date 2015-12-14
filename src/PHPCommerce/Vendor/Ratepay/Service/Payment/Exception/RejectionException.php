<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Exception;

/**
 * This exception will be triggered if the operation was not successful.
 * The transaction is closed and no further requests for this specific transaction-id will be accepted.
 *
 * Class RejectionErrorException
 * @package PHPCommerce\Vendor\Ratepay\Service\Payment\Exception
 */
class RejectionErrorException extends RatepayException {

}