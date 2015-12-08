<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response;

use JMS\Serializer\Annotation\Type;

class ResponseType {
    /**
     * @var ResponseHeadType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseHeadType")
     */
    protected $head;

    /**
     * @var ResponseContentType
     * @Type("PHPCommerce\Vendor\Ratepay\Service\Payment\Type\Response\ResponseContentType")
     */
    protected $content;

    /**
     * @return ResponseHeadType
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param ResponseHeadType $head
     */
    public function setHead(ResponseHeadType $head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * @return ResponseContentType
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ResponseContentType $content
     */
    public function setContent(ResponseContentType $content)
    {
        $this->content = $content;
        return $this;
    }


}