<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
  <title>Dashboard</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-success" style="margin-top:30px">
             <div class="text-center p-4 font-bold text-white">
                DASHBOARD
             </div>
             <table>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <td><?= ucfirst($userInfo['name']); ?></td>
                  <td><?= $userInfo['email']; ?></td>
                  <td><a href="<?php echo site_url('logout'); ?>">Logout</a></td>
                </tbody>
             </table>
        </div>
    </div>
</body>
</html>