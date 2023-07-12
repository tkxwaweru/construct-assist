<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('activate/(:segment)/(:segment)','Auth::activate/$email/$name');
$routes->get('processReset/(:segment)','Auth::processReset/$email');


// Auth routes for views
$routes->add('login', 'Auth::login');
$routes->add('registration', 'Auth::registration');
$routes->add('dashboard', 'Dashboard::index');

// Load various dashboards after login
$routes->add('admin-dashboard', 'Dashboard::admin');
$routes->add('manager-dashboard', 'Dashboard::manager');
$routes->add('professional-dashboard', 'Dashboard::professional');
$routes->add('provider-dashboard', 'Dashboard::provider');

// Auth routes
$routes->add('processLogin', 'Auth::processLogin');
$routes->add('processRegistration', 'Auth::processRegistration');
$routes->add('logout', 'Auth::logout');
$routes->add('activate', 'Auth::activate');
$routes->add('reset', 'Auth::reset');
$routes->add('processEmail', 'Auth::processEmail');
$routes->add('processReset', 'Auth::processReset');
$routes->add('processPassword', 'Auth::processPassword');


// Routes for manager related funtions
$routes->add('managerHome', 'Manager::managerHome');
$routes->add('managerProfile', 'Manager::managerProfile');
$routes->add('enlistServices', 'Manager::enlistServices');
$routes->add('viewTeam', 'Manager::viewTeam');


// Routes for admin related functions
$routes->add('adminHome', 'Admin::adminHome');
$routes->add('adminProfile', 'Admin::adminProfile');
$routes->add('registerAdmin', 'Admin::registerAdmin');
$routes->add('viewProfessionalRatings', 'Admin::viewProfessionalRatings');
$routes->add('viewProviderRatings', 'Admin::viewProviderRatings');
$routes->add('viewUsers', 'Admin::viewUsers');


// Routes for professional related functions
$routes->add('professionalProfile', 'Professional::professionalProfile');
$routes->add('verifyProfessionals', 'Professional::verifyProfessionals');
$routes->add('viewProfessionalRatings', 'Professional::viewProfessionalRatings');



// Routes for provider related functions
$routes->add('providerProfile', 'Provider::providerProfile');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
