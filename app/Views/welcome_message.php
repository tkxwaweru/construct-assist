<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Construct-Assist</title>
    <link rel="stylesheet" href="<?= base_url('css/homepage.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="<?= base_url('images/icon-white.png') ?>" alt="logo" class="logo">
            <ul>
                <!--<li><a href="<?php echo site_url('home'); ?>">Home</a></li>-->
                <li><a href="<?php echo site_url('about'); ?>">About</a></li>
                <li><a href="<?php echo site_url('about'); ?>">FAQs</a></li>
                <li><a href="<?php echo site_url('contact'); ?>">Contact us</a></li>
            </ul>
            <a class="login" href="<?php echo site_url('login'); ?>">Sign in</a>
        </div>

        <div class="content">
            <h1>COLLABORATE AND CREATE</h1>
            <p>Constuct-Assist utilizes machine learning to ease your acquisition
                of construction <br> related service and resource providers. This guarantees that you
                always work with <br> a reliable team.</p>
            <div class="button">
                <a href="<?php echo site_url('registration'); ?>">SIGN UP</a>
            </div>
        </div>
    </div>
</body>

</html>