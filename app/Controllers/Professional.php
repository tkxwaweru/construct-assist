<?php

namespace App\Controllers;

use App\Models\ProfessionalsModel;

class Professional extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    
    public function manageProfile()
    {
        return view('professional-dashboards/manage-profile.php');
    }
}
