<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
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
                'name'=>'PG',
            ],
            [
                'name'=>'SG',
            ],
            [
                'name'=>'SF',
            ],
            [
                'name'=>'PF',
            ],
            [
                'name'=>'C',
            ],
        ];

        foreach ($params as $param) {
            DB::table('positions')->insert($param);
        };
    }
}
