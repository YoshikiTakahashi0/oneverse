<?php


use Illuminate\Database\Seeder;
use App\User;

class TestUserSeeder extends Seeder
{

    public function run()
    {
        //10件のテストユーザーを登録する
        for( $cnt = 1; $cnt<= 100; $cnt++){
            User::create([
                'name' => 'テストユーザー' . $cnt,
                'email' => 'test' .$cnt . '@example.com',
                'password' => Hash::make('testtest'),
                ]);
        }
    }
}
