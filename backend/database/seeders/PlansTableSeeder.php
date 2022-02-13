<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('plans')->insert([
            [
                'name' => 'お試しプラン',
                'offer_count' => 10,
                'price' => 1100
            ],
            [
                'name' => 'ブロンズプラン',
                'offer_count' => 30,
                'price' => 2970
            ],
            [
                'name' => 'シルバープラン',
                'offer_count' => 50,
                'price' => 4675
            ],
            [
                'name' => 'ゴールドプラン',
                'offer_count' => 100,
                'price' => 8800
            ],
        ]);
    }
}
