<?php

use Illuminate\Database\Seeder;

class SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params  = [
            [
                'id' => 1,
                'name' => '男性',
            ],
            [
                'id' => 2,
                'name' => '女性',
            ],
        ];

        foreach ($params as $param) {
            DB::table('sexes')->insert($param);
        };
    }
}
