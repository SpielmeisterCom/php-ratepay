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

        $this->assertSame("1,2,,,,,,,,EUR,,,,,,,\n",  $csvContent);

        $calculatedMd5 = file_get_contents($tmpFile . ".md5");
        $this->assertSame(md5($csvContent), $calculatedMd5);

        unlink($tmpFile);
        unlink($tmpFile.".md5");
    }
}