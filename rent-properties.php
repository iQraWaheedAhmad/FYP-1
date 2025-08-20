<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recent Properties</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .object-fit-cover {
      object-fit: cover;
    }
  </style>
</head>
<body class="bg-light">
<!-- Recent Properties Section -->
<section class="py-5 bg-white">
  <div class="container-fluid px-4">
    <div class="row justify-content-between align-items-center mb-4">
      <div class="col-6">
        <h2 class="h3 fw-bold mb-0">Recent Properties</h2>
      </div>
      <div class="col-6 text-end">
        <a href="index1.php" class="btn btn-outline-primary d-inline-flex align-items-center">
          View All <i class="bi bi-arrow-right ms-2"></i>
        </a>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <?php
        $properties = [
          [
            "id" => 1,
            "title" => "Modern Apartment in City Center",
            "location" => "Downtown, Metro City",
            "price" => "$1,200/month",
            "type" => "rent",
            "image" => "https://images.unsplash.com/photo-1560185127-6ed189bf02f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
            "beds" => 2,
            "baths" => 1,
            "area" => "750 sq ft"
          ],
          [
            "id" => 2,
            "title" => "Family Home with Garden",
            "location" => "Greenville, Metro City",
            "price" => "$350,000",
            "type" => "sale",
            "image" => "https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80",
            "beds" => 4,
            "baths" => 2,
            "area" => "2200 sq ft"
          ],
          [
            "id" => 3,
            "title" => "Luxury Villa with Pool",
            "location" => "Hillside, Metro City",
            "price" => "$5,500/month",
            "type" => "rent",
            "image" => "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
            "beds" => 5,
            "baths" => 4,
            "area" => "3500 sq ft"
          ],
        ];

        foreach ($properties as $property):
          $badgeClass = $property["type"] === "rent" ? "bg-primary" : "bg-success";
          $badgeText = $property["type"] === "rent" ? "For Rent" : "For Sale";
      ?>
      <div class="col-sm-10 col-md-6 col-lg-4">
        <div class="card shadow-sm h-100 border-0">
          <div class="position-relative" style="height: 200px; overflow: hidden;">
            <img src="<?= $property["image"] ?>" alt="<?= $property["title"] ?>" class="img-fluid w-100 h-100 object-fit-cover">
            <span class="badge <?= $badgeClass ?> position-absolute top-0 start-0 m-2"><?= $badgeText ?></span>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $property["title"] ?></h5>
            <div class="text-muted mb-2">
              <i class="bi bi-geo-alt me-1"></i> <?= $property["location"] ?>
            </div>
            <div class="d-flex flex-wrap mb-3 text-muted small">
              <span class="me-3"><i class="bi bi-house-door me-1"></i><?= $property["beds"] ?> Beds</span>
              <span class="me-3"><i class="bi bi-droplet-half me-1"></i><?= $property["baths"] ?> Baths</span>
              <span><i class="bi bi-aspect-ratio me-1"></i><?= $property["area"] ?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <span class="fw-bold text-primary"><?= $property["price"] ?></span>
              <a href="tel:03224318049" class="btn btn-sm btn-outline-primary">Details</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
