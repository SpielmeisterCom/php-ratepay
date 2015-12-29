<?php
namespace PHPCommerce\Vendor\Ratepay\Service\Payment;

class DeviceFingerprintSnippetGenerator {

    /**
     * @var string
     */
    protected $deviceIdentSId;

    /**
     * @var string
     */
    protected $customerId;

    public function __construct($deviceIdentSId, $customerId) {
        $this->deviceIdentSId = $deviceIdentSId;
        $this->customerId = $customerId;
    }

    /**
     * Returns an HTML snippet which must be injected in the checkout page
     * @return string
     */
    public function getSnippet() {
        $timestamp = microtime();
        $deviceIdentToken = md5($this->customerId . "_" . $timestamp);

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