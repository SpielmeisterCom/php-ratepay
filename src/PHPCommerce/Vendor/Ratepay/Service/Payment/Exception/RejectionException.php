<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Exception;

/**
 * This exception will be triggered if the operation was not successful.
 * The transaction is closed and no further requests for this specific transaction-id will be accepted.
 *
 * Class RejectionErrorException
 * @package PHPCommerce\Vendor\RatePAY\Service\Payment\Exception
 */
class RejectionException extends RatePAYException {

}