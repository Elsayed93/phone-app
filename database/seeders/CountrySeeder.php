<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = [
            [
                'name' => 'Cameroon',
                'code_number' => '+237'
            ],
            [
                'name' => 'Ethiopia',
                'code_number' => '+251'
            ],
            [
                'name' => 'Morocco',
                'code_number' => '+212'
            ],
            [
                'name' => 'Mozambique',
                'code_number' => '+258'
            ],
            [
                'name' => 'Uganda',
                'code_number' => '+256'
            ],
            [
                'name' => 'Nigeria',
                'code_number' => '+234'
            ],
        ];

        foreach ($countries as  $country) {
            Country::create([
                'name' => $country['name'],
                'code_number' => $country['code_number']
            ]);
        }
    }
}
