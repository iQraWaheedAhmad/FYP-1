<?php

require_once 'config.php';

if (!isset($_SESSION['resident_id']) || $_SESSION['resident_role'] !== 'admin') 
{
  	header('Location: logout.php');
  	exit();
}

if(isset($_POST['edit_bid']))
{
	// Validate the form data
  	$bid_status = $_POST['bid_status'];
  	$id = $_POST['bid_id'];

  	if (empty($bid_status)) 
  	{
	    $errors[] = 'Bid Status is required';
  	}
  	// If the form data is valid, update the user's password
  	if (empty($errors)) 
  	{ 
        $id = $_GET['bid_id'];
  		$sql = "UPDATE bidding SET status = ? WHERE bid_id = ?";
        echo $sql;

  		$pdo->prepare($sql)->execute([$bid_status, $id]);
          echo $sql;
  		$_SESSION['success'] = 'Bid close successfully';
            echo $_SESSION['success'];
  		header('location:auction_admin.php');
  		exit();
  	}
}

if(isset($_GET['bid_id']))
{
	// Prepare a SELECT statement to retrieve the flats's details
  	$stmt = $pdo->prepare("SELECT * FROM bidding WHERE bid_id = ?");
  	$stmt->execute([$_GET['bid_id']]);

  	// Fetch the user's details from the database
  	$flat = $stmt->fetch(PDO::FETCH_ASSOC);
}

include('header.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Close Bid</h1>
    <ol class="breadcrumb mb-4">
    	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="auction_admin.php">Auction House Management</a></li>
        <li class="breadcrumb-item active">Close Bid Management</li>
    </ol>
	<div class="col-md-4">
		<?php

		if(isset($errors))
        {
            foreach ($errors as $error) 
            {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }

		?>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Close Bid</h5>
                <!-- <?php $bidding['bid_id'];?> -->
			</div>
			<div class="card-body">
				<form id="add-house-form" method="POST">
				  	<div class="mb-3">
				    	<label for="house-number" class="form-label">Bid Status</label>
				    	<input type="text" class="form-control" id="bid_status" name="bid_status" value="<?php echo (isset($bidding['bid_status'])) ? $bidding['bid_status'] : ''; ?>">
				  	</div>
				  	<input type="hidden" name="bid_id" value="<?php echo (isset($bidding['bid_id'])) ? $bidding['bid_id'] : ''; ?>" />
				  	<button type="submit" name="edit_bid" class="btn btn-primary">Close Bid</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

include('footer.php');

?>