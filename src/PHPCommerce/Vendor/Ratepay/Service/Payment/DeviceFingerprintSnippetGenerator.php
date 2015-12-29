<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

class DeviceFingerprintSnippetGenerator {

    /**
     * @var string
     */
    protected $deviceIdentSId;

    public function __construct($deviceIdentSId) {
        $this->deviceIdentSId = $deviceIdentSId;
    }

    /**
     * Generates a DeviceIdentToken for the given customerId
     * @param $customerId
     * @return string
     */
    public static function generateDeviceIdentToken($customerId) {
        $timestamp = microtime();
        $deviceIdentToken = md5($customerId . "_" . $timestamp);
        return $deviceIdentToken;
    }

    /**
     * Returns an HTML snippet which must be injected in the checkout page
     * @param string $deviceIdentToken - Device Ident Token which must be generated via the generateDeviceIdentToken() function
     * @return string
     */
    public function generateJavascriptSnippet($deviceIdentToken) {
        $snippet   = sprintf(
            "<script language=\"JavaScript\">var di = %s;</script>",
            json_encode([
                't' => $deviceIdentToken,
                'v' => $this->deviceIdentSId,
                'l' => "Checkout"
            ])
        );

        $snippet .= sprintf(
            "<script type=\"text/javascript\" src=\"//d.ratepay.com/%s/di.js\"></script>",
            $this->deviceIdentSId
        );

        return $snippet;
    }

}