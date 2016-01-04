<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Exception;

/**
 * This Exception is triggered if a technical error occurred. In most cases this means, that a value within the request is not valid.
 * Especially with Reason Codes 102 (character encoding error) and 200 (validation failed) it can be assumed that the customer’s data is not valid.
 *
 * The shop may give the customer the chance to correct his input data and send the request again with the same transaction-id.
 *
 * Class TechnicalErrorException
 * @package PHPCommerce\Vendor\RatePAY\Service\Payment\Exception
 */
class TechnicalErrorException extends RatePAYException {

}