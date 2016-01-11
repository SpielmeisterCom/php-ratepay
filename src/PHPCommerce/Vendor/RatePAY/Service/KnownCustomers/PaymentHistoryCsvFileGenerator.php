<?php
namespace PHPCommerce\Vendor\RatePAY\Service\KnownCustomers;

use Exception;

class PaymentHistoryCsvFileGenerator {
    const INTERFACE_VERSION = 2;

    protected $fileRowNumber;

    protected $csvData;

    public function __construct() {
        $this->resetCsvData();
    }

    protected function resetCsvData() {
        $this->csvData = [
            ['FileRownumber', 'InterfaceVersion', 'ShopsOrder_ID' , 'ShopsCustomer_ID', 'OrderDate', 'OrderTime',
             'DeliveryDate', 'PaymentDate', 'PaymentMethod', 'Currency', 'OrderAmount', 'PaymentAmount',
             'CancellationAmount', 'ReturnAmount', 'LoginFlag', 'NewAddressFlag', 'ReturningPeriod'
            ]
        ];

        $this->fileRowNumber = 1;
    }

    public function addEntry(PaymentHistoryEntry $entry) {
        $entry = [
            $this->fileRowNumber++,
            self::INTERFACE_VERSION,
            $entry->getShopOrderId(),
            $entry->getShopCustomerId(),
            $entry->getOrderDate(),
            $entry->getOrderTime(),
            $entry->getDeliveryDate(),
            $entry->getPaymentDate(),
            $entry->getPaymentMethod(),
            $entry->getCurrency(),
            $entry->getOrderAmount(),
            $entry->getPaymentAmount(),
            $entry->getCancellationAmount(),
            $entry->getReturnAmount(),
            $entry->getLoginFlag(),
            $entry->getNewAddressFlag(),
            $entry->getReturningPeriod()
        ];

        $this->csvData[] = $entry;
    }

    public function assembleCsvAndMD5File($outputFile) {
        //flush internal data to CSV output file
        $fp = @fopen($outputFile, 'w');

        if(!$fp) {
            throw new Exception("Could not open " . $outputFile . " for writing");
        }

        //manually add UTF8 Byte Order Mark to generated document
        $ret = @fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
        if($ret === false) {
            throw new Exception("Could not add BOM to generated csv file");
        }

        foreach ($this->csvData as $row) {
            $ret = @fputcsv($fp, $row, ';', '"');

            if($ret === false) {
                throw new Exception("Could not write CSV data");
            }
        }

        @fclose($fp);

        $csvFileContent = @file_get_contents($outputFile);
        if(!$csvFileContent) {
            throw new Exception("Could not read CSV file content");
        }

        $csvFileContent = str_replace ("\n", "\r\n", $csvFileContent);
        $ret = @file_put_contents($outputFile, $csvFileContent);
        if($ret === false) {
            throw new Exception("Could not write CSV file content");
        }

        //create md5 file
        $md5sum = @md5_file($outputFile);
        if($md5sum === false) {
            throw new Exception("Could not create MD5 sum of generated CSV file");
        }

        $ret = @file_put_contents($outputFile.".md5", $md5sum);
        if($ret === false) {
            throw new Exception("Could not open " . $outputFile . ".md5 for writing");
        }

        //clear internal state
        $this->resetCsvData();
    }
}