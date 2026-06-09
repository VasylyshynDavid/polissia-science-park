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
        Activity::insert([
            [
                'title_ua' => 'Цифрова та зелена трансформація',
                'title_en' => 'Digital and Green Transformation',
                'description_ua' => 'Розробка інноваційних рішень, що поєднують цифрові технології та принципи сталого розвитку.',
                'description_en' => 'Development of innovative solutions that combine digital technologies with the principles of sustainable development.',
                'image_path' => 'images/placeholder.jpg'
            ],
            [
                'title_ua' => 'Екологія, біоекономіка та агротехнології',
                'title_en' => 'Ecology, Bioeconomy and Agrotechnologies',
                'description_ua' => 'Дослідження та впровадження технологій раціонального використання природних ресурсів, розвитку біоекономіки та переробки біомаси.',
                'description_en' => 'Research and implementation of technologies for the rational use of natural resources, development of the bioeconomy and biomass processing.',
                'image_path' => 'images/placeholder.jpg'
            ],
            [
                'title_ua' => 'Цифровізація громад та бізнесу',
                'title_en' => 'Digitalization of Communities and Business',
                'description_ua' => 'Створення цифрових сервісів, геоінформаційних систем, платформ моніторингу та автоматизації для громад і бізнесу.',
                'description_en' => 'Creation of digital services, geoinformation systems, monitoring platforms and automation solutions for communities and businesses.',
                'image_path' => 'images/placeholder.jpg'
            ],
            [
                'title_ua' => 'Інновації та стартапи',
                'title_en' => 'Innovation and Startups',
                'description_ua' => 'Підтримка молодих інноваторів, розвиток стартапів, комерціалізація наукових розробок та залучення інвестицій.',
                'description_en' => 'Support for young innovators, startup development, commercialization of scientific research and attraction of investments.',
                'image_path' => 'images/placeholder.jpg'
            ],
            [
                'title_ua' => 'Освіта та розвиток талантів',
                'title_en' => 'Education and Talent Development',
                'description_ua' => 'Практико-орієнтоване навчання, інноваційні освітні програми, стажування та створення умов для професійного зростання.',
                'description_en' => 'Practice-oriented education, innovative educational programs, internships and opportunities for professional growth.',
                'image_path' => 'images/placeholder.jpg'
            ],
        ]);
    }
}
