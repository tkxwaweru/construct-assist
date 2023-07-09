<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 76; $i++){
            $provider = $this->generateFakeProvider();
 
            $this->db->table("tbl_providers")->insert($provider);
         }
    }

    private function generateFakeProvider()
    {
        $fakerObject = Factory::create();

        $path = base_url('pdf/permit.pdf');
        $fileData = file_get_contents($path);

        $user_id = [
            "5",
            "8",
            "10",
            "14",
            "18",
            "21",
            "29",
            "35",
            "36",
            "41",
            "43",
            "45",
            "46",
            "49",
            "50",
            "53",
            "54",
            "56",
            "57",
            "59",
            "61",
            "68",
            "73",
            "78",
            "79",
            "81",
            "87",
            "88",
            "91",
            "93",
            "101",
            "103",
            "105",
            "109",
            "110",
            "111",
            "115",
            "116",
            "118",
            "119",
            "120",
            "123",
            "127",
            "132",
            "136",
            "139",
            "146",
            "149",
            "157",
            "159",
            "166",
            "169",
            "172",
            "175",
            "177",
            "178",
            "179",
            "184",
            "186",
            "189",
            "191",
            "192",
            "194",
            "198",
            "200",
            "201",
            "205",
            "207",
            "208",
            "213",
            "215",
            "216",
            "219",
            "221",
            "223",
            "224",
            "225",
            "230",
            "246"                
        ];

        static $userIndex = 0;
        $selectedUserId = $user_id[$userIndex];
        $userIndex++;

        if($userIndex >= count($user_id)){
            $userIndex = 0;
        }

        $service_id = [
            "1",
            "2",
            "3",
            "3",
            "5",
        ];

        return array(
            "user_id" => $selectedUserId,
            "service_id" => $fakerObject->randomElement($service_id),
            "company" => $fakerObject->company,
            "certification_file" => $fileData,
            "average_rating" => $fakerObject->randomFloat(2, 1, 5),
        );
    }
}
