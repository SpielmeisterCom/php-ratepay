<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment\Type;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class ExternalType {
    const CONSUMER_CLASSIFICATION_NEGATIVE = 'negative';

    const CONSUMER_CLASSIFICATION_NEUTRAL = 'neutral';

    const CONSUMER_CLASSIFICATION_POSITIVE = 'positive';

    const CONSUMER_CLASSIFICATION_VIP = 'vip';

    /**
     * Order identifier of the merchant system;
     * must be passed to RatePAY
     * @var string
     * @Type("string")
     * @SerializedName("order-id")
     */
    protected $orderId;

    /**
     * Internal customer identifier of the
     * merchant system. Currently has no effect
     * on the RatePAY workflow
     * @var string
     * @Type("string")
     * @SerializedName("merchant-consumer-id")
     */
    protected $merchantConsumerId;

    /**
     * Internal consumer classification of the
     * merchant which will be taken into account
     * by the RMS process. Please contact
     * your RatePAY representative for
     * contractual terms when using this
     * feature.
     * @var string
     * @Type("string")
     */
    protected $merchantConsumerClassification;

    /**
     * This element is deprecated – please
     * use the tracking list (see below)
     * @var string
     * @deprecated
     * @Type("string")
     */
    protected $trackingId;

    /**
     * Contains a list of tracking ids and
     * corresponding delivery providers
     * @var
     */
   // protected $tracking;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantConsumerId()
    {
        return $this->merchantConsumerId;
    }

    /**
     * @param string $merchantConsumerId
     * @return $this
     */
    public function setMerchantConsumerId($merchantConsumerId)
    {
        $this->merchantConsumerId = $merchantConsumerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantConsumerClassification()
    {
        return $this->merchantConsumerClassification;
    }

    /**
     * @param string $merchantConsumerClassification
     * @return $this
     */
    public function setMerchantConsumerClassification($merchantConsumerClassification)
    {
        $this->merchantConsumerClassification = $merchantConsumerClassification;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingId()
    {
        return $this->trackingId;
    }

    /**
     * @param string $trackingId
     * @return $this
     */
    public function setTrackingId($trackingId)
    {
        $this->trackingId = $trackingId;
        return $this;
    }

    /**
     * @return mixed
     */
   /* public function getTracking()
    {
        return $this->tracking;
    }*/

    /**
     * @param mixed $tracking
     */
/*    public function setTracking($tracking)
    {
        $this->tracking = $tracking;
    }*/


}