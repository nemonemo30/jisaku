<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
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
                'recruit_id' => 21,
                'comment' => '自分をアピールする文章をここに打つ。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
            ],[
                'recruit_id' => 1,
                'comment' => '自分をアピールする文章をここに打つ。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
            ],
        ];
    }
}
