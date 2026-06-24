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
                'description_ua' => 'Сучасна лабораторія з комп\'ютерним обладнанням для інноваційних досліджень та практичного навчання.',
                'description_en' => 'Modern lab with advanced computer equipment for innovative research and practical education.',
                'image_path' => 'images/5276117098801340184.png',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Дрони для моніторингу',
                'title_en' => 'Drones for Monitoring',
                'description_ua' => 'Високотехнологічні інструменти для дистанційного моніторингу довкілля, агросектору та територій громад.',
                'description_en' => 'High-tech tools for remote environmental monitoring, agricultural sector, and community territories.',
                'image_path' => 'images/5276117098801340185.png',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Робототехніка',
                'title_en' => 'Robotics',
                'description_ua' => 'Розробка, прототипування та тестування сучасних робототехнічних рішень для різних галузей промисловості.',
                'description_en' => 'Development, prototyping, and testing of modern robotic solutions for various industrial sectors.',
                'image_path' => 'images/5276117098801340195.png',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Цифрове обладнання',
                'title_en' => 'Digital Equipment',
                'description_ua' => 'Платформи та цифрові інструменти для комплексної цифрової трансформації наукових досліджень.',
                'description_en' => 'Platforms and digital tools for comprehensive digital transformation of scientific research.',
                'image_path' => 'images/5276117098801340200.png',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Екологічні технології',
                'title_en' => 'Environmental Technologies',
                'description_ua' => 'Передові зелені рішення для збереження довкілля, раціонального природокористування та відновлення екосистем.',
                'description_en' => 'Advanced green solutions for environmental preservation, rational resource use, and ecosystem restoration.',
                'image_path' => 'images/5276117098801340193.png',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Інноваційна зустріч',
                'title_en' => 'Innovation Meeting',
                'description_ua' => 'Командна робота, презентації та обговорення інноваційних рішень для науки, бізнесу і громад.',
                'description_en' => 'Teamwork, presentations and discussion of innovative solutions for science, business and communities.',
                'image_path' => 'images/5276117098801340187.png',
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
