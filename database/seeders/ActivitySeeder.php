<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        Activity::insert([
            [
                'title_ua' => 'Цифрова та зелена трансформація',
                'title_en' => 'Digital and Green Transformation',
                'description_ua' => 'Розробка інноваційних рішень, що поєднують цифрові технології та принципи сталого розвитку.',
                'description_en' => 'Development of innovative solutions that combine digital technologies with the principles of sustainable development.',
                'image_path' => 'images/icons/fb8a1396-7b36-4774-ab1e-566dab0ee48c.png',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Екологія, біоекономіка та агротехнології',
                'title_en' => 'Ecology, Bioeconomy and Agrotechnologies',
                'description_ua' => 'Дослідження та впровадження технологій раціонального використання природних ресурсів, розвитку біоекономіки та переробки біомаси.',
                'description_en' => 'Research and implementation of technologies for the rational use of natural resources, development of the bioeconomy and biomass processing.',
                'image_path' => 'images/icons/d66c1d3b-eede-4830-946a-94656ea9bbf9.png',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Цифровізація громад та бізнесу',
                'title_en' => 'Digitalization of Communities and Business',
                'description_ua' => 'Створення цифрових сервісів, геоінформаційних систем, платформ моніторингу та автоматизації для громад і бізнесу.',
                'description_en' => 'Creation of digital services, geoinformation systems, monitoring platforms and automation solutions for communities and businesses.',
                'image_path' => 'images/icons/b9f6da59-8ad9-46a9-a826-7af0b1c6c88c.png',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Інновації та стартапи',
                'title_en' => 'Innovation and Startups',
                'description_ua' => 'Підтримка молодих інноваторів, розвиток стартапів, комерціалізація наукових розробок та залучення інвестицій.',
                'description_en' => 'Support for young innovators, startup development, commercialization of scientific research and attraction of investments.',
                'image_path' => 'images/icons/25ec3d30-cef8-483b-a41e-424eb3ff8874.png',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_ua' => 'Освіта та розвиток талантів',
                'title_en' => 'Education and Talent Development',
                'description_ua' => 'Практико-орієнтоване навчання, інноваційні освітні програми, стажування та створення умов для професійного зростання.',
                'description_en' => 'Practice-oriented education, innovative educational programs, internships and opportunities for professional growth.',
                'image_path' => 'images/icons/image-Photoroom.png',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
