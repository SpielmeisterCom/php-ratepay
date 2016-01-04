<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class OperationType
{
    const OPERATION_PAYMENT_INIT = 'PAYMENT_INIT';

    const OPERATION_PAYMENT_QUERY = 'PAYMENT_QUERY';

    const OPERATION_PAYMENT_REQUEST = 'PAYMENT_REQUEST';

    const OPERATION_PAYMENT_CHANGE = 'PAYMENT_CHANGE';

    const OPERATION_PAYMENT_CONFIRM = 'PAYMENT_CONFIRM';

    const OPERATION_CONFIRMATION_DELIVER = 'CONFIRMATION_DELIVER';

    const OPERATION_CALCULATION_REQUEST = 'CALCULATION_REQUEST';

    const OPERATION_CONFIGURATION_REQUEST = 'CONFIGURATION_REQUEST';

    const OPERATION_SUBTYPE_FULL = 'full';

    const OPERATION_SUBTYPE_CANCELLATION  = 'cancellation';

    const OPERATION_SUBTYPE_RETURN = 'return';

    const OPERATION_SUBTYPE_CREDIT = 'credit';

    const OPERATION_SUBTYPE_CHANGE_ORDER = 'change-order';


    /**
     * @XmlAttribute
     * @var string
     */
    protected $subtype;

    /**
     * @XmlValue
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param string $subtype
     * @return $this
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}