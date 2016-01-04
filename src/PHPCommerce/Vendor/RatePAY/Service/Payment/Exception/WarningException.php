<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Exception;

/**
 * This result states that the workflow of the sending system is incorrect. Requests with the result “Warning” will not be processed.
 *
 * There are 2 reasons:
 * -   transaction-id in use (Reason Code 310)
 *      The Gateway already is processing a request for this specific transaction-id at the same time.
 *      This occurs if the sending system sends the same request more than once.
 *
 * -   wrong operation order (Reason Code 309)
 * The current request does not match to the state of the transaction.
 * For example: The return of articles is not allowed before a CONFIRMATION_DELIVER was sent.
 *
 * Class TechnicalErrorException
 * @package PHPCommerce\Vendor\RatePAY\Service\Payment\Exception
 */
class WarningException extends RatePAYException {

}