<?php


use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::create([
            'name' => 'あ'
            ]);
            
        Tag::create([
            'name' => 'い'
            ]);
            
        Tag::create([
            'name' => 'う'
            ]);
            
        Tag::create([
            'name' => 'え'
            ]);    
        
        Tag::create([
            'name' => 'お'
            ]);
            
    }
}