<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfessionalsModel;
use App\Models\ProfessionsModel;
use App\Models\ServicesModel;
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
                    'phone_number' => $user['phone_number'],
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
        $service_id = $this->request->getPost('service_id');

        $providersModel = new ProvidersModel();
        $userModel = new UserModel();
        $servicesModel = new ServicesModel();

        $providers = $providersModel->where('service_id', $service_id)->findAll();

        $providersData = [];
        $service_name = null; // Initialize the variable outside the loop
        foreach ($providers as $provider) {
            $user_id = $provider['user_id'];
            $user = $userModel->find($user_id);

            if ($user !== null) {
                $service_id = $provider['service_id'];
                $service = $servicesModel->find($service_id);

                $service_name = ($service !== null) ? $service['service_name'] : null; // Move inside the loop

                $providersData[] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone_number' => $user['phone_number'],
                    'service_name' => ($service !== null) ? $service['service_name'] : null,
                    'company' => ($provider !== null) ? $provider['company'] : null,
                    'average_rating' => $provider['average_rating'],
                ];
            }
        }

        $data = [
            'service_name' => $service_name,
            'providersData' => $providersData,
        ];

        return view('manager-dashboards/services-search', $data);
    } 


    public function selectProfessionalEngagement()
    {
        // Retrieve the posted email and name
        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');

        // Retrieve the active session email
        $sessionEmail = session('email');

        // Query the tbl_users table to find the manager's user ID where the email matches the session email
        $userModel = new UserModel();
        $manager = $userModel->where('email', $sessionEmail)->first();
        $managerId = ($manager !== null) ? $manager['user_id'] : null;

        // Query the tbl_users table to find the professional's user ID where the email matches the posted email
        $professional = $userModel->where('email', $email)->first();
        $professionalId = ($professional !== null) ? $professional['user_id'] : null;

        // Store the manager's user ID, professional's user ID, and the integer 1 in the tbl_professional_engagements table
        $professionalEngagementsModel = new ProfessionalEngagementsModel();
        if ($managerId !== null && $professionalId !== null) {
            $professionalEngagementsModel->insert([
                'manager_id' => $managerId,
                'professional_id' => $professionalId,
                'active_engagement' => 1
            ]);
        }

        // Retrieve the manager_id, professional_id, and session email
        $managerEmail = session('email');
        $managerData = ($managerId !== null) ? $userModel->find($managerId) : null;
        $professionalData = ($professionalId !== null) ? $userModel->find($professionalId) : null;
        $professionalsModel = new ProfessionalsModel();
        $profession = ($professionalData !== null) ? $professionalsModel->find($professionalData['user_id']) : null;
        $professionsModel = new ProfessionsModel();
        $professionName = ($profession !== null) ? $professionsModel->find($profession['profession_id'])['profession_name'] : null;

        // Pass the retrieved data to the view-team.php view
        $data = [
            'managerData' => $managerData,
            'professionalData' => $professionalData,
            'professionName' => $professionName
        ];

        return view('manager-dashboards/view-team');
    }


    
    public function selectProviderEngagement()
    {
        //
    }

    public function searchProfessionalEngagements()
    {
        //
    }

    public function searchProviderEngagements()
    {
        //
    }

    public function rateService()
    {
        //
    }
}
