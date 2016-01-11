<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\Tests;

use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\PaymentHistoryCsvFileGenerator;
use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\PaymentHistoryEntry;
use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\SFTPClient;
use PHPUnit_Framework_TestCase;

class PaymentHistoryCsvFileGeneratorTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
    }

    public function testCsvFilename() {
        $filename = PaymentHistoryCsvFileGenerator::generateCsvFilename("12345", 1);
        $this->assertSame("12345_history_" . date("Y-m-d") ."_001.csv", $filename);
    }

    public function testCSV() {
        $instance = new PaymentHistoryCsvFileGenerator();

        $instance->addEntry(
            (new PaymentHistoryEntry())
                ->setShopOrderId("123456")
                ->setShopCustomerId("sci1234")
                ->setOrderDate("2013-11-03")
                ->setOrderTime("09:17:24")
                ->setDeliveryDate("2013-12-03")
                ->setPaymentDate("2014-01-09")
                ->setPaymentMethod(PaymentHistoryEntry::PAYMENT_METHOD_INVOICE_VIA_SHOP)
                ->setCurrency('EUR')
                ->setOrderAmount(110.00)
                ->setPaymentAmount(90.00)
                ->setCancellationAmount(0.00)
                ->setReturnAmount(0.00)
                ->setLoginFlag(1)
                ->setNewAddressFlag(0)
                ->setReturningPeriod(14)

        );


        $instance->addEntry(
            (new PaymentHistoryEntry())
                ->setShopOrderId("123456")
                ->setShopCustomerId("sci1234")
                ->setOrderDate("2013-11-03")
                ->setOrderTime("09:17:24")
                ->setDeliveryDate("2013-12-03")
                ->setPaymentDate("2014-01-09")
                ->setPaymentMethod(PaymentHistoryEntry::PAYMENT_METHOD_INVOICE_VIA_SHOP)
                ->setCurrency('EUR')
                ->setOrderAmount(110.00)
                ->setPaymentAmount(90.00)
                ->setCancellationAmount(0.00)
                ->setReturnAmount(0.00)
                ->setLoginFlag(1)
                ->setNewAddressFlag(0)
                ->setReturningPeriod(14)

        );

        $tmpFile = tempnam('/tmp', 'PaymentHistoryCsvFileGeneratorTest');

        $instance->assembleCsvAndMD5File($tmpFile);

        $csvContent = file_get_contents($tmpFile);

        $this->assertSame(
            chr(0xEF) . chr(0xBB) . chr(0xBF) . //bom
            "FileRownumber;InterfaceVersion;ShopsOrder_ID;ShopsCustomer_ID;OrderDate;OrderTime;DeliveryDate;PaymentDate;PaymentMethod;Currency;OrderAmount;PaymentAmount;CancellationAmount;ReturnAmount;LoginFlag;NewAddressFlag;ReturningPeriod\r\n" .
            "1;2;123456;sci1234;2013-11-03;09:17:24;2013-12-03;2014-01-09;INV1;EUR;110;90;0;0;1;0;14\r\n" .
            "2;2;123456;sci1234;2013-11-03;09:17:24;2013-12-03;2014-01-09;INV1;EUR;110;90;0;0;1;0;14\r\n",  $csvContent);

        $calculatedMd5 = file_get_contents($tmpFile . ".md5");
        $this->assertSame(md5($csvContent), $calculatedMd5);

        unlink($tmpFile);
        unlink($tmpFile.".md5");
    }
}