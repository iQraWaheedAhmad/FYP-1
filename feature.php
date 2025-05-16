<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Key Features</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
    .container { max-width: 1200px; margin: auto; padding: 0 1rem; }
    .text-center { text-align: center; }
    .mb-12 { margin-bottom: 3rem; }
    .mb-4 { margin-bottom: 1rem; }
    .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
    .text-3xl { font-size: 1.875rem; }
    .text-xl { font-size: 1.25rem; }
    .font-bold { font-weight: bold; }
    .text-gray-600 { color: #4b5563; }
    .grid { display: grid; gap: 2rem; }
    .grid-cols-1 { grid-template-columns: repeat(1, 1fr); }
    @media (min-width: 768px) {
      .md-grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
      .lg-grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
    }
    .card {
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: all 0.3s ease-in-out;
      padding: 1.5rem;
      text-align: center;
    }
    .card:hover {
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      transform: translateY(-10px);
    }
    .icon-wrapper {
      width: 64px;
      height: 64px;
      margin: auto;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 9999px;
      background-color: rgba(37, 99, 235, 0.1); /* Primary/10 */
      font-size: 28px;
    }
    .section-title {
      margin-bottom: 1rem;
    }
    .section-description {
      max-width: 600px;
      margin: auto;
    }
    .grid-wrapper {
      padding-left: 2rem;
      padding-right: 2rem;
    }
  </style>
</head>
<body>

<section class="py-16 bg-white">
  <div class="text-center mb-12">
    <div style="max-width: 700px; margin: 0 auto;">
      <h2 class="text-3xl font-bold mb-4 section-title">Key Features</h2>
      <p class="text-lg text-gray-600 section-description">
        Our comprehensive property management portal offers everything you need to efficiently manage housing societies.
      </p>
    </div>
  </div>

  <?php
    $featuresData = [
      [
        "icon" => "🏠",
        "title" => "Society Management",
        "description" => "Manage multiple housing societies with ease and efficiency"
      ],
      [
        "icon" => "📄",
        "title" => "Billing System",
        "description" => "Automated billing and payment tracking for residents"
      ],
      [
        "icon" => "⚖️",
        "title" => "Auction System",
        "description" => "Buy/sell properties through transparent auction processes"
      ],
      [
        "icon" => "🎧",
        "title" => "Complaint System",
        "description" => "Track and resolve resident complaints efficiently"
      ]
    ];
  ?>

  <div class="grid-wrapper">
    <div class="grid grid-cols-1 md-grid-cols-2 lg-grid-cols-4">
      <?php foreach ($featuresData as $feature): ?>
        <div class="card">
          <div class="icon-wrapper"><?= $feature["icon"] ?></div>
          <h3 class="text-xl font-bold mb-2"><?= $feature["title"] ?></h3>
          <p class="text-gray-600"><?= $feature["description"] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</body>
</html>
