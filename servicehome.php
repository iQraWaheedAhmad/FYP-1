<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Services - Housing Society</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .service-icon {
      font-size: 1.75rem;
      color: #2563eb;
      background-color: #e6e6e6;
      padding: 10px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 48px;
      height: 48px;
    }
    .service-card {
      transition: box-shadow 0.3s ease;
    }
    .service-card:hover {
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<section class="py-5">
  <div class="container-fluid px-3 ps-4"> <!-- Added extra left padding with px-3 and ps-4 -->

    <div class="text-center mb-5">
      <h2 class="fw-bold">Our Services</h2>
      <p class="text-muted mx-auto" style="max-width: 600px;">
        We provide comprehensive services to make property management simple and efficient.
      </p>
    </div>

    <div class="row g-4">
      <?php
        $services = [
            ["icon" => "fa-shield-alt", "title" => "Street Cleaning", "desc" => "Regular cleaning and maintenance of streets to ensure a clean and hygienic environment."],
            ["icon" => "fa-search", "title" => "Electricity & Power Backup", "desc" => "Reliable electricity supply with 24/7 power backup to avoid interruptions."],
            ["icon" => "fa-users", "title" => "Visitor Management System", "desc" => "Modern digital system to track and manage all visitors entering the society."],
            ["icon" => "fa-cogs", "title" => "Event Space", "desc" => "Dedicated community halls and open spaces for hosting social or private events."],
            ["icon" => "fa-sliders-h", "title" => "Parks & Green Areas", "desc" => "Beautifully maintained parks and green zones for relaxation, exercise, and family time."],
            ["icon" => "fa-file-alt", "title" => "Medical Services", "desc" => "On-site clinics and emergency medical facilities for residents' health and safety."]
        ];

        foreach ($services as $service) {
          echo '
            <div class="col-sm-6 col-lg-4">
              <div class="bg-white p-4 rounded shadow-sm service-card h-100">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon me-3">
                    <i class="fas ' . $service["icon"] . '"></i>
                  </div>
                  <h5 class="mb-0 fw-semibold">' . $service["title"] . '</h5>
                </div>
                <p class="text-muted">' . $service["desc"] . '</p>
              </div>
            </div>';
        }
      ?>
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
