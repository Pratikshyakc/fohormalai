<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GarbageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Garbage::create([
            DB::table('garbages')->insert(values: [
                [
                    'latitude' => 28.2096,
                    'longitude' => 83.9856,
                    'user_name' => 'Sita Gurung',
                    'user_address' => 'Lakeside, Pokhara',
                    'user_phone' => '9800001001',
                    'remarks' => 'Garbage pile near Lakeside main road.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'latitude' => 28.2163,
                    'longitude' => 83.9685,
                    'user_name' => 'Ram Shrestha',
                    'user_address' => 'Mahendrapool, Pokhara',
                    'user_phone' => '9800001002',
                    'remarks' => 'Overflowing bins near Mahendrapool market.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'latitude' => 28.2017,
                    'longitude' => 83.9757,
                    'user_name' => 'Anita KC',
                    'user_address' => 'Damside, Pokhara',
                    'user_phone' => '9800001003',
                    'remarks' => 'Large garbage heap near Damside bus stop.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'latitude' => 28.2379,
                    'longitude' => 83.9561,
                    'user_name' => 'Bishnu Bhandari',
                    'user_address' => 'Sarangkot, Pokhara',
                    'user_phone' => '9800001004',
                    'remarks' => 'Garbage scattered near Sarangkot hiking trail.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'latitude' => 28.2063,
                    'longitude' => 83.9584,
                    'user_name' => 'Krishna Thapa',
                    'user_address' => 'New Road, Pokhara',
                    'user_phone' => '9800001005',
                    'remarks' => 'Bins overflowing near New Road shops.',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
    }
}




