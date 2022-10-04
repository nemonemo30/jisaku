<?php

use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'name'=>'B-league',
            ],
            [
                'name'=>'地域リーグ',
            ],
            [
                'name'=>'3x3',
            ],
            [
                'name'=>'アマチュアリーグ',
            ],
        ];

        foreach ($params as $param) {
            DB::table('leagues')->insert($param);
        };
    }
}
