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
                'title_ua' => 'Лабораторія компʼютерних систем',
                'title_en' => 'Computer Systems Lab',
                'description_ua' => 'Сучасна лабораторія з комп\'ютерним обладнанням для досліджень та навчання.',
                'description_en' => 'Modern lab with computer equipment for research and education.',
                'image_path' => 'images/sliders/slider-1.jpg',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Дрони для моніторингу',
                'title_en' => 'Drones for Monitoring',
                'description_ua' => 'Інструменти для дистанційного моніторингу довкілля та територій.',
                'description_en' => 'Tools for remote environmental and territorial monitoring.',
                'image_path' => 'images/sliders/slider-2.jpg',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Робототехніка',
                'title_en' => 'Robotics',
                'description_ua' => 'Розробка та тестування робототехнічних рішень для різних галузей.',
                'description_en' => 'Development and testing of robotic solutions for various industries.',
                'image_path' => 'images/sliders/slider-3.jpg',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Цифрове обладнання',
                'title_en' => 'Digital Equipment',
                'description_ua' => 'Платформи та інструменти для цифрової трансформації досліджень.',
                'description_en' => 'Platforms and tools for digital transformation of research.',
                'image_path' => 'images/sliders/slider-4.jpg',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Екологічні технології',
                'title_en' => 'Environmental Technologies',
                'description_ua' => 'Рішення для збереження та відновлення екосистем.',
                'description_en' => 'Solutions for conservation and restoration of ecosystems.',
                'image_path' => 'images/sliders/slider-5.jpg',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Високотехнологічна техніка',
                'title_en' => 'High-tech Equipment',
                'description_ua' => 'Сучасне обладнання для інноваційних досліджень та прототипування.',
                'description_en' => 'Modern equipment for innovative research and prototyping.',
                'image_path' => 'images/sliders/slider-6.jpg',
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
