# php-ratepay

## Usage

This library makes heavy use of the JMS-Serializer library which itself makes heavy ues of the doctrine annotation features.

To use the library in a standalone environment make sure to register the serializer source directory in the
doctrine annotation registry.

```php
AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__ . "/vendor/jms/serializer/src");
```

Sending a simple message:

```php
//Client = Implementation of a guzzle 6.x Client

$endpoint = 'https://gateway-int.ratepay.com/api/xml/1_0';
$client = new GatewayClientImpl(new Client(), $endpoint);

$ratepayConfiguration = (new RatepayConfiguration())
    ->setGatewayRequestCredentialProfileId("your-profile-id")
    ->setGatewayRequestCredentialSecuritycode("your-security-code")
    ->setGatewayRequestSystemId("systemId");

$requestBuilder = new RequestBuilder($ratepayConfiguration);

//Payment Init
$req = $requestBuilder
    ->operation(OperationType::OPERATION_PAYMENT_INIT)
    ->build();

$res = $client->postRequest($req);
```

