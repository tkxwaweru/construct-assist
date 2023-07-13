<?php

namespace App\Controllers;

use App\Models\ProfessionalsModel;

class Professional extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    
    public function professionalProfile()
    {
        return view('professional-dashboards/manage-prof-profile');
    }
    public function verifyProfessionals()
    {
        return view('professional-dashboards/verify-professionals');
    }
    public function professionalRatings()
    { 
        return view('professional-dashboards/view-professionals-ratings');
    }
    public function professionalHome()
    {
      return redirect()->to('professional-dashboard');
    }
    public function ratings()
    {
        return view('provider-dashboards/ratings');
    }

}
