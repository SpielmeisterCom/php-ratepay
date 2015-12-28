<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

use DateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class InvoicingType
 * @package PHPCommerce\Vendor\Ratepay\Service\Payment\Type
 * The invoicing details contain parameters of the invoice and the due date for settlement
 * (German "dynamische Fälligkeit")
 */
class InvoicingType
{
    /**
     * ID (name or number) of the invoice, defined by the merchant
     * @var string
     * @SerializedName("invoice-id")
     */
    protected $invoiceId;

    /**
     * Invoice date, defined by the merchant.
     *
     * If the merchang does not transmit an invoice-date, the
     * RatePAY beckend system will set the delivery-date to the invoice-date
     * @var DateTime
     * @Type("DateTime")
     * @SerializedName("invoice-date")
     */
    protected $invoiceDate;

    /**
     * Date on which the merchant delivered the goods to the customer.
     * The delivery-date must be generated by the shop/PSP backend when sending the
     * CONFIRMATION_DELIVER. The delivery-date must not be an editable field in the merchant's admin GUI
     * @var DateTime
     * @Type("DateTime")
     * @SerializedName("delivery-date")
     */
    protected $deliveryDate;

    /**
     * Date by which the customer must settle the payment (German: "dynamische Fälligkeit"); defined by the merchant
     * @var DateTime
     * @Type("DateTime")
     * @SerializedName("due-date")
     */
    protected $dueDate;

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param string $invoiceId
     * @return $this
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param DateTime $invoiceDate
     * @return $this
     */
    public function setInvoiceDate(DateTime $invoiceDate = null)
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param DateTime $deliveryDate
     * @return $this
     */
    public function setDeliveryDate(DateTime $deliveryDate = null)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     * @return $this
     */
    public function setDueDate(DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}