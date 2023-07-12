<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard.Services - Professionals Search</title>
    <link rel="stylesheet" href="<?= base_url('css/manager-dashboard.css') ?>">
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
                <a href="<?php echo site_url('managerHome'); ?>">Home</a>
                <a href="<?php echo site_url('managerProfile'); ?>">Manage Profile</a>
                <a class="active" href="<?php echo site_url('enlistProfessionals'); ?>">Enlist Professionals</a>
                <a href="<?php echo site_url('enlistServices'); ?>">Enlist Services</a>
                <a href="<?php echo site_url('viewTeam'); ?>">View Team</a>
                <a class="log-out-button" href="<?php echo site_url('logout'); ?>">Logout</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Professionals Search Results</h2>
            <div class="form-container">
                  <div class="content">
                    <div class="search-results">
                        <h3>Results for Profession: <?= $profession_name; ?></h3>
                        <?php if (!empty($professionalsData)) : ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Profession</th>
                                        <th>Average Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sort professionals data by average_rating in descending order
                                    usort($professionalsData, function ($a, $b) {
                                        return $b['average_rating'] <=> $a['average_rating'];
                                    });
                                    ?>
                                    <?php foreach ($professionalsData as $professional) : ?>
                                        <tr>
                                            <td><?= $professional['name']; ?></td>
                                            <td><?= $professional['email']; ?></td>
                                            <td><?= $professional['phone_number']; ?></td>
                                            <td><?= $professional['profession_name']; ?></td>
                                            <td><?= $professional['average_rating']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>No professionals found for the selected profession.</p>
                        <?php endif; ?>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>
