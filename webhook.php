<?php
/**
 * Created by PhpStorm.
 * User: talibehackeur
 * Date: 09/11/2016
 * Time: 00:25
 */
require_once __DIR__.'/vendor/autoload.php';
$mollie = new Mollie_API_Client;
$mollie->setApiKey('test_ueH25gaBac9NcjqSNmjeg6CvzztDUE');

$payment    = $mollie->payments->get($_POST["id"]);

/*
 * The order ID saved in the payment can be used to load the order and update it's
 * status
 */
$order_id = $payment->metadata->order_id;

if ($payment->isPaid())
{
    /*
     * At this point you'd probably want to start the process of delivering the product
     * to the customer.
     */
}
elseif (! $payment->isOpen())
{
    /*
     * The payment isn't paid and isn't open anymore. We can assume it was aborted.
     */
}