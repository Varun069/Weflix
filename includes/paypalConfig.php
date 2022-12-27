<?php
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATI1Kvg-U9rT1evQT0fycJ_bMcyWGmcOzU8dlEj-AWN8q6B00svPlH2TRTSsOn2mECEroEC-PfKep89I',     // ClientID
        'ELTG1Kl3IiBIl6h5-cNI_5vkEGCu2ps9W2YIFx_aSNB9_01ZABUd0btt8nbPTxdY2WMBlSE40vt-B_fS'      // ClientSecret
    )
);

?>