<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $items = [
            ['name_ua'=>'Новини Наукового парку','name_en'=>'Science Park News','slug'=>'science-park-news','sort_order'=>1],
            ['name_ua'=>'Наукові дослідження','name_en'=>'Scientific Research','slug'=>'scientific-research','sort_order'=>2],
            ['name_ua'=>'Інновації та стартапи','name_en'=>'Innovation and Startups','slug'=>'innovation-startups','sort_order'=>3],
            ['name_ua'=>'Гранти та проєкти','name_en'=>'Grants and Projects','slug'=>'grants-projects','sort_order'=>4],
            ['name_ua'=>'Освітні заходи','name_en'=>'Educational Events','slug'=>'educational-events','sort_order'=>5],
            ['name_ua'=>'Тренінги та семінари','name_en'=>'Trainings and Seminars','slug'=>'trainings-seminars','sort_order'=>6],
            ['name_ua'=>'Співпраця з бізнесом','name_en'=>'Collaboration with Business','slug'=>'collaboration-business','sort_order'=>7],
            ['name_ua'=>'Міжнародна діяльність','name_en'=>'International Activities','slug'=>'international-activities','sort_order'=>8],
            ['name_ua'=>'Цифрова трансформація','name_en'=>'Digital Transformation','slug'=>'digital-transformation','sort_order'=>9],
            ['name_ua'=>'Зелена трансформація','name_en'=>'Green Transformation','slug'=>'green-transformation','sort_order'=>10],
            ['name_ua'=>'Події та анонси','name_en'=>'Events and Announcements','slug'=>'events-announcements','sort_order'=>11],
        ];

        foreach($items as $it){
            $it['created_at'] = $now;
            $it['updated_at'] = $now;
        }

        DB::table('news_categories')->insert($items);
    }
}
