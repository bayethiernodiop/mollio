<?php
require "vendor/autoload.php";
$mollie = new Mollie_API_Client();
$mollie->setApiKey("test_ueH25gaBac9NcjqSNmjeg6CvzztDUE");
$payment = $mollie->payments->create(array(
    "amount" => 10.00,
    "description" => "My first API payment",
    "redirectUrl" => "https://molio.herokuapp.com",
));
echo $payment->id;
$payment = $mollie->payments->get($payment->id);
if ($payment->isPaid()) {
    echo ("Payment received.");
} else {
    echo ("Payment cancelled.");
}