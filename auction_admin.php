<?php

require_once 'config.php';

if (!isset($_SESSION['resident_id']) || $_SESSION['resident_role'] !== 'admin') 
{
  	header('Location: logout.php');
  	exit();
}

if(isset($_GET['action'], $_GET['bid_id']) && $_GET['action'] == 'delete')
{
	$stmt = $pdo->prepare("DELETE FROM bidding WHERE bid_id = ?");
  	$stmt->execute([$_GET['bid_id']]);
  	$_SESSION['success'] = 'House Data has been removed';
  	header('location:auction_admin.php');
}

include('header.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Auction House Management</h1>
    <ol class="breadcrumb mb-4">
    	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Auction House Management</li>
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
					<h5 class="card-title">Auction House Management</h5>
				</div>
				<div class="col col-6">
					<div class="float-end"><a href="add_auction_house.php" class="btn btn-success btn-sm">Add</a></div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-bordered" id="auction-house-table">
					<thead>
						<tr>
							<td>Bid ID</td>
							<th>House Number</th>
							<th>Start Price</th>
							<th>Current Bid price</th>
							<th>Start Date</th>
                            <th>End Date</th>
							<th>Status</th>
                            <th>Winner ID</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
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

<script>

$(document).ready(function() {
    $('#auction-house-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
        	url: 'action.php',
        	method:"POST",
        	data: {action : 'fetch_auction_house'}
        },
        "columns": [
            { "data": "bid_id" },
            { "data": "property_id" },
            { "data": "start_price" },
            { "data": "current_bid" },
            { "data": "start_date" },
            { "data": "end_date" },
            { "data": "status" },
            { "data": "winner_id" },
            {
        		"data": null,
        		"render": function(data, type, row) {
          			return '<a href="edit_bid.php?bid_id='+row.bid_id+'" class="btn btn-sm btn-primary">Approve</a>';
        		}
        	}
        ]
    });

    $(document).on('click', '.delete_btn', function(){
    	if(confirm("Are you sure you want to remove this auction house data?"))
    	{
    		window.location.href = 'auction_admin.php?action=delete&bid_id=' + $(this).data('bid_id') + '';
    	}
    });
});

</script>