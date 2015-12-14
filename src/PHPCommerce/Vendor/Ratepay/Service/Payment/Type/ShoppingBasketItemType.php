<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class ShoppingBasketItemType
{
    /**
     * Article description
     * @var string
     * @XmlValue
     */
    protected $item;

    /**
     * Merchant’s article number/identifier
     * @var string
     * @SerializedName("article-number")
     * @XmlAttribute
     */
    protected $articleNumber;

    /**
     * Merchant’s unique article number/identifier
     * @var string
     * @SerializedName("unique-article-number")
     * @XmlAttribute
     */
    protected $uniqueArticleNumber;

    /**
     * Quantity
     * @var int
     * @XmlAttribute
     */
    protected $quantity;

    /**
     * Gross price of one unit (including tax)
     * @var float
     * @SerializedName("unit-price-gross")
     * @XmlAttribute
     */
    protected $unitPriceGross;

    /**
     * Tax rate that applies to the item,
     * e.g. 19% (send like “19”)
     * @var float
     * @SerializedName("tax-rate")
     * @XmlAttribute
     */
    protected $taxRate;

    /**
     * Optional article category. The interpretation
     * of this value is defined by the risk
     * management process.
     * @var string
     */
    protected $category;

    /**
     * With this attribute an additional text can be
     * submitted to be used as additional
     * description for correspondence sent by
     * RatePAY to the customer.
     * @var string
     * @SerializedName("description-addition")
     * @XmlAttribute
     */
    protected $descriptionAddition;

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
        return $this;
    }

    /**
     * @return string
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * @param string $articleNumber
     */
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueArticleNumber()
    {
        return $this->uniqueArticleNumber;
    }

    /**
     * @param string $uniqueArticleNumber
     */
    public function setUniqueArticleNumber($uniqueArticleNumber)
    {
        $this->uniqueArticleNumber = $uniqueArticleNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPriceGross()
    {
        return $this->unitPriceGross;
    }

    /**
     * @param float $unitPriceGross
     */
    public function setUnitPriceGross($unitPriceGross)
    {
        $this->unitPriceGross = $unitPriceGross;
        return $this;
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
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionAddition()
    {
        return $this->descriptionAddition;
    }

    /**
     * @param string $descriptionAddition
     */
    public function setDescriptionAddition($descriptionAddition)
    {
        $this->descriptionAddition = $descriptionAddition;
        return $this;
    }
}