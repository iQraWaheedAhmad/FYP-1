<?php
require_once('stripe-php-master/init.php');
\Stripe\Stripe::setVerifySslCerts(false);
$publickey = 'pk_test_51QoAhTRwGmNYIkwQ2vAFQ7N1L0Ml4kqZ2tugtrHLK5qtiBQivHXXz7CM2fcZgaXk8x8IH6asIzML12WYtxS9elB900yjMbJOg6';
$secretkey = 'sk_test_51QoAhTRwGmNYIkwQwXXYC1Mw3SLbJCwLFWHvZ9vI9Ei5cXkYmCKFxKiKDHdpmJiYcCFa6g3CRcSTxVrziATz3OTW00xD5hfZZb';
\Stripe\Stripe::setApiKey($secretkey);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['stripeToken'];
    // $email = $_POST['email'];

    try {
        $charge = \Stripe\Charge::create([
            'amount' => 5000, // Amount in cents
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            // 'receipt_email' => $email,
        ]);
        echo 'Payment successful!';
    } catch (\Stripe\Exception\CardException $e) {
        echo 'Payment failed: ' . $e->getMessage();
    }
}
?>