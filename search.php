<?php
require "config.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <?php
        $noresult = true;
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        // Example: Display search terms for context
        echo '<h4>You searched for "' . $type . ' - ' . $status . '"</h4>';

        // Database query with filters
        $sql = "SELECT * FROM house WHERE status = :status";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':status' => $status]);

        // Wrap the results in a Bootstrap row to display in rows
        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">'; // Start the row container with responsive columns

        // Check if any rows were found
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $noresult = false;
            echo "<div class='col mb-4'> <!-- This col will be responsive and wrap -->
                    <div class='card shadow-sm h-100 border-0'>
                        <div class='position-relative' style='height: 200px; overflow: hidden;'>
                            <img src='https://images.unsplash.com/photo-1560185127-6ed189bf02f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80' alt='{$row['house_number']}' class='img-fluid w-100 h-100 object-fit-cover'>
                            <span class='badge bg-primary position-absolute top-0 start-0 m-2'>{$row['status']}</span>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>House Number: {$row['house_number']}</h5>
                            <div class='text-muted mb-2'>
                                <i class='bi bi-geo-alt me-1'></i>Address: {$row['street_name']}
                            </div>
                            <div class='d-flex justify-content-between align-items-center'>
                                <span class='fw-bold text-primary'>\$3456</span>
                                <a href='tel:03224318049' class='btn btn-sm btn-outline-primary'>Details</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }

        // Close the row container
        echo '</div>'; // End the row container

        // If no results found
        if ($noresult) {
            echo "<p>Sorry, no house found or it does not exist.</p>";
        }
        ?>

    </div>
</body>
</html>

<?php include "footer1.php"; ?>
