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
        Country::query()->delete();
        Country::insert( [
            [
                'name' => 'Cameroon',
                'code' => '+237',
                'regular_expression_pattern' => '/[2368]\d{7,8}$/'
            ],
            [
                'name' => 'Ethiopia',
                'code' => '+251',
                'regular_expression_pattern' => '/[1-59]\d{8}$/'
            ],
            [
                'name' => 'Morocco',
                'code' => '+212',
                'regular_expression_pattern' => '/[5-9]\d{8}$/'
            ],
            [
                'name' => 'Mozambique',
                'code' => '+258',
                'regular_expression_pattern' => '/[28]\d{7,8}$/'
            ],
            [
                'name' => 'Uganda',
                'code' => '+256',
                'regular_expression_pattern' => '/\d{9}$/'
            ]
        ]);
    }
}
