<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wilaya;
class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Load wilayas from json
        $wilayas_json = json_decode(file_get_contents(database_path('seeders/json/Wilaya_Of_Algeria.json')));

        // Insert Wilayas
        $data = [];
        foreach ($wilayas_json as $wilaya) {
            $data[] = [
                'id'        => $wilaya->id,
                'name'       => $wilaya->name,
                'ar_name' => $wilaya->ar_name,
            ];
        }
        Wilaya::insert($data);


    }
}
