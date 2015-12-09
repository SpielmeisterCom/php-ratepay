# php-ratepay

## RatePAY gateway operations

| Gateway operation | Mandatory / Optional | Purpose |
|---|---|---|
| PAYMENT_INIT | M | Initialize the transaction and get a valid transaction-id. |
| PAYMENT_QUERY full | O | Check the customer and order details, perform a configurable risk scoring, retrieve the payment products permitted in the given context. The PAYMENT_QUERY full can be booked with a guaranteed acceptance. This means that all products given back will be accepted by a following PAYMENT_REQUEST. |
| PAYMENT_REQUEST | M | Check the customer and order details, perform risk scoring, return either customer acceptance or rejection. |
| PAYMENT_CONFIRM | M (if response of the PAYMENT_REQUEST is positive) | Finalize the payment process. |
| CONFIRMATION_DELIVER (“CD”) | M (if order has not been cancelled) | Immediately after the ordered goods have been delivered to the customer, the merchant must send a Confirmation Deliver message to the RatePAY Gateway. |
| PAYMENT_CHANGE cancellation | O | Merchant cancels some or all items of the order |
| PAYMENT_CHANGE return | O | Merchant returns some or all items of the order |
| PAYMENT_CHANGE change-order | O | Merchant or customer adds items to the order |
| PAYMENT_CHANGE credit | O | Merchant adds a credit (discount) or debit (adjustment charge) to the order |
| CONFIGURATION_REQUEST | O | Retrieve the stored configuration parameters for a certain merchant profile. |
| CALCULATION_REQUEST | O | Provides an installment plan depending on the request parameters and stored parameters of the merchant profile. |

## Result Codes

| Operation | Success | Rejection | Technical Error | Warning | Additional Information |
|---|---|---|---|---|---|
| PAYMENT_INIT | 350 | - | 150 | - | - |
| PAYMENT_QUERY | 402 | 401 | 150 | 405 | The PAYMENT_QUERY needs a different evaluation. To determine if a following PAYMENT_REQUEST will be successful, the corresponding product has to be available. |
| PAYMENT_REQUEST | 402 | 401 | 150 | 405 | - |
| PAYMENT_CONFIRM | 400 | 401 | 150 | 405 | - |
| PAYMENT_CHANGE | 403 | 401 | 150 | 405 | - |
| CONFIRMATION_DELIVER | 404 | 401 | 150 | 405 | - |
| CALCULATION_REQUEST | 502 | 503 | 150 | - | Note when a 503 is triggered: Although sending the same CALCULATION_REQUEST again is possible, the result will always be the same. This result indicates a request with wrong parameters. |
| CONFIGURATION_REQUEST | 500 | - | 150 | -  | - |

## Explanation of RatePAY gateway errors

### Success
The operation was successful and the shop is allowed to send additional requests for this specific transaction.

### Rejection
The operation was not successful. The transaction is closed and no further requests for this specific transaction-id will be accepted.

### Technical Error
A technical error occurred. In most cases this means, that a value within the request is not valid.

Especially with Reason Codes 102 (character encoding error) and 200 (validation failed) it can be assumed that the customer’s data is not valid.

The shop may give the customer the chance to correct his input data and send the request again with the same transaction-id.

### Warning

This result states that the workflow of the sending system is incorrect. Requests with the result “Warning” will not be processed.

There are 2 reasons:

-   transaction-id in use (Reason Code 310)
    The Gateway already is processing a request for this specific transaction-id at the same time.
    This occurs if the sending system sends the same request more than once.
    
-   wrong operation order (Reason Code 309)
    The current request does not match to the state of the transaction.
    For example: The return of articles is not allowed before a CONFIRMATION_DELIVER was sent.

## JMS Serializer Library Usage Note

This library makes heavy use of the JMS-Serializer library which itself makes heavy ues of the doctrine annotation features.

To use the library in a standalone environment make sure to register the serializer source directory in the
doctrine annotation registry.

```php
AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__ . "/vendor/jms/serializer/src");
```

## Example for a RatePAY checkout

You need to send at least the following gateway operations: 

PAYMENT_INIT -> PAYMENT_REQUEST -> PAYMENT_CONFIRM

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

//check error code in $res ...

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

//check error code in $res ...

$req = $requestBuilder
    ->operation(OperationType::OPERATION_PAYMENT_CONFIRM)
    ->transactionId($res->getHead()->getTransactionId())
    ->build();
    
$res = $client->postRequest($req);

```