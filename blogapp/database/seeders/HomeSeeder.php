<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'image'=>"assets/img/home-bg.jpg",
            'title'=>"Laravel Blog",
            'subtitle'=>"Laravel Blog Sitesi Deneme Çalışması",
        ]);
    }
}
