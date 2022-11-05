<?php

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            'id' => 1,
            'send_id' => 5,
            'receive_id' => 1,
            'comment' => 'こんにちわ',
            'talkGroup' => 1,
        ]);
    }
}
