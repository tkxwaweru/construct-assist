<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/auth-style.css')?>">
    <title>Registration</title>
</head>
<body>
    <img src="<?= base_url('images/icon.png')?>" alt="logo">
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            
                <div class="col-md-4 col-md-offset-4 centered-div">
                    <h4>Register your account</h4><br>
                    <form action="<?php echo base_url('processRegistration')?>" method="post">
                    
                        <?php csrf_field(); ?>
                        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>

                        <?php if(!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif ?>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" value="<?= set_value('name'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?= set_value('password'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Confirm your password" value="<?= set_value('confirmation'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmation') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>  
                        </div>
                        <br>
                        <a href="<?php echo site_url('login'); ?>">I already have an account</a>
                    </form>
                </div>
            
        </div>
    </div>
</body>
</html>