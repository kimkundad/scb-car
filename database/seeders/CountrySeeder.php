<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\province;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        province::truncate();
  
        $csvFile = fopen(base_path("database/data/province.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                province::create([
                    "id" => $data['0'],
                    "PROVINCE_ID" => $data['1'],
                    "PROVINCE_CODE" => $data['2'],
                    "PROVINCE_NAME" => $data['3'],
                    "GEO_ID" => $data['4']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
