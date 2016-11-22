<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class ShoppingBasketExtraType
{
    /**
     * Aggregated value of the shopping basket.
     *
     * @var float
     * @SerializedName("unit-price-gross")
     * @XmlAttribute
     */
    protected $amount;

    /**
     * Tax rate that applies to the item,
     * e.g. 19% (send like “19”)
     *
     * @var float
     * @SerializedName("tax-rate")
     * @XmlAttribute
     */
    protected $taxRate;

    /**
     * Article description
     *
     * @var string
     * @XmlValue
     */
    protected $item;

    /**
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param string $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return float
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @param float $taxRate
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}