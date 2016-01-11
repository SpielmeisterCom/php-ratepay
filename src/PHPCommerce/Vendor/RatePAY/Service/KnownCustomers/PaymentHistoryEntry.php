<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers;

class PaymentHistoryEntry {
    /**
     * Kreditkarte
     */
    const PAYMENT_METHOD_CREDIT_CARD = 'CC';

    /**
     * ELV Händler
     */
    const PAYMENT_METHOD_DIRECT_DEBIT_VIA_SHOP = 'DD1';

    /**
     * ELV RatePAY
     */
    const PAYMENT_METHOD_DIRECT_DEBIT_VIA_RATEPAY = 'DD2';

    /**
     * ELV Dritte
     */
    const PAYMENT_METHOD_DIRET_DEBIT_VIA_THIRDPARTY = 'DD3';

    /**
     * Rate Händler
     */
    const PAYMENT_METHOD_INSTALLMENT_VIA_SHOP = 'INS1';

    /**
     * Rate RatePAY
     */
    const PAYMENT_METHOD_INSTALLMENT_VIA_RATEPAY = 'INS2';

    /**
     * Rate Dritte
     */
    const PAYMENT_METHOD_INSTALLMENT_VIA_THIRDPARTY = 'INS3';

    /**
     * Rechnung Händler
     */
    const PAYMENT_METHOD_INVOICE_VIA_SHOP = 'INV1';

    /**
     * Rechnung RatePAY
     */
    const PAYMENT_METHOD_INVOICE_VIA_RATEPAY = 'INV2';

    /**
     * Rechnung Dritte
     */
    const PAYMENT_METHOD_INVOICE_VIA_THIRDPARTY = 'INV3';

    /**
     * Sonstige
     */
    const PAYMENT_METHOD_OTHER = 'OTH';

    /**
     * Sonstige, Zahlart ohne Factoring
     */
    const PAYMENT_METHOD_OTHER_WITH_FACTORING = 'OTH1';

    /**
     * Sonstige, Zahlart mit Factoring
     */
    const PAYMENT_METHOD_OTHER_WITHOUT_FACTORING = 'OTH2';

    /**
     * Payment on Delivery
     */
    const PAYMENT_METHOD_PAYPAL = 'PAY';

    /**
     * Payment on Delivery
     */
    const PAYMENT_METHOD_POD = 'POD';

    /**
     * Vorkasse Hädler
     */
    const PAYMENT_METHOD_PREPAYMENT_VIA_SHOP = 'PP1';

    /**
     * Vorkasse RatePAY
     */
    const PAYMENT_METHOD_PREPAYMENT_VIA_RATEPAY = 'PP2';

    /**
     * Vorkasse Dritte
     */
    const PAYMENT_METHOD_PREPAYMENT_VIA_THIRDPARTY = 'PP3';

    /**
     * Sofortüberweisung oder Giropay
     */
    const PAYMENT_METHOD_SOFORTUEBERWEISUNG = 'SOF';

    /**
     * Auftragsnummer im Shopsystem.
     * Entsprechend RatePAY Gateway XML: /request/head/external/order-id *
     * @var string
     */
    protected $shopOrderId;

    /**
     * Kundennummer.
     * Entsprechend RatePAY Gateway XML: /request/head/external/merchant-consumer-id *
     * @var string
     */
    protected $shopCustomerId;

    /**
     * Datum dieser Bestellung
     * @var string
     */
    protected $orderDate;

    /**
     * Uhrzeit dieser Bestellung
     * @var string
     */
    protected $orderTime;

    /**
     * Lieferdatum dieser Bestellung
     * Verwenden Sie für Teillieferungen unterschiedliche Zeilen.
     * @var string
     */
    protected $deliveryDate;

    /**
     * Zahlungseingang für diese Bestellung
     * Wenn nicht bezahlt wurde, verwenden sie das Datum 9999-12-31. Bei Teilzahlungen geben Sie das Datum der letzten Zahlung an.
     * @var string
     */
    protected $paymentDate;

