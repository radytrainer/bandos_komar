<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_km', 'slug', 'description'];

    public function getTranslatedNameAttribute()
    {
        if (app()->getLocale() === 'km' && $this->name_km) {
            return $this->name_km;
        }
        return $this->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
