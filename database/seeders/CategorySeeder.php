<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['en' => 'Education', 'km' => 'ការអប់រំ'],
            ['en' => 'Health', 'km' => 'សុខភាព'],
            ['en' => 'Environment', 'km' => 'បរិស្ថាន'],
            ['en' => 'Community', 'km' => 'សហគមន៍'],
            ['en' => 'News', 'km' => 'ព័ត៌មាន'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => Str::slug($cat['en'])],
                [
                    'name' => $cat['en'],
                    'name_km' => $cat['km']
                ]
            );
        }
    }
}
