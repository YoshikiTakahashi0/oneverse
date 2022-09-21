<?php


use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    
    public function run()
    {
        //管理者ユーザー
        User::create([
            'name' => '管理者',
            'email' => 'yoshi.main00@gmail.com',
            'password' => Hash::make('yoshi0000'),
            ]);
    }
}
