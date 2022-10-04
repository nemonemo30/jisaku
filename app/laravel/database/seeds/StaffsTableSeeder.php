<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'name' => 'BBB',
            'hometown' => '東京都渋谷区',
            'league' => 4,
            'comment' => 'こんな選手が欲しいです',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
        ]);
    }
}
