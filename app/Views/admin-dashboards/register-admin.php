<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard.Register</title>
  <link rel="stylesheet" href="<?= base_url('css/admin-dashboard.css') ?>">
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
        <a href="<?php echo site_url('adminHome'); ?>">Home</a>
        <a href="<?php echo site_url('adminProfile'); ?>">Manage Profile</a>
        <a class="active" href="#">Register new Admin</a>
        <a href="<?php echo site_url('viewUsers'); ?>">View User Records</a>
        <a href="<?php echo site_url('viewProfessionalRatings'); ?>">View Professional Ratings</a>
        <a href="<?php echo site_url('viewProviderRatings'); ?>">View Provider Ratings</a>
        <a class="log-out-button" href="<?php echo site_url('logout'); ?>">Logout</a>
      </div>
    </nav>

    <div class="main-body">
      <h2>Home</h2>
      <div class="promo_card">
          <h2>Profile: <?= session('name'); ?></h2>
          <p>Register a new Administrator:</p>
      </div>
    </div>
  </div>
</body>
</html>

