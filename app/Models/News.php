<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_category_id',
        'title_ua',
        'title_en',
        'slug',
        'excerpt_ua',
        'excerpt_en',
        'body_ua',
        'body_en',
        'image_path',
        'is_pinned',
        'is_archived',
        'published_at',
        'sort_order',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'is_archived' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function photos()
    {
        return $this->hasMany(NewsPhoto::class)->orderBy('sort_order', 'asc');
    }

    public function scopePublished($query)
    {
        return $query->where('is_archived', false)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeOrderedForListing($query)
    {
        return $query->orderByDesc('is_pinned')->orderByDesc('published_at');
    }

    public function scopeSearch($query, $term)
    {
        if(!$term) return $query;
        $like = '%' . trim($term) . '%';

        return $query->where(function($q) use ($like){
            $q->where('title_ua', 'like', $like)
              ->orWhere('title_en', 'like', $like)
              ->orWhere('excerpt_ua', 'like', $like)
              ->orWhere('excerpt_en', 'like', $like)
              ->orWhere('body_ua', 'like', $like)
              ->orWhere('body_en', 'like', $like);
        });
    }

    public static function generateSlug($title, $ignoreId = null)
    {
        $base = static::transliterateAndSlug($title);
        $slug = $base;
        $i = 2;

        while(static::where('slug', $slug)->when($ignoreId, function($q) use ($ignoreId){
            $q->where('id', '!=', $ignoreId);
        })->exists()){
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }

    protected static function transliterateAndSlug($text)
    {
        $map = [
            'А'=>'A','Б'=>'B','В'=>'V','Г'=>'H','Ґ'=>'G','Д'=>'D','Е'=>'E','Є'=>'Ye','Ж'=>'Zh','З'=>'Z','И'=>'Y','І'=>'I','Ї'=>'Yi','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N','О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'Kh','Ц'=>'Ts','Ч'=>'Ch','Ш'=>'Sh','Щ'=>'Shch','Ь'=>'','Ю'=>'Yu','Я'=>'Ya',
            'а'=>'a','б'=>'b','в'=>'v','г'=>'h','ґ'=>'g','д'=>'d','е'=>'e','є'=>'ye','ж'=>'zh','з'=>'z','и'=>'y','і'=>'i','ї'=>'yi','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'kh','ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'shch','ь'=>'','ю'=>'yu','я'=>'ya',
        ];

        $transliterated = strtr($text, $map);
        return Str::slug($transliterated);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
