<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class SystemType
{
    /**
     * @var string
     * @XmlAttribute
     */
    protected $name;

    /**
     * @var string
     * @XmlAttribute
     */
    protected $version;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SystemType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return SystemType
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }


}