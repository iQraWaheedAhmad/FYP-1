<?php 
include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .faq-item {
      border-left: 3px solid #0d6efd;
      transition: all 0.3s ease;
    }
    .faq-item:hover {
      background-color: #f8f9fa;
    }
    .accordion-button:not(.collapsed) {
      background-color: rgba(13, 110, 253, 0.1);
      color: #0d6efd;
    }
  </style>
</head>
<body class="bg-light">
  <?php include 'navbar.php'; ?>
  <?php
    
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader (created by composer, not included with PHPMailer)
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';
    require_once 'phpmailer/Exception.php';

    // Initialize variables to avoid undefined variable warnings
    $NAME = $EMAIL = $SUBJECT = $message = "";
    $successMessage = "";

    if (isset($_POST['submit'])) {
        // Assign the POST data to variables after form submission
        $NAME = $_POST['name'];
        $EMAIL = $_POST['email'];
        $SUBJECT = $_POST['subject'];
        $message = $_POST['message'];

        // Create an instance of PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                         // SMTP server
            $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
            $mail->Username   = '213838bs@gmail.com';                    // SMTP username
            $mail->Password   = 'rrzw czbo jnsv ccba';                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Enable encryption
            $mail->Port       = 587;                                      // SMTP port

            // Recipients
            $mail->setFrom('213838bs@gmail.com', 'Housing Management System');
            $mail->addAddress('alifjeem22@gmail.com', 'Housing Management System');  // Add recipient

            // Content
            $mail->isHTML(true);                                          // Set email format to HTML
            $mail->Subject = ' ' . $SUBJECT . ' ';
            $mail->Body    = '<b>Name:</b> ' . $NAME . ' <br><b>Email:</b> ' . $EMAIL . ' <br><b>Message:</b> ' . $message . ' ';

            // Send the email
            if ($mail->send()) {
                $successMessage = "Email sent successfully!";  // Set success message
            }

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
  ?>

  <div class="container py-5">
    <h1 class="text-center mb-2 fw-bold">Contact Us</h1>
    <p class="text-muted text-center mb-5">Get in touch with our team for any queries or assistance</p>

    <div class="row g-4">
      <!-- Contact Form -->
      <div class="col-lg-6">
        <h2 class="mb-4 fw-bold">Send Us a Message</h2>
        <div class="card shadow-sm">
          <div class="card-body">
            <form action="contact.php" method="POST">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="<?= isset($NAME) ? $NAME : '' ?>" required>
                </div>
                <div class="col-sm-6">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" value="<?= isset($EMAIL) ? $EMAIL : '' ?>" required>
                </div>
              </div>

              <div class="mt-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="How can we help you?" value="<?= isset($SUBJECT) ? $SUBJECT : '' ?>" required>
              </div>

              <div class="mt-3">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" class="form-control" name="message" rows="5" placeholder="Write your message here..." required><?= isset($message) ? $message : '' ?></textarea>
              </div>

              <button type="submit" name="submit" class="btn btn-primary mt-4 w-100">Send Message</button>
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
                <p class="text-muted mb-1">info@propertyportal.com</p>
                <p class="text-muted mb-0">support@propertyportal.com</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer1.php'; ?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SweetAlert2 for success message -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    <?php if ($successMessage != ""): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $successMessage ?>',
        confirmButtonText: 'OK'
      });
    <?php endif; ?>
  </script>

</body>
</html>
