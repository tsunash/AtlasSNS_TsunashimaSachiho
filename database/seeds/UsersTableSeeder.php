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
        //INSERT INTO テーブル名 (カラム名1,2,3) VALUES (値1,2,3)と同じ
        DB::table('Users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'a1@mail.com',
            'password' => bcrypt('a1pass')], //bcrypt関数 パスワード専用のハッシュ値を生成

            ['username' => 'Atlas二郎',
            'mail' => 'a2@mail.com',
            'password' => bcrypt('a2pass')],

            ['username' => 'Atlas三郎',
            'mail' => 'a3@mail.com',
            'password' => bcrypt('a3pass')],

        ]);
    }
}
