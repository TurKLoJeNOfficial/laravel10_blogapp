<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'title' => 'Facebook',
            'icon' => 'facebook',
            'link' => 'https://www.facebook.com/themightyturk/',
        ]);
        SocialMedia::create([
            'title' => 'Twitter',
            'icon' => 'twitter',
            'link' => 'https://twitter.com/turklojen',
        ]);
        SocialMedia::create([
            'title' => 'Instagram',
            'icon' => 'instagram',
            'link' => 'https://www.instagram.com/turklojenofficial/',
        ]);
    }
}
