<?php

use Illuminate\Database\Seeder;

class RecruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recruits')->insert([
            'position_id' => 1,
            'sex_id' => 1,
            'active' => '月、木、日の18-21',
            'comment' => '気軽にご連絡ください！',
            'user_id' => 2,
        ]);
    }
}
