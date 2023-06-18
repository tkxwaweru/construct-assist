<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

  public function getOneUser(){
    $user_details = array('Tom','Peter');
    return $user_details;
  

  }

}