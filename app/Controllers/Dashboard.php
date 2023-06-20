<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Auth;

class Dashboard extends BaseController
{
    public function index()
    {

      $userModel = new \App\Models\UserModel();
      $loggedUserID = session()->get('loggedUser');
      $userInfo = $userModel->find($loggedUserID);
      $data = [
          'title'=>'Dashboard',
          'userInfo'=>$userInfo
      ];
      return view('auth/dashboard', $data);
    }
}
