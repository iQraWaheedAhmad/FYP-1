<?php
require_once 'config.php';

// Message variable for feedback to the admin
$statusMsg = '';

// Fetch all houses that are not already in auction
$sql = "SELECT * FROM house WHERE status != 'auction'";
$stmt = $pdo->query($sql);
$houses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission when adding a house to auction
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_auction'])) {
    $property_id = $_POST['property_id'];
    $start_price = $_POST['start_price'];
    $end_date = $_POST['end_date'];
    $start_date = $_POST['start_date'];

    // Update the selected house status to 'auction' and set auction details
    $update_sql = "UPDATE house SET status = 'auction', start_price = :start_price, end_date = :end_date, created_at = :start_date 
                   WHERE id = :property_id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->execute([
        ':start_price' => $start_price,
        ':end_date' => $end_date,
        ':start_date' => $start_date,
        ':property_id' => $property_id
    ]);

    // Insert the auction details into the bidding table
    $insert_sql = "INSERT INTO bidding (property_id, start_price, start_date, end_date, status) 
                   VALUES (:property_id, :start_price, :start_date, :end_date, 'open')";
    $insert_stmt = $pdo->prepare($insert_sql);
    $insert_stmt->execute([
        ':property_id' => $property_id,
        ':start_price' => $start_price,
        ':start_date' => $start_date,
        ':end_date' => $end_date
    ]);

    $statusMsg = "House has been added to auction successfully!";
}

if (!isset($_SESSION['resident_id']) || $_SESSION['resident_role'] !== 'admin') {
    header('Location: logout.php');
    exit();
}

include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Auction House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="color: white;">Add Auction House</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Auction House</li>
        </ol>
        <div class="col-md-4">
            <?php if ($statusMsg): ?>
                <div class="alert alert-success"><?php echo $statusMsg; ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Auction House</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="property_id">Select House</label>
                            <select name="property_id" class="form-control" required>
                                <option value="">-- Select House --</option>
                                <?php foreach ($houses as $house): ?>
                                    <option value="<?php echo $house['id']; ?>"><?php echo $house['house_number']; ?> - <?php echo $house['street_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_price">Starting Price</label>
                            <input type="number" name="start_price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Auction Start Date</label>
                            <input type="datetime-local" name="start_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="end_date">Auction End Date</label>
                            <input type="datetime-local" name="end_date" class="form-control" required>
                        </div>

                        <button type="submit" name="add_to_auction" class="btn btn-primary">Add to Auction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('footer.php'); ?>
