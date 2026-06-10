<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('sliders')->insert([
            [
                'title_ua' => 'Інновації для розвитку',
                'title_en' => 'Innovation for Development',
                'description_ua' => 'Науковий парк об’єднує дослідження, освіту, бізнес і громади для створення сучасних рішень.',
                'description_en' => 'The Science Park unites research, education, business and communities to create modern solutions.',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Цифрові технології та громади',
                'title_en' => 'Digital Technologies and Communities',
                'description_ua' => 'Ми підтримуємо цифровізацію громад, нові сервіси та інструменти сталого розвитку.',
                'description_en' => 'We support the digitalization of communities, new services and tools for sustainable development.',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Освіта, стартапи, партнерства',
                'title_en' => 'Education, Startups, Partnerships',
                'description_ua' => 'Ми формуємо середовище для талантів, інноваційних команд і міжнародної співпраці.',
                'description_en' => 'We build an environment for talents, innovative teams and international cooperation.',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
