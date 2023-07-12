<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfessionalsModel;
use App\Models\ProfessionsModel;
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

    public function    enlistProfessionals()
    {
        return view('manager-dashboards/enlist-professionals');
    }

    public function viewTeam()
    {
        return view('manager-dashboards/view-team');
    }


    public function searchProfessionals()
    {
        $profession_id = $this->request->getPost('profession_id');
    
        $professionalsModel = new ProfessionalsModel();
        $userModel = new UserModel();
        $professionsModel = new ProfessionsModel();
    
        $professionals = $professionalsModel->where('profession_id', $profession_id)->findAll();
    
        $professionalsData = [];
        foreach ($professionals as $professional) {
            $user_id = $professional['user_id'];
            $user = $userModel->find($user_id);
    
            if ($user !== null) {
                $profession_id = $professional['profession_id'];
                $profession = $professionsModel->find($profession_id);
    
                $professionalsData[] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'average_rating' => $professional['average_rating'],
                    'profession_name' => ($profession !== null) ? $profession['profession_name'] : null,
                ];
            }
        }
    
        $data = [
            'profession_name' => ($profession !== null) ? $profession['profession_name'] : null,
            'professionalsData' => $professionalsData,
        ];
    
        return view('manager-dashboards/professionals-search', $data);
    }
    

    
    public function searchServices()
    {
      return redirect()->to('services-search');
    }
}
