# php-ratepay


## Example for a RatePAY checkout

You need to send at least the following gateway operations: 

PAYMENT_INIT -> PAYMENT_REQUEST -> PAYMENT_CONFIRM

```php
use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Exception\RatepayException;
use PHPCommerce\Vendor\Ratepay\Service\Payment\GatewayClientImpl;
use PHPCommerce\Vendor\Ratepay\Service\Payment\RatepayBrokerImpl;
use PHPCommerce\Vendor\Ratepay\Service\Payment\RatepayConfiguration;
use PHPCommerce\Vendor\Ratepay\Service\Payment\RatepayCredential;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\AddressType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ContactsType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\CustomerType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ExternalType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\PaymentType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\RequestHeadType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\PhoneType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\RequestType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ShoppingBasketItemType;
use PHPCommerce\Vendor\Ratepay\Service\Payment\Type\ShoppingBasketType;

require_once('vendor/autoload.php');

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__ . "/vendor/jms/serializer/src");
    
//Client := Guzzle 6.x compatible client
$client = new GatewayClientImpl(new Client(), 'https://gateway-int.ratepay.com/api/xml/1_0');

// you can optionally define a logger which will receice debug log messages from the GatewayClient
//$client->setLogger(new Logger());

$ratepayConfiguration = (new RatepayConfiguration())
    ->setGatewayRequestCredentialProfileId("you-profile-id")
    ->setGatewayRequestCredentialSecuritycode("your-security-code")
    ->setGatewayRequestSystemId("systemId");

$ratepayBroker = new RatepayBrokerImpl($ratepayConfiguration, $client);

try {
    $transactionId = $ratepayBroker->paymentInit();

    $paymentRequest = $ratepayBroker->getRequestBuilder()
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

    $res = $ratepayBroker->paymentRequest($transactionId, $paymentRequest);

    /** @var PaymentRequestResponseType $paymentRequestResponse */
    $paymentRequestResponse = $res->getContent();

    $descriptor = $paymentRequestResponse->getPayment()->getDescriptor();
    
    // save $descriptor for your reference
			
    $ratepayBroker->paymentConfirm($transactionId);

} catch (RatepayException $e) {
    $message = ($e->getCustomerMessage() != "") ?
        $e->getCustomerMessage() : "The RatePAY transaction could not be processed";

    echo $message;
}
```

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


Please note: The gateway operations are exposed through the `RatepayBroker` object. 

## JMS Serializer Library Usage Note

This library makes heavy use of the JMS-Serializer library which itself makes heavy ues of the doctrine annotation features.

To use the library in a standalone environment make sure to register the serializer source directory in the
doctrine annotation registry.

```php
AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__ . "/vendor/jms/serializer/src");
```


## Appendix: Result Codes

The following result codes are only for internal reference in the library and are exposed
via the the `RejectionException`, `TechnicalException` and `WarningException` if you use the
`RatepayBroker` object.

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
