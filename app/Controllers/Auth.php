<?php

namespace App\Controllers;#

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
      //Load the login module
      return view('auth/login.php');
    }
    public function registration()
    {
      //Load the registration module
      return view('auth/registration.php');
    }
    public function homePage()
    {
      //Load the homepage
      return view('auth/homepage.php');
    }
    public function processLogin()
    {
      //Handle the login backend functionality
    }
    public function processRegistration()
    {
      //Handle the registration backend functionality
      echo "Works";
    }
}
