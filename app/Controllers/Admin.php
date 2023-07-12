<?php

namespace App\Controllers;

use App\Controllers\Dashboard;
use App\Controllers\Auth;
use App\Models\ProfessionalsModel;
use App\Models\ProvidersModel;
use App\Models\ProfessionalEngagementsModel;
use App\Models\ProviderEngagementsModel;


class Admin extends BaseController
{
  public function __construct()
    {
        helper(['url', 'form']);
    }  
  
  public function adminHome()
    {
      return redirect()->to('admin-dashboard');
    }

    public function adminProfile()
    {
        return view('admin-dashboards/manage-profile');
    }
    
    public function registerAdmin()
    {
        return view('admin-dashboards/register-admin');
    }

    public function viewProfessionalRatings()
    {
        return view('admin-dashboards/view-professional-ratings');
    }

    public function viewProviderRatings()
    {
        return view('admin-dashboards/view-provider-ratings');
    }

    public function viewUsers()
    {
        return view('admin-dashboards/view-users');
    }
  
}
