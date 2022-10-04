<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'name' => '田中太郎',
            'position_id' => 1,
            'height' => 180,
            'weight' => 73,
            'age' => 20,
            'sex' => 1,
            'from' => '日本',
            'video' => '"C:\Users\nemot\Videos\Captures\TieMeDown.mp4"',
            'comment' => '意気込み',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
        ]);
    }
}
