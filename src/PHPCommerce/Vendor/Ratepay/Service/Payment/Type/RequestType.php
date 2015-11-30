<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type;

use PHPCommerce\Vendor\RatePAY\RatePAYCredential;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlAttribute;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\RequestHeadType;

/**
 * @XmlRoot("request")
 * @XmlNamespace(uri="urn://www.ratepay.com/payment/1_0")
 */
class RequestType
{
    /**
     * @var string
     * @XmlAttribute
     */
    protected $version;

    /**
     * @var RequestHeadType
     */
    protected $head;

    /**
     * @var RequestContentType
     */
    protected $content;

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return RequestHeadType
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     * @return $this
     */
    public function setHead(RequestHeadType $head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * @return RequestContentType
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param RequestContentType $content
     */
    public function setContent(RequestContentType $content)
    {
        $this->content = $content;
        return $this;
    }
}