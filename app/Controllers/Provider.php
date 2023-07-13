<?php

namespace App\Controllers;

class Provider extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function providerHome()
    {
        return redirect()->to('provider-dashboard');
    }
    public function providerProfile()
    {
        return view('provider-dashboards/manage-prov-profile');
    }
    public function verifyProviders()
    {
        return view('provider-dashboards/verify-providers');
    }
    public function providerRatings()
    {
        return view('provider-dashboards/view-provider-ratings');
    }
    public function ratings()
    {
        return view('provider-dashboards/ratings');
    }
   
}
