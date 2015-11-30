<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

use GuzzleHttp\ClientInterface;
use JMS\Serializer\SerializerBuilder;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ResponseType;

class GatewayClientImpl implements GatewayClientInterface {

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

    /**
     * @param RequestType $request
     * @return ResponseType
     */
    public function postRequest(RequestType $request)
    {

        $serializer = SerializerBuilder::create()->build();
        $xmlContent = $serializer->serialize($request, 'xml');

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

        if($res->getStatusCode() != 200) {
            throw new \RuntimeException("Remote Server returned status code != 200");
        }

        $rawResponse = $res->getBody()->getContents();

        print($rawResponse);

        $response = $serializer->deserialize(
            $rawResponse,
            'PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ResponseType',
            'xml'
        );

        return $response;
    }
}