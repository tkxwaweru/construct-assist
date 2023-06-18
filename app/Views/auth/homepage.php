<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="<?php echo base_url('css/homepage.css'); ?>" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url('js/main.js');?>"></script>
</head>
<body>
  <h1>This is the Homepage</h1>
  <?php
    $session = session();
    $user_details = $session->get('user_details');
    $firstName = $user_details[0];
    $lastName = $user_details[1];
    $fullName = $firstName." ".$lastName;

    echo "Welcome $fullName";
  ?>
  <br>
  <img src="<?php echo base_url('images/user1.jpg');?>" alt="User profile picture">


</body>
</html>