<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipalities = [
            [
                'name' => 'Pokhara',
                'email' => 'pokhara@municipality.gov.np',
                'latitude' => 28.2096,
                'longitude' => 83.9856,
            ],
            [
                'name' => 'Kathmandu',
                'email' => 'kathmandu@municipality.gov.np',
                'latitude' => 27.7172,
                'longitude' => 85.3240,
            ],
            [
                'name' => 'Lalitpur',
                'email' => 'lalitpur@municipality.gov.np',
                'latitude' => 27.6588,
                'longitude' => 85.3247,
            ],
            [
                'name' => 'Biratnagar',
                'email' => 'biratnagar@municipality.gov.np',
                'latitude' => 26.4525,
                'longitude' => 87.2718,
            ],
            [
                'name' => 'Birgunj',
                'email' => 'birgunj@municipality.gov.np',
                'latitude' => 27.0000,
                'longitude' => 84.8667,
            ],
            [
                'name' => 'Bharatpur',
                'email' => 'bharatpur@municipality.gov.np',
                'latitude' => 27.6786,
                'longitude' => 84.4329,
            ],
            // Add more municipalities as needed
        ];

        // Insert data into the municipalities table
        DB::table('municipalities')->insert($municipalities);
//        Municipality::create();
    }


}
