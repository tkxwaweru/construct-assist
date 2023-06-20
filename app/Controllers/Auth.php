<?php

namespace App\Controllers;#

use App\Models\UserModel;
use App\Libraries\Hash;

class Auth extends BaseController
{

    public function __construct()
    {
      helper(['url','Form']);
    }



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


  
    public function processLogin()
    {
          //Handle the login backend functionality
          $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[tbl_users.email]',
                'errors' => [
                    'required' => 'Your email address is required.',
                    'valid_email' => 'Kindly enter a valid email address e.g email@example.com',
                    'is_not_unique' => 'Specified email address not found.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'You must enter a password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                ],
            ],
        ]);

          if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
          //return  redirect()->to('auth/login')->with('validation', $this->validator)->withInput();
          }
          else{
          $email = $this->request->getPost('email');
          $password = $this->request->getPost('password');
          $userModel = new \App\Models\UserModel();
          $userInfo = $userModel->where('email', $email)->first();
          $check_password = Hash::check($password, $userInfo['password']);

          if(!$check_password){
            session()->setFlashdata('fail','Incorrect password');
            return redirect()->to('login')->withInput();
          }else{
            $user_id = $userInfo['user_id'];
            session()->set('loggedUser', $user_id);
            return redirect()->to('dashboard');
          }
          } 
    }



    public function processRegistration()
    {
          $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Your full name is required.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[tbl_users.email]',
                'errors' => [
                    'required' => 'Your email address is required.',
                    'valid_email' => 'Kindly enter a valid email address e.g email@example.com',
                    'is_unique' => 'This email address is already taken.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'You must enter a password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                ],
            ],
            'confirmation' => [
                'rules'  => 'matches[password]',
                'errors' => [
                    'required' => 'You must confirm your password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                    'matches' => 'The password entered does not match.',
                ],
            ],
        ]);

          if(!$validation){
            return view('auth/registration', ['validation'=>$this->validator]);
          }else{
            //echo 'Form validated successfully';
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            $userModel = new \App\Models\UserModel();
            $query = $userModel->insert($values);

            if(!$query)
            {
              return redirect()->back()->with('fail','Something went wrong, please try again.');
              //return redirect()->to('registration')->with('fail','Something went wrong, Please try again.');
            }else{


          //email sending component:    
          $email = \Config\Services::email();

          $email->setFrom('construct.assist.254@gmail.com', 'Constrct-Assist');
          $email->setTo($values['email']);
          //$email->setCC('another@another-example.com');
          //$email->setBCC('them@their-example.com');

          $email->setSubject('Account Activation');
          $email->setMessage('Hello ' . $values['name'] . ',<br><br>' . 'Use this link to activate your account' . ' ' . 
          "<a href='" . base_url() . "activate/" . $values['email'] . "/" . $values['name'] . "'> Click here</a>");


          //send email
          if ($email->send()) {
            return view('redirects/activation.php');
          } else {
            return  redirect()->to('registration')->with('fail', 'Something went wrong, please try again.')->withInput();
          }
            }

          }

    }


    public function activate()
    {  

      $email = $this->request->uri->getSegment(2);
      $name = $this->request->uri->getSegment(3);

      session_start();

    $_SESSION['email'] = urldecode($email);
    $_SESSION['name'] = urldecode($name);

    $data = [
        'email' => isset($_SESSION['email']) ? $_SESSION['email'] : null,
        'name' => isset($_SESSION['name']) ? $_SESSION['name'] : null,
    ];
      return view('auth/dashboard2.php', $data);
    }


    public function logout(){
      if(session()->has('loggedUser')){
      session()->remove('loggedUser');
      return redirect()->to('login')->with('fail','You are logged out.');
      } 
    }

    public function logoutn(){
      return redirect()->to('login')->with('fail','You are logged out.')->withCookies()->withHeaders([
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        'Pragma' => 'no-cache',
        'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
    ]);
  }

}
