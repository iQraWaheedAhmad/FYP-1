<?php
include "config.php"; // Database connection

// Ensure the resident is logged in
if (!isset($_SESSION['resident_id']) || ($_SESSION['resident_role'] !== 'admin' && $_SESSION['resident_role'] !== 'user')) {
    header('Location: logout.php');
    exit();
}


if (isset($_POST['place_bid'])) {
    $bid_id = $_POST['bid_id'];
    $resident_id = $_SESSION['resident_id'];
    $bid_amount = $_POST['bid_amount'];

    // Check if the bid is higher than the current bid
    $stmt = $pdo->prepare("SELECT current_bid FROM bidding WHERE bid_id = ?");
    $stmt->execute([$bid_id]);
    $current_bid = $stmt->fetchColumn();
    if (empty($bid_amount)) 
    {
        $errors[] = 'Bid Amount is required';
    }
  	

    if ($bid_amount > $current_bid) {
        $stmt = $pdo->prepare("UPDATE bidding SET current_bid = ?, winner_id = ? WHERE bid_id = ?");
        $stmt->execute([$bid_amount, $resident_id, $bid_id]);
       // echo "<div class='alert alert-success'>Bid placed successfully!</div>";
        $errors[] = 'Bid placed successfully!';
    } else {
        //echo "<div class='alert alert-danger'>Bid must be higher than the current bid!</div>";
        $errors[] = 'Bid must be higher than the current bid!';
    }
}

// Fetch available auctions for bidding
$auctions = $pdo->query("SELECT * FROM bidding WHERE status = 'open'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Bid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="container-fluid px-4">
    <h1 class="mt-4" style="color: white;">Place A Bid</h1>
    <ol class="breadcrumb mb-4">
    	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="auction.php">Bid Management</a></li>
        <li class="breadcrumb-item active">Place A Bid</li>
    </ol>
	<div class="col-md-4">
		<?php

		if(isset($errors))
        {
            foreach ($errors as $error) 
            {
                if(strpos($error, 'Bid placed successfully!') !== false) {
                    echo "<div class='alert alert-success'>$error</div>";
                } else {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
        }

		?>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Pay Now</h5>
			</div>
			<div class="card-body">
             <?php while ($auction = $auctions->fetch()) { ?>
            <form action="place_bid.php" method="POST">
                <div class="form-group">
                    <label for="bid_amount"><b>Bid for House: </b><?= $auction['property_id'] ?></label><br>
                    <label for="bid_amount"><b>Current Price House: </b><?= $auction['start_price'] ?></label><br>
                    <label for="bid_amount"><b>Current Bid Price House: </b><?= $auction['current_bid'] ?></label><br>
                    <label for="bid_amount"><b>Remaining Time: </b><?= $auction['end_date'] ?></label><br>
                    <label for="bid_amount">Your Amount for Bid</label>
                    <input type="number" class="form-control" name="bid_amount" required>
                    <input type="hidden" name="bid_id" value="<?= $auction['bid_id'] ?>">
                </div>
                <button type="submit" name="place_bid" class="btn btn-primary">Place Bid</button>
            </form>
        <?php } ?>
		</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>


<?php

include('footer.php');

?>