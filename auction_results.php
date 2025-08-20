<?php
include "config.php"; // Database connection

// Fetch auction details and the winner
$auctions = $pdo->query("SELECT * FROM bidding WHERE status = 'closed'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Auction Results</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>House ID</th>
                    <th>Highest Bid</th>
                    <th>Winner</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($auction = $auctions->fetch()) {
                    $winner_id = $auction['winner_id'];
                    $stmt = $pdo->prepare("SELECT name FROM resident WHERE id = ?");
                    $stmt->execute([$winner_id]);
                    $winner_name = $stmt->fetchColumn();
                ?>
                    <tr>
                        <td><?= $auction['property_id'] ?></td>
                        <td><?= $auction['current_bid'] ?></td>
                        <td><?= $winner_name ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
