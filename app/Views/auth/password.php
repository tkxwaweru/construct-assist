<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
    <title>Password Reset</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4">
                <h3>Password reset for: <?php echo $email; ?></h3><br>
                <h4>Reset your password</h4><br>

                <form action="<?php echo base_url('processPassword')?>" method="post">

                <?php csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                    <div class="form-group">
                        <label for="password">Enter New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value="<?= set_value('password'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label for="confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Confirm your password" value="<?= set_value('confirmation'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmation') : '' ?></span>
                    </div>
               
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>  
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>