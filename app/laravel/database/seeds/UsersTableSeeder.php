<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 8,
            'name' => '管理人',
            'email' => 'kannrisha@test.com',
            'password' => 'testtest',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'type_id' => 2,
        ]);
    }
}
