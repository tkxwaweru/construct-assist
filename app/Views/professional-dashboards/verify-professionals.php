!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard.Professional</title>
  <link rel="stylesheet" href="<?= base_url('css/professional-dashboard.css') ?>">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <header class="header">
    <div class="title">
      <span>Dashboard</span>
    </div>
    <div class="header-icons">
      <div class="account">
          <h4><?= session('email'); ?></h4>
      </div>
    </div>
  </header>

  <div class="container">
    <nav>
      <div class="side_navbar">
        <a  href="#">Home</a>
        <a  class="active" href="#">Manage Profile</a>
        <a   href="#">View Ratings</a>
        <a   href="<?php echo site_url('verifyProfessionals'); ?>">Submit Verification Documentation</a>
        <a class="log-out-button" href="<?php echo site_url('logout'); ?>">Logout</a>
      </div>
    </nav>

    <div class="main-body">
      <h2>Home</h2>
      <div class="promo_card">
      <h2>Profile: <?= session('name'); ?></h2>
          <p>This is your dashboard</p>
      <div class="ratings" >
        <h2>Ratings for: <?= session('name'); ?></h2>
      </div>
     </div>
    </div>
  </div>
</body>
</html>

