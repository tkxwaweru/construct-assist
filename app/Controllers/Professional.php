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
        return view('professional-dashboards/manage-prof-profile.php');
    }
    public function verifyProfessionals()
    {
        return view('professional-dashboards/verify-professionals.php');
    }
    public function viewProfessionalRatings()
    { 
        return view('professional-dashboards/view-professionals-ratings.php');
    }
}
