<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard.Professional</title>
  <link rel="stylesheet" href="<?= base_url('css/provider-dashboard.css') ?>">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <header class="header">
    <div class="title">
      <span>Provider Dashboard</span>
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
        <a  href="<?php echo site_url('providerHome'); ?>">Home</a>
        <a  class="active" href="<?php echo site_url('providerProfile'); ?>">Manage Profile</a>
        <a  href="<?php echo site_url('providerRatings'); ?>">View Ratings</a>
        <a  href="<?php echo site_url('verifyProviders'); ?>">Submit Verification Documentation</a>
        <a    href="<?php echo site_url('ratings'); ?>">Ratings</a>
        <a class="log-out-button" href="<?php echo site_url('logout'); ?>">Logout</a>
      </div>
    </nav>

    <div class="main-body">
      <h2>Home</h2>
      <div class="promo_card">
      <h2>Profile: <?= session('name'); ?></h2>
          <p>This is your dashboard</p>

     <div class="second-body">
      <a href="<?php echo site_url('reset'); ?>">Password reset</a>
      <body style = "text-align: center;">
  
  
    
</body>
</body>
</div>
    </div>
  </div>
</body>
</html>

