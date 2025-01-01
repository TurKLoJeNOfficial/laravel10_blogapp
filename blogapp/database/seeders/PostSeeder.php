<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => "Laravel 10 Öğreniyorum",
            'image' => "assets/img/Laravel-10.jpg",
            'subtitle'=>"Laravel 10 dünyasına adım atıyorum ve laravel öğreniyorum",
            'content'=>"Laravel 10 ile beraber şuanda görmüş olduğunuz websitesini geliştirmek için uğraşıyorum siteyi start bootstrap clena blog temasını kullanıyorum ve laravel 10 teknolojisi ile beraber şuanda bu yazıyı okuduğunuz blog sayfasını gelişitiriyorum",
            'user_id'=>1,
            'status'=>'1'

        ]);

        Post::create([
            'title' => "PHP 8 Yayınlandı",
            'image' => "assets/img/php8.png",
            'subtitle'=>"PHP 8 sürümü yayınlandı artık php daha güçlü",
            'content'=>"PHP 8 sürümü yayınlandı ve artık php eskisine göre daha çok yenilikler sunuyor php 8 sürümü çıkması geliştiricileri heyecanlandırdı",
            'user_id'=>1,
            'status'=>'1'

        ]);

        Post::create([
            'title' => "Yazılımcının Yol Haritası",
            'image' => "assets/img/yazilim.jpeg",
            'subtitle'=>"Yazılıma adım atmak için her yazılımcı yol haritası çizer",
            'content'=>"Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır.",
            'user_id'=>1,
            'status'=>'1'

        ]);

        Post::create([
            'title' => "Hoşgeldin 2025",
            'image' => "assets/img/2025.png",
            'subtitle'=>"Tüm İnsanların Yeni Yılını Kutlarım",
            'content'=>"Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır.",
            'user_id'=>1,
            'status'=>'1'

        ]);
    }
}
