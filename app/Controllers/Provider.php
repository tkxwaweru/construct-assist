<?php

namespace App\Controllers;

class Provider extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function providerProfile()
    {
        return view('provider-dashboards/manage.php');
    }
}
