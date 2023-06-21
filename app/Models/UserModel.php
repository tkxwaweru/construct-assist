<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

  protected $table = 'tbl_users';
  protected $primaryKey = 'user_id';
  protected $allowedFields = ['name','email','password','account_status'];

}