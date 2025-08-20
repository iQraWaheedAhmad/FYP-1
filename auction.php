<?php

require_once 'config.php';

if (!isset($_SESSION['resident_id']) && ($_SESSION['resident_role'] !== 'admin' || $_SESSION['resident_role'] !== 'user')) 
{
  	header('Location: logout.php');
  	exit();
}
$stmt = $pdo->prepare("SELECT * FROM bidding WHERE status = 'open'");
$stmt->execute();
$houses = $stmt->fetchAll();

include('header.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Auction Houses</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Auction Houses</li>
    </ol>
	
    <?php

    if(isset($_SESSION['success']))
	{
		echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';

		unset($_SESSION['success']);
	}

    ?>
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-6">
					<h5 class="card-title">Auction Houses Management</h5>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-bordered" id="complaints-table">
					<thead>
						<tr>
							<th>House Number</th>
                            <th>Start Price</th>
                            <th>Current Bid</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
						</tr>
					</thead>
		<tbody>
            <?php foreach ($houses as $house): ?>
                <tr>
                    <td><?php echo $house['property_id']; ?></td>
                    <td><?php echo number_format($house['start_price'], 2); ?></td>
                    <td><?php echo number_format($house['current_bid'], 2); ?></td>
                    <td><?php echo $house['end_date']; ?></td>
                    <td><?php echo $house['status']; ?></td>
                    <td><a href="place_bid.php?house_id=<?php echo $house['property_id']; ?>" class="btn btn-primary">Place Bid</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">


<?php

include('footer.php');

?>

