<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'title_km',
        'content',
        'content_km',
        'image',
        'status'
    ];

    public function getTranslatedTitleAttribute()
    {
        if (app()->getLocale() === 'km' && $this->title_km) {
            return $this->title_km;
        }
        return $this->title;
    }

    public function getTranslatedContentAttribute()
    {
        if (app()->getLocale() === 'km' && $this->content_km) {
            return $this->content_km;
        }
        return $this->content;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
