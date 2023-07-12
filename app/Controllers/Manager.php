<?php

namespace App\Controllers;

use App\Controllers\Dashboard;
use App\Controllers\Auth;
use App\Models\ProfessionalsModel;
use App\Models\ProvidersModel;
use App\Models\ProfessionalEngagementsModel;
use App\Models\ProviderEngagementsModel;


class Manager extends BaseController
{
  public function __construct()
    {
        helper(['url', 'form']);
    }  
  
  public function managerHome()
    {
      return redirect()->to('manager-dashboard');
    }

    public function managerProfile()
    {
        return view('manager-dashboards/manage-profile');
    }

    public function enlistServices()
    {
        return view('manager-dashboards/enlist-services');
    }

    public function viewTeam()
    {
        return view('manager-dashboards/view-team');
    }
}
