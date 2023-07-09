<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProfessionalSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 51; $i++){
           $professional = $this->generateFakeProfessional();

           $this->db->table("tbl_professionals")->insert($professional);
        }
    }

    private function generateFakeProfessional()
    {
        $fakerObject = Factory::create();

        $path = base_url('pdf/certificate.pdf');
        $fileData = file_get_contents($path);

        $user_id = [
            "3",
            "4",
            "6",
            "7",
            "12",
            "22",
            "25",
            "26",
            "30",
            "31",
            "33",
            "37",
            "38",
            "39",
            "40",
            "42",
            "48",
            "51",
            "62",
            "64",
            "66",
            "67",
            "69",
            "70",
            "71",
            "72",
            "75",
            "76",
            "80",
            "82",
            "84",
            "85",
            "86",
            "89",
            "90",
            "92",
            "95",
            "96",
            "97",
            "99",
            "102",
            "106",
            "108",
            "113",
            "117",
            "121",
            "130",
            "131",
            "133",
            "134",
            "135",
            "138",
            "140",
            "142",
            "143",
            "145",
            "148",
            "153",
            "161",
            "163",
            "164",
            "165",
            "167",
            "171",
            "173",
            "174",
            "176",
            "181",
            "182",
            "183",
            "188",
            "190",
            "193",
            "195",
            "196",
            "199",
            "206",
            "209",
            "210",
            "217",
            "218",
            "220",
            "222",
            "227",
            "229",
            "231",
            "236",
            "238",
            "241",
            "242",
            "243",
            "247",
            "249",
            "250"            
        ];

        static $userIndex = 0;
        $selectedUserId = $user_id[$userIndex];
        $userIndex++;

        if($userIndex >= count($user_id)){
            $userIndex = 0;
        }

        $profession_id = [
            "1",
            "2",
            "3",
            "3",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
            "13"
        ];

        return array(
            "user_id" => $selectedUserId,
            "profession_id" => $fakerObject->randomElement($profession_id),
            "certification_file" => $fileData,
            "average_rating" => $fakerObject->randomFloat(2, 1, 5),
        );
    }
}
