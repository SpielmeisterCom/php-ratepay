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

## Sending a PAYMENT_REQUEST message

```php
$req = $requestBuilder
    ->operation(OperationType::OPERATION_PAYMENT_REQUEST)
    ->transactionId($res->getHead()->getTransactionId())
    ->external(
        (new ExternalType())
            ->setMerchantConsumerId("D1234567890")
            ->setOrderId("50001234")

    )
    ->customer((new CustomerType())
        ->setFirstName("Max")
        ->setLastName("Mustermann")
        ->setGender(CustomerType::GENDER_MALE)
        ->setDateOfBirth(new DateTime("1985-01-01"))
        ->setIpAddress("123.123.123.123")
        ->setCustomerAllowCreditInquiry(true)
        ->setContacts(
            (new ContactsType())
                ->setEmail("max.mustermann@test.de")
                ->setPhone(
                    (new PhoneType ())
                        ->setAreaCode("040")
                        ->setDirectDial("1234567890")
                )
        )
        ->setAddresses([
            (new AddressType())
                ->setType(AddressType::ADDRESS_TYPE_BILLING)
                ->setFirstName("Max")
                ->setLastName("Mustermann")
                ->setStreet("Musterstraße")
                ->setStreetNumber("77")
                ->setZipCode("12345")
                ->setCity("Musterstadt")
                ->setCountryCode('DE')
        ])
    )
    ->shoppingBasket(
        (new ShoppingBasketType())
            ->setAmount(100)
            ->setCurrency('EUR')
            ->setItems([
                (new ShoppingBasketItemType())
                    ->setArticleNumber("123")
                    ->setQuantity("1")
                    ->setUnitPriceGross(100)
                    ->setItem("Artcile 1")
            ])
    )
    ->payment(
        (new PaymentType())
            ->setMethod(PaymentType::METHOD_INVOICE)
            ->setCurrency(PaymentType::CURRENCY_EUR)
            ->setAmount(100)
    )
    ->build();


$res = $client->postRequest($req);
```