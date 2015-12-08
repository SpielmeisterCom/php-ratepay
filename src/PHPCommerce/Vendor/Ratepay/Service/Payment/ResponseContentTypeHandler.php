<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use JMS\Serializer\Context;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\OperationType;

class ResponseContentTypeHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseContentType',
                'method' => 'resolveResponseContentType',
            ),
        );
    }

    public function resolveResponseContentType(XmlDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        $operation = $visitor->getCurrentObject()->getHead()->getOperation();

        switch($operation) {
            case OperationType::OPERATION_PAYMENT_REQUEST:
                $type['name'] = 'PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\PaymentRequestResponseType';
                return $context->accept($data, $type);
                break;

            default:
                throw new RuntimeException("Unknown Operation: " . $operation);
                break;

        }
    }
}