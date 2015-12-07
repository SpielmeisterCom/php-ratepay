<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\SerializerBuilder;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ResponseType;
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

    public function __construct(ClientInterface $client, $endpoint)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param RequestType $request
     * @return ResponseType
     */
    public function postRequest(RequestType $request)
    {

        $serializer = SerializerBuilder::create()->build();
        $xmlContent = $serializer->serialize($request, 'xml');

        if($this->logger) {
            $this->logger->debug(
                "RatePAY Gateway Client posting XML content to {endpoint}\n\n{request}",
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

        $response = $serializer->deserialize(
            $rawResponse,
            'PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ResponseType',
            'xml'
        );

        return $response;
    }
}