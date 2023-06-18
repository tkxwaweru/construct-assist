<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
      return view('auth/login.php');
    }
    public function processLogin()
    {
      //Handle the login backend functionality
    }
    public function homePage()
    {
      //Load the homepage
      return view('auth/homepage.php');
    }
    public function register()
    {
      //Load the user registration page
      return view('auth/register.php');
    }
    public function processRegistration()
    {
      //Handle the registration backend functionality
    }
}
