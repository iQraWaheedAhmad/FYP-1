<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h1 class="text-center mb-2 fw-bold">Contact Us</h1>
  <p class="text-muted text-center mb-5">Get in touch with our team for any queries or assistance</p>

  <div class="row g-4">
    <!-- Contact Form -->
    <div class="col-lg-6">
      <h2 class="mb-4 fw-bold">Send Us a Message</h2>
      <div class="card shadow-sm">
        <div class="card-body">
          <form>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="John Doe" required>
              </div>
              <div class="col-sm-6">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" class="form-control" placeholder="john@example.com" required>
              </div>
            </div>

            <div class="mt-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" id="subject" class="form-control" placeholder="How can we help you?" required>
            </div>

            <div class="mt-3">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-4 w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="col-lg-6">
      <h2 class="mb-4 fw-bold">Contact Information</h2>
      <div class="d-grid gap-4">

        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-start gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
              <i class="fas fa-map-marker-alt text-primary fs-5"></i>
            </div>
            <div>
              <h5 class="fw-semibold">Our Location</h5>
              <p class="text-muted mb-0">123 Property Lane, Housing City, HC 12345</p>
            </div>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-start gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
              <i class="fas fa-phone-alt text-primary fs-5"></i>
            </div>
            <div>
              <h5 class="fw-semibold">Phone Number</h5>
              <p class="text-muted mb-1">+1 (123) 456-7890</p>
              <p class="text-muted mb-0">+1 (987) 654-3210</p>
            </div>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-start gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
              <i class="fas fa-envelope text-primary fs-5"></i>
            </div>
            <div>
              <h5 class="fw-semibold">Email Address</h5>
              <p class="text-muted mb-1">info@housingsystem.com</p>
              <p class="text-muted mb-0">support@housingsystem.com</p>
            </div>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-start gap-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
              <i class="fas fa-clock text-primary fs-5"></i>
            </div>
            <div>
              <h5 class="fw-semibold">Working Hours</h5>
              <p class="text-muted mb-1">Monday - Friday: 9:00 AM - 6:00 PM</p>
              <p class="text-muted mb-1">Saturday: 10:00 AM - 4:00 PM</p>
              <p class="text-muted mb-0">Sunday: Closed</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include 'footer1.php'; ?>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
