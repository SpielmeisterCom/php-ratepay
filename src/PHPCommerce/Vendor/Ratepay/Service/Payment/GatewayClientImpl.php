<?php
namespace PHPCommerce\Vendor\RatePAY\Service\Payment;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\PaymentPermissionResponseType;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Request\RequestType;
use PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ResponseType;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;


class GatewayClientImpl implements GatewayClientInterface, LoggerAwareInterface {
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var Serializer
     */
    protected $serializer;

    public function __construct(ClientInterface $client, $endpoint)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
        $this->serializer = $this->createSerializer();
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @return Serializer
     */
    protected function createSerializer() {
        return SerializerBuilder::create()
            ->addDefaultHandlers()
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new ResponseContentTypeHandler());
            })
            ->build();
    }

    /**
     * @param RequestType $request
     * @return ResponseType
     */
    public function postRequest(RequestType $request)
    {
        $xmlContent = $this->serializer->serialize($request, 'xml');

        if($this->logger) {
            $this->logger->debug(
                "RatePAY Gateway Client posting XML content to {endpoint}\n\n{request}\n",
                [
                    'endpoint' => $this->endpoint,
                    'request'  => $xmlContent
                ]
            );
        }

        $res = $this->client->request(
            'POST',
            $this->endpoint,
            [
                'body' => $xmlContent,
                'headers' => [
                    'Content-Type' => 'text/xml; charset=UTF-8'
                ]
            ]
        );

        $rawResponse = $res->getBody()->getContents();

        if($this->logger) {
             $this->logger->debug(
                 "RatePAY Gateway Client received XML response with status code {statuscode}\n\n{response}",
                 [
                     'statuscode'    => $res->getStatusCode(),
                     'response'      => $rawResponse
                 ]
             );
         }

         if($res->getStatusCode() != 200) {
             throw new \RuntimeException("Remote Server returned status code != 200");
         }

        $response = $this->serializer->deserialize(
            $rawResponse,
            'PHPCommerce\Vendor\RatePAY\Service\Payment\Type\Response\ResponseType',
            'xml'
        );

        return $response;
    }
}