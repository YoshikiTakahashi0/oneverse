<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            TestUserSeeder::class,
            TagSeeder::class
            ]);
    }
}
