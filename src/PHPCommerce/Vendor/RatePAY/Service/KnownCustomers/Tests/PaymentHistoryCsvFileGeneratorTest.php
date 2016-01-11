<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\Tests;

use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\PaymentHistoryCsvFileGenerator;
use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\PaymentHistoryEntry;
use PHPCommerce\Vendor\RatePAY\Service\KnownCustomers\SFTPClient;
use PHPUnit_Framework_TestCase;

class PaymentHistoryCsvFileGeneratorTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
    }

    public function testCSV() {
        $instance = new PaymentHistoryCsvFileGenerator();

        $instance->addEntry(
            (new PaymentHistoryEntry())
                ->setCurrency('EUR')
        );

        $tmpFile = tempnam('/tmp', 'PaymentHistoryCsvFileGeneratorTest');

        $instance->assembleCsvAndMD5File($tmpFile);

        $csvContent = file_get_contents($tmpFile);

        $this->assertSame(
            chr(0xEF) . chr(0xBB) . chr(0xBF) . //bom
            "FileRownumber;InterfaceVersion;ShopsOrder_ID;ShopsCustomer_ID;OrderDate;OrderTime;DeliveryDate;PaymentDate;PaymentMethod;Currency;OrderAmount;PaymentAmount;CancellationAmount;ReturnAmount;LoginFlag;NewAddressFlag;ReturningPeriod\r\n" .
            "1;2;;;;;;;;EUR;;;;;;;\r\n",  $csvContent);

        $calculatedMd5 = file_get_contents($tmpFile . ".md5");
        $this->assertSame(md5($csvContent), $calculatedMd5);

        unlink($tmpFile);
        unlink($tmpFile.".md5");
    }
}