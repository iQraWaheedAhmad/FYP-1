<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PropertyPortal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>

  
  <!-- Footer -->
  <footer class="bg-primary text-white pt-5">
    <div class="container py-4 mt-3">
      <div class="row gy-4">

        <!-- About -->
        <div class="col-md-4">
          <h5 class="fw-bold mb-3">PropertyPortal</h5>
          <p>Your one-stop solution for property management. Find, rent, or sell properties with ease.</p>
          <div class="d-flex gap-3 mt-3">
            <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-4">
          <h5 class="fw-bold mb-3">Contact Us</h5>
          <ul class="list-unstyled">
            <li class="d-flex mb-2">
              <i class="fas fa-map-marker-alt me-2 mt-1"></i>
              <span>123 Property Lane, Housing City, HC 12345</span>
            </li>
            <li class="d-flex mb-2">
              <i class="fas fa-phone me-2 mt-1"></i>
              <span>+1 (123) 456-7890</span>
            </li>
            <li class="d-flex">
              <i class="fas fa-envelope me-2 mt-1"></i>
              <span>info@propertyportal.com</span>
            </li>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="col-md-4">
          <h5 class="fw-bold mb-3">Newsletter</h5>
          <p>Subscribe to our newsletter for the latest updates on properties and services.</p>
          <form class="d-flex">
            <input type="email" class="form-control me-2" placeholder="Enter your email" required>
            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>
        </div>

      </div>
    </div>

    <!-- Copyright -->
    <div class="mt-2 pt-2 text-center border-top border-white">
      <p class="mb-2">&copy; <?php echo date("Y"); ?> Housing Society Management System. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
