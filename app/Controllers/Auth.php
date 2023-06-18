<?php

namespace App\Controllers;#

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
      return view('auth/login.php');
    }
    public function processLogin()
    {
      //Handle the login backend functionality
      $userModel = new UserModel();
      $user_details = $userModel->getOneUser();
      
      $session = session();
      $session->set('user_details', $user_details);

      return redirect()->to('auth/homepage');
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
