<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'title_km', 'slug', 'content', 'content_km', 
        'meta_description', 'meta_keywords', 'status', 'icon'
    ];

    protected $casts = [
        'content' => 'array',
        'content_km' => 'array',
    ];

    public function getTranslatedTitleAttribute()
    {
        if (app()->getLocale() === 'km' && !empty($this->title_km)) {
            return $this->title_km;
        }
        return $this->title;
    }

    public function getTranslatedContentAttribute()
    {
        if (app()->getLocale() === 'km' && !empty($this->content_km)) {
            return $this->content_km;
        }
        return $this->content;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
