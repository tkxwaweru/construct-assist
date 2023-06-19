<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Register your account</h4><br>
                <form action="<?php echo base_url('processRegistration')?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Confirm your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>  
                    </div>
                    <br>
                    <a href="<?php echo site_url('login'); ?>">I already have an account</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>