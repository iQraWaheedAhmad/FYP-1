<?php

// Check if the system setup is complete

require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Housing Society Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }

    nav {
      background-color: #2563eb;
      padding: 0.75rem 0;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-image: url('your-background.jpg'); /* Optional background image */
      background-size: cover;
      background-position: center;
    }

    .navbar_maine {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .logo {
      color: white;
      font-size: 1.25rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .logo i {
      margin-right: 0.5rem;
    }

    .nav-links {
      display: none;
    }

    .nav-links a {
      color: #e5e7eb;
      text-decoration: none;
      padding: 0.5rem 0.75rem;
      font-weight: 500;
      border-radius: 0.375rem;
      transition: background 0.3s ease;
    }

    .nav-links a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .menu-btn {
      display: block;
      cursor: pointer;
    }

    .bar {
      height: 3px;
      width: 24px;
      background-color: white;
      margin: 4px 0;
    }

    @media (min-width: 768px) {
      .nav-links {
        display: flex;
        gap: 0.5rem;
      }

      .menu-btn {
        display: none;
      }

      .mobile-menu {
        display: none;
      }
    }

 
  </style>

  <script>
    function toggleMenu() {
      var menu = document.getElementById("mobileMenu");
      menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
    }
  </script>
</head>
<body>

<!-- Navbar -->
<nav>
  <div class="navbar_maine">
    <a href="index.php" class="logo">
        <img src="logo.png" alt="Housing Management Society" height="100px">
      <!-- <i class="fas fa-home"></i> HousingManagementSociety -->
    </a>
    <div class="nav-links">
      <a href="index.php">Home</a>
      <!-- <a href="rent-properties.php">Rent List</a> -->
      <a href="index1.php">Resident</a>
      <a href="index1.php">Admin</a>
      <a href="contact.php">Contact Us</a>
    </div>
    <div class="menu-btn" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>
  <div class="navbar_main">
    <div class="mobile-menu" id="mobileMenu">
      <a href="index.php">Home</a>
      <a href="rent-properties.php">Rent List</a>
      <a href="index1.php">Login</a>
      <a href="admin-login.php">Admin</a>
      <a href="contact.php">Contact Us</a>
    </div>
  </div>
</nav>
</body>
</html>