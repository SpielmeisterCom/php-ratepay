<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;


class ShoppingBasketType {
    const CURRENCY_EUR = 'EUR';

    const CURRENCY_USD = 'USD';

    const CURRENCY_GBP = 'GBP';

    const CURRENCY_CHF = 'CHF';

    const CURRENCY_JPY = 'JPY';

    const CURRENCY_AUD = 'AUD';

    const CURRENCY_RUB = 'RUB';

    const CURRENCY_CAD = 'CAD';

    /**
     * Aggregated value of the shopping basket.
     * @var float
     * @XmlAttribute
     */
    protected $amount;


    /**
     * Currency
     * @var string
     * @XmlAttribute
     */
    protected $currency;

    /**
     * @XmlList(entry="item")
     * @var ShoppingBasketItemType[]
     */
    protected $items;

    /**
     * @XmlList(entry="item")
     * @var ShoppingBasketExtraType
     */
    protected $shipping;

    /**
     * @XmlList(entry="item")
     * @var ShoppingBasketExtraType
     */
    protected $discount;

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
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return ShoppingBasketExtraType
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param ShoppingBasketExtraType $discount
     */
    public function setDiscount(ShoppingBasketExtraType $discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return ShoppingBasketExtraType
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param ShoppingBasketExtraType $shipping
     */
    public function setShipping(ShoppingBasketExtraType $shipping)
    {
        $this->shipping = $shipping;
    }

}