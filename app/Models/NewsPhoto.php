<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPhoto extends Model
{
    use HasFactory;

    public const MAX_PER_NEWS = 10;

    protected $fillable = [
        'news_id',
        'image_path',
        'caption_ua',
        'caption_en',
        'sort_order',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
