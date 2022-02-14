<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        \DB::table('admins')->insert([
            [
                'name' => '山田拓実',
                'email' => 'ta_crash@yahoo.co.jp',
                'password' => 'bakusyou',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
