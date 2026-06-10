<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('opportunities')->insert([
            [
                'description_ua' => 'Підтримка інноваційних проєктів та стартапів',
                'description_en' => 'Support for innovative projects and startups',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'description_ua' => 'Грантові програми та фінансування досліджень',
                'description_en' => 'Grant programs and research funding',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'description_ua' => 'Консультації з питань інтелектуальної власності',
                'description_en' => 'Intellectual property consulting',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'description_ua' => 'Доступ до коворкінгу та інноваційної інфраструктури',
                'description_en' => 'Access to coworking spaces and innovation infrastructure',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'description_ua' => 'Співпраця з бізнесом, громадами та міжнародними партнерами',
                'description_en' => 'Cooperation with businesses, communities and international partners',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 5,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'description_ua' => 'Проведення тренінгів, форумів та освітніх заходів',
                'description_en' => 'Organization of trainings, forums and educational events',
                'image_path' => 'images/placeholder.svg',
                'sort_order' => 6,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
