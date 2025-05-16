<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hero Section</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .hero {
      position: relative;
      width: 100%;
      height: 500px;
      overflow: hidden;
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .hero-content {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      transform: translateY(-50%);
      text-align: center;
      color: white;
      padding: 1rem;
    }

    .hero h1 {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 1rem;
      text-transform: uppercase;
    }

    .hero p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
    }

    .search-box {
      background: white;
      padding: 1.5rem;
      border-radius: 0.75rem;
      max-width: 900px;
      margin: 0 auto;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .search-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    @media (min-width: 768px) {
      .search-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 1024px) {
      .search-grid {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    .search-grid input,
    .search-grid select,
    .search-grid button {
      height: 40px;
      border-radius: 0.375rem;
      padding: 0 0.75rem;
      font-size: 1rem;
      border: 1px solid #ccc;
    }

    .search-grid button {
      background-color: #2563eb; /* Tailwind bg-primary */
      color: white;
      border: none;
      cursor: pointer;
    }

    .search-grid button:hover {
      background-color: #1d4ed8; /* hover:bg-primary/90 */
    }
  </style>
</head>
<body>

<div class="hero" id="myCarousel">
  <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Property" />
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <h1>Housing Society Management</h1>
    <p>Discover thousands of properties for rent and sale in your area</p>

    <div class="search-box">
      <form action="search.php" method="GET">
        <div class="search-grid">
          <input type="text" name="location" placeholder="Location" />
          
          <select name="type">
           
            <option value="house">House</option>
            <option value="apartment">Plot</option>
            
          </select>
          <select name="status">
           
            <option value="rent">For Rent</option>
            <option value="sale">For Sale</option>
          </select>

          <button type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
