<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\NewsCategory;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $getCategoryId = function($slug){
            $cat = NewsCategory::where('slug', $slug)->first();
            return $cat ? $cat->id : null;
        };

        $rows = [];

        $rows[] = [
            'news_category_id' => $getCategoryId('green-transformation'),
            'title_ua' => 'Нові проєкти у сфері зеленої трансформації',
            'title_en' => 'New Projects in Green Transformation',
            'slug' => News::generateSlug('Нові проєкти у сфері зеленої трансформації'),
            'excerpt_ua' => 'Огляд нових ініціатив та проєктів у галузі зеленої трансформації.',
            'excerpt_en' => 'An overview of new initiatives and projects in the field of green transformation.',
            'body_ua' => 'Детальний опис проєктів, очікувані результати та партнери.',
            'body_en' => 'Detailed description of projects, expected outcomes and partners.',
            'image_path' => 'images/news/news-1.jpg',
            'is_pinned' => true,
            'is_archived' => false,
            'published_at' => Carbon::create(2024,5,15,9,0,0),
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $rows[] = [
            'news_category_id' => $getCategoryId('innovation-startups'),
            'title_ua' => 'Підтримка стартапів: нові можливості',
            'title_en' => 'Support for Startups: New Opportunities',
            'slug' => News::generateSlug('Підтримка стартапів: нові можливості'),
            'excerpt_ua' => 'Огляд програм підтримки для стартапів та інноваторів.',
            'excerpt_en' => 'Overview of support programs for startups and innovators.',
            'body_ua' => 'Інформація про гранти, менторство та акселерацію.',
            'body_en' => 'Information about grants, mentorship and acceleration.',
            'image_path' => 'images/news/news-2.jpg',
            'is_pinned' => false,
            'is_archived' => false,
            'published_at' => Carbon::create(2024,5,10,9,0,0),
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $rows[] = [
            'news_category_id' => $getCategoryId('trainings-seminars'),
            'title_ua' => 'Тренінг з цифрових технологій для громад',
            'title_en' => 'Digital Technologies Training for Communities',
            'slug' => News::generateSlug('Тренінг з цифрових технологій для громад'),
            'excerpt_ua' => 'Практичний тренінг для представників громад щодо цифрових сервісів.',
            'excerpt_en' => 'A practical training for community representatives on digital services.',
            'body_ua' => 'Зміст програми, дати та умови участі.',
            'body_en' => 'Program content, dates and participation conditions.',
            'image_path' => 'images/news/news-3.jpg',
            'is_pinned' => false,
            'is_archived' => false,
            'published_at' => Carbon::create(2024,5,3,9,0,0),
            'created_at' => $now,
            'updated_at' => $now,
        ];

        DB::table('news')->insert($rows);
    }
}
