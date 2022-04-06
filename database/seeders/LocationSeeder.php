<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
            'key' => 1,
            'city' => 'Світязь',
            'address' => 'Пляж 1 б'
            ],
            [
                'key' => 2,
                'city' => 'Любомль',
                'address' => 'Любомльска вулиця 6А'
            ]
            ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
