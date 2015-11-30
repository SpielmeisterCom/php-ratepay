<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

class MetaType {
    /**
     * @var SystemType[]
     * @XmlList(entry="system")
     */
    protected $systems;

    /**
     * @return SystemType[]
     */
    public function getSystems()
    {
        return $this->systems;
    }

    /**
     * @param array $systems
     * @return MetaType
     */
    public function setSystems($systems)
    {
        $this->systems = $systems;
        return $this;
    }


}