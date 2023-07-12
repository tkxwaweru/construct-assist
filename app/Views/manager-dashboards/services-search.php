<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard.Services - Providers Search</title>
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
                <a href="<?php echo site_url('enlistProfessionals'); ?>">Enlist Professionals</a>
                <a class="active" href="<?php echo site_url('enlistServices'); ?>">Enlist Services</a>
                <a href="<?php echo site_url('viewTeam'); ?>">View Team</a>
                <a class="log-out-button" href="<?php echo site_url('logout'); ?>">Logout</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Service Providers Search Results</h2>
            <div class="form-container">
                <div class="content">
                    <div class="search-results">
                        <h3>Results for Service: <?= $service_name; ?></h3>
                        <?php if (!empty($providersData)) : ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Service</th>
                                        <th>Company</th>
                                        <th>Average Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sort providers data by average_rating in descending order
                                    usort($providersData, function ($a, $b) {
                                        return $b['average_rating'] <=> $a['average_rating'];
                                    });
                                    
                                    $counter = 0; // Initialize a counter variable
                                    
                                    foreach ($providersData as $provider) :
                                        if ($counter >= 5) {
                                            break; // Exit the loop if 5 rows have been displayed
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $provider['name']; ?></td>
                                            <td><?= $provider['email']; ?></td>
                                            <td><?= $provider['phone_number']; ?></td>
                                            <td><?= $provider['service_name']; ?></td>
                                            <td><?= $provider['company']; ?></td>
                                            <td><?= $provider['average_rating']; ?></td>
                                        </tr>
                                        <?php
                                        $counter++; // Increment the counter after each row is displayed
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>No service providers found for the selected service.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
