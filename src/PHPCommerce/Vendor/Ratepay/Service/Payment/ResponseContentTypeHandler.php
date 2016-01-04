<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment;

use JMS\Serializer\Context;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\OperationType;

class ResponseContentTypeHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ResponseContentType',
                'method' => 'resolveResponseContentType',
            ),
        );
    }

    public function resolveResponseContentType(XmlDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        $operation = $visitor->getCurrentObject()->getHead()->getOperation();

        switch($operation) {
            case OperationType::OPERATION_PAYMENT_INIT:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentInitResponseType';
                return $context->accept($data, $type);
                break;

            case OperationType::OPERATION_PAYMENT_REQUEST:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentRequestResponseType';
                return $context->accept($data, $type);
                break;

            case OperationType::OPERATION_PAYMENT_CONFIRM:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentConfirmResponseType';
                return $context->accept($data, $type);
                break;

            case OperationType::OPERATION_PAYMENT_CHANGE:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentChangeResponseType';
                return $context->accept($data, $type);
                break;

            case OperationType::OPERATION_CONFIRMATION_DELIVER:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ConfirmationDeliverResponseType';
                return $context->accept($data, $type);
                break;

            case OperationType::OPERATION_CONFIGURATION_REQUEST:
                $type['name'] = 'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ConfigurationResponseType';
                return $context->accept($data, $type);
                break;

            default:
                throw new RuntimeException("Unknown Operation: " . $operation);
                break;

        }
    }
}