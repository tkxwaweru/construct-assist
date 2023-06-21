<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Hash;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function login()
    {
        // Load the login module
        return view('auth/login.php');
    }

    public function registration()
    {
        // Load the registration module
        return view('auth/registration.php');
    }

    public function processLogin()
    {
        // Handle the login backend functionality
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[tbl_users.email]',
                'errors' => [
                    'required'    => 'Your email address is required.',
                    'valid_email' => 'Kindly enter a valid email address e.g email@example.com',
                    'is_not_unique' => 'Specified email address not found.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required'   => 'You must enter a password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                ],
            ],
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userModel = new UserModel();
            $userInfo = $userModel->where('email', $email)->first();
            $check_password = Hash::check($password, $userInfo['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('login')->withInput();
            } else {
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
                    'required'    => 'Your email address is required.',
                    'valid_email' => 'Kindly enter a valid email address e.g email@example.com',
                    'is_unique'   => 'This email address is already taken.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required'   => 'You must enter a password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                ],
            ],
            'confirmation' => [
                'rules'  => 'matches[password]',
                'errors' => [
                    'required'   => 'You must confirm your password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                    'matches'    => 'The password entered does not match.',
                ],
            ],
        ]);

        if (!$validation) {
            return view('auth/registration', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $account = 1;

            $values = [
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
                'account_status' => $account
            ];

            $userModel = new UserModel();
            $query = $userModel->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong, please try again.');
            } else {
                // Email sending component:
                $email = \Config\Services::email();

                $email->setFrom('construct.assist.254@gmail.com', 'Construct-Assist');
                $email->setTo($values['email']);
                $email->setSubject('Account Activation');
                $email->setMessage('Hello ' . $values['name'] . ',<br><br>' . 'Use this link to activate your account' . ' ' .
                    "<a href='" . base_url() . "activate/" . $values['email'] . "/" . $values['name'] . "'> Click here</a>");

                // Send email
                if ($email->send()) {
                    return view('redirects/activation.php');
                } else {
                    return redirect()->to('registration')->with('fail', 'Something went wrong, please try again.')->withInput();
                }
            }
        }
    }


    public function activate()
    {
        $email = urldecode($this->request->uri->getSegment(2));
        $name = urldecode($this->request->uri->getSegment(3));
    
        // Access the session service
        $session = session();
    
        // Store email and name in session variables
        $session->set('email', $email);
        $session->set('name', $name);
    
        $data = [
            'email' => $session->get('email'),
            'name' => $session->get('name'),
        ];
    
        return view('auth/dashboard2.php', $data);
    }


    public function reset()
    {
        return view('auth/email.php');
    }

    public function processEmail()
    {
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[tbl_users.email]',
                'errors' => [
                    'required'    => 'Your email address is required.',
                    'valid_email' => 'Kindly enter a valid email address e.g email@example.com',
                    'is_not_unique' => 'Specified email address not found.',
                ],
            ],
        ]);

        if (!$validation) {
            return view('auth/email', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');

            $values = ['email' => $email];

            // Email sending component:
            $eMail = \Config\Services::email();

            $eMail->setFrom('construct.assist.254@gmail.com', 'Construct-Assist');
            $eMail->setTo($values['email']);
            $eMail->setSubject('Password Reset');
            $eMail->setMessage('Use this link to reset your password' . ' ' .
                "<a href='" . base_url() . "processReset/" . $values['email'] . "'> Click here</a>");

            // Send email
            if ($eMail->send()) {
                return view('redirects/reset.php');
            } else {
                return redirect()->to('reset')->with('fail', 'Something went wrong, please try again.')->withInput();
            }
        }
    }

    public function processReset()
    {
        $email = $this->request->uri->getSegment(2);
    
        $_SESSION['email'] = urldecode($email);
    
        $data = [
            'email' => isset($_SESSION['email']) ? $_SESSION['email'] : null,
        ];
    
        return view('auth/password.php', $data);
    }

    public function processPassword()
    {
        $validation = $this->validate([
            'password' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required'   => 'You must enter a password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                ],
            ],
            'confirmation' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'required'   => 'You must confirm your password.',
                    'min_length' => 'Your password must have at least 5 characters.',
                    'max_length' => 'Your password should not exceed 20 characters.',
                    'matches'    => 'The password entered does not match.',
                ],
            ],
        ]);
    
        if (!$validation) {
            return view('auth/password', ['validation' => $this->validator]);
        }
    
        $previousUrl = previous_url();
        $lastSlashPos = strrpos($previousUrl, '/');
        $email = substr($previousUrl, $lastSlashPos + 1);

        $password = $this->request->getPost('password');

	$db = \Config\Database::connect();
    
        $data = ['password' => Hash::make($password)];
	$db->table('tbl_users')->where('email', $email)->update($data);
    
        if (!$db) {
            return redirect()->back()->with('fail', 'User not found.');
        }else{
            session()->setFlashdata('success', 'Password updated.');
            return redirect()->to('login');
        }
    }
    

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
        }
        return redirect()->to('login')->with('fail', 'You are logged out.');
    }

    public function logoutn()
    {
        return redirect()->to('login')->with('fail', 'You are logged out.')->withCookies()->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma'        => 'no-cache',
            'Expires'       => 'Sat, 01 Jan 2000 00:00:00 GMT',
        ]);
    }
}

?>