    /**
     * Ausgewählte Zahlart
     * @var string
     */
    protected $paymentMethod;

    /**
     * Währung dieser Bestellung
     * @var string
     */
    protected $currency;

    /**
     * Warenkorbhöhe
     * @var float
     */
    protected $orderAmount;

    /**
     * Höhe der Zahlung
     * @var float
     */
    protected $paymentAmount;

    /**
     * Höhe der Stornos
     * @var float
     */
    protected $cancellationAmount;

    /**
     * Höhe der Retouren
     * @var float
     */
    protected $returnAmount;

    /**
     * Pseudocode:
     * Wenn der Benutzer sich erfolgreich mit einem Passwort eingeloggt hat:
     * dann result := TRUE
     * sonst result := FALSE;
     * @var int
     */
    protected $loginFlag;

    /**
     * Flag für die 1. Bestellung, für die er eine unterschiedliche Rechnungsadresse verwendet
     * Schritte in Pseudocode:
     * 1) wenn nur eine Bestellung existiert: result := FALSE; return;
     * 2) Bestellungen nach OrderDate + OrderTime sortieren;
     * 3) wenn (Rechnungsadresse dieser Bestellung != Rechnungsadresse vorheriger Bestellung)
     * dann result := TRUE
     * dann result := FALSE;
     * @var int
     */
    protected $newAddressFlag;

    /**
     * Max. Tage zwischen Bestellung und Ende der Frist für die Rücksendung von Waren (zu dieser Zeit)
     * @var int
     */
    protected $returningPeriod;

    /**
     * @return string
     */
    public function getShopOrderId()
    {
        return $this->shopOrderId;
    }

    /**
     * @param string $shopOrderId
     * @return PaymentHistoryEntry
     */
    public function setShopOrderId($shopOrderId)
    {
        $this->shopOrderId = $shopOrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getShopCustomerId()
    {
        return $this->shopCustomerId;
    }

    /**
     * @param string $shopCustomerId
     * @return PaymentHistoryEntry
     */
    public function setShopCustomerId($shopCustomerId)
    {
        $this->shopCustomerId = $shopCustomerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     * @return PaymentHistoryEntry
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }

    /**
     * @param string $orderTime
     * @return PaymentHistoryEntry
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param string $deliveryDate
     * @return PaymentHistoryEntry
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param string $paymentDate
     * @return PaymentHistoryEntry
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return PaymentHistoryEntry
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
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
     * @return PaymentHistoryEntry
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * @param float $orderAmount
     * @return PaymentHistoryEntry
     */
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param float $paymentAmount
     * @return PaymentHistoryEntry
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getCancellationAmount()
    {
        return $this->cancellationAmount;
    }

    /**
     * @param float $cancellationAmount
     * @return PaymentHistoryEntry
     */
    public function setCancellationAmount($cancellationAmount)
    {
        $this->cancellationAmount = $cancellationAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getReturnAmount()
    {
        return $this->returnAmount;
    }

    /**
     * @param float $returnAmount
     * @return PaymentHistoryEntry
     */
    public function setReturnAmount($returnAmount)
    {
        $this->returnAmount = $returnAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getLoginFlag()
    {
        return $this->loginFlag;
    }

    /**
     * @param int $loginFlag
     * @return PaymentHistoryEntry
     */
    public function setLoginFlag($loginFlag)
    {
        $this->loginFlag = $loginFlag;
        return $this;
    }

    /**
     * @return int
     */
    public function getNewAddressFlag()
    {
        return $this->newAddressFlag;
    }

    /**
     * @param int $newAddressFlag
     * @return PaymentHistoryEntry
     */
    public function setNewAddressFlag($newAddressFlag)
    {
        $this->newAddressFlag = $newAddressFlag;
        return $this;
    }

    /**
     * @return int
     */
    public function getReturningPeriod()
    {
        return $this->returningPeriod;
    }

    /**
     * @param int $returningPeriod
     * @return PaymentHistoryEntry
     */
    public function setReturningPeriod($returningPeriod)
    {
        $this->returningPeriod = $returningPeriod;
        return $this;
    }
}