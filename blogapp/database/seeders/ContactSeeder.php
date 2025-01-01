<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'image'=>"assets/img/contact-bg.jpg",
            'title'=>"İletişim",
            'subtitle'=>"Benim ile iletişime geçin",
            'desc'=>"Aşağıdaki formu doldurarak benim ile iletişim kurabilirsiniz"
        ]);
    }
}
