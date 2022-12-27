<?php
require_once("includes/paypalConfig.php");
require_once("billingPlan.php");

$id = $plan->getId();

use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

// Create new agreement
$agreement = new Agreement();
$agreement->setName('Subscription to Weflix')
  ->setDescription('$9.98 of setup fee and then 9.99 recurring payments to Weflix')
  ->setStartDate(gmdate("Y-m-d\TH:i:s\Z", strtotime("+7 month", time())));

// Set plan id
$plan = new Plan();
$plan->setId($id);
$agreement->setPlan($plan);

// Add payer type
$payer = new Payer();
$payer->setPaymentMethod('paypal');
$agreement->setPayer($payer);

try {
    // Create agreement
    $agreement = $agreement->create($apiContext);
  
    // Extract approval URL to redirect user
    $approvalUrl = $agreement->getApprovalLink();
    header("Location: $approvalUrl");
  } catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
  } catch (Exception $ex) {
    die($ex);
  }
?>