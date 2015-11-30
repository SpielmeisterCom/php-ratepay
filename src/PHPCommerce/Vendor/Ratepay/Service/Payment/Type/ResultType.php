<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class ResultType {
    /**
     * @var string
     * @XmlAttribute
     * @Type("string")
     */
    protected $code;

    /**
     * @var string
     * @XmlValue
     * @Type("string")
     */
    protected $description;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
