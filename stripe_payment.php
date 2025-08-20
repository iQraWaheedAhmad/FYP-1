<?php 
    include "config.php";

	$payment_id = $statusMsg = ''; 
	$ordStatus = 'error';
	$id = '';

	// Check whether stripe token is not empty
	if(!empty($_POST['stripeToken'])){

		// Get Token, Card and User Info from Form
		$token = $_POST['stripeToken'];
		$name = $_POST['holdername'];
		$email = $_POST['email'];
		$card_no = $_POST['card_number'];
		$card_cvc = $_POST['card_cvc'];
		$card_exp_month = $_POST['card_exp_month'];
		$card_exp_year = $_POST['card_exp_year'];
		$price = $_POST['amount'];

		// Ensure price is at least $0.50 USD
		if ($price < 0.50) {
			$statusMsg = "The payment amount must be at least $0.50 USD.";
			echo $statusMsg;
			exit;  // Stop further execution if the amount is too low
		}

		// Include STRIPE PHP Library
		require_once('stripe-php/init.php');

		// Set your secret key
		$stripe = array(
		"SecretKey"=>"sk_test_51QoAhTRwGmNYIkwQwXXYC1Mw3SLbJCwLFWHvZ9vI9Ei5cXkYmCKFxKiKDHdpmJiYcCFa6g3CRcSTxVrziATz3OTW00xD5hfZZb",
		"PublishableKey"=>"pk_test_51QoAhTRwGmNYIkwQ2vAFQ7N1L0Ml4kqZ2tugtrHLK5qtiBQivHXXz7CM2fcZgaXk8x8IH6asIzML12WYtxS9elB900yjMbJOg6"
		);

		// Set API Key
		\Stripe\Stripe::setApiKey($stripe['SecretKey']);

		// Add customer to stripe
		$customer = \Stripe\Customer::create(array( 
		    'email' => $email, 
		    'source'  => $token,
		    'name' => $name
		));

		// Generate Unique order ID
		$orderID = strtoupper(str_replace('.','',uniqid('', true)));

		// Convert price to cents
		$itemPrice = $price * 100;  // Convert to cents
		$currency = "usd";

		// Charge a credit or a debit card
		$charge = \Stripe\Charge::create(array( 
		    'customer' => $customer->id, 
		    'amount'   => $itemPrice, 
		    'currency' => $currency, 
		    'metadata' => array( 
		        'order_id' => $orderID 
		    ) 
		));

		// Retrieve charge details
		$chargeJson = $charge->jsonSerialize();

		// Check whether the charge is successful
		if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

		    // Order details 
		    $transactionID = $chargeJson['balance_transaction']; 
		    $paidAmount = $chargeJson['amount']; 
		    $paidCurrency = $chargeJson['currency']; 
		    $payment_status = $chargeJson['status'];
		    $payment_date = date("Y-m-d H:i:s");
		    $dt_tm = date('Y-m-d H:i:s');

		    // Insert transaction data into the database
		    $sql = "INSERT INTO `stripe_payment`(`email`,`amount`,`card_number`,`card_expirymonth`,`card_expiryyear`,`status`,`paymentid`,`date`) 
		            VALUES (:email, :price, :card_no, :exp_month, :exp_year, :statu, :txn_id, :dt_tm)";
		    
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute([
		        ':email'     => $email,
		        ':price'     => $price,
		        ':card_no'   => $card_no,
		        ':exp_month' => $card_exp_month,
		        ':exp_year'  => $card_exp_year,
		        ':statu'     => $payment_status,
		        ':txn_id'    => $transactionID,
		        ':dt_tm'     => $dt_tm,
		    ]);

		    // If the order is successful 
		    if($payment_status == 'succeeded'){ 
		        $ordStatus = 'success'; 
		        $statusMsg = 'Your Payment has been Successful!'; 
		    } else{ 
		        $statusMsg = "Your Payment has Failed!"; 
		    } 
		} else{ 
		    $statusMsg = "Transaction has been failed!"; 
		} 
	} else{ 
	    $statusMsg = "Error on form submission."; 
	} 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Stripe Payment Gateway Integration in PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/stripe.css">
    </head>
<body>
	<?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="status MT-5">
                    <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
					<BR>
                    <h4 class="heading">Payment Information - </h4>
					<BR>
                    <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
                    <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?> ($<?php echo $price;?>.00)</p>
                    <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
                    <p><b>Price:</b> <?php echo $price.' '.$currency; ?> ($<?php echo $price;?>.00)</p>
                </div>
            </div>
        </div>
    </div>
	<?php include 'footer1.php'; ?>
  </div>
</body>
</html>
