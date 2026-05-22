<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $defaultContent = [
            'header' => [
                'title' => 'Our Program',
                'description' => 'We deliver comprehensive solutions for education and health.',
            ],
            'sections' => [
            [
                'title' => 'Integrated Early Childhood Care and Development Program (IECCD)',
                'text' => 'By 2029, boys and girls under 6 years old who are beneficiaries will receive care and development with potential and opportunities to continue their education at the primary level with quality, equity and inclusion education',
                'cards' => [
                    [
                        'title' => 'Health and Nutrition',
                        'description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                        'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                    ],
                    [
                        'title' => 'Clean Water & Sanitation',
                        'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                        'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                    ],
                    [
                        'title' => 'Early Learning Challenges',
                        'description' => 'Many children fall behind in school due to poor early learning. Only 12% of 3-year-olds, 28% of 4-year-olds, and 57% of 5-year-olds access early learning.',
                        'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1400&auto=format',
                    ],
                    [
                        'title' => 'Caregiver Knowledge',
                        'description' => 'Around 73% of children under age 3 are cared for by grandmothers with limited knowledge of early childhood care and development practices.',
                        'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1400&auto=format',
                    ],
                ],
            ],
            [
                'title' => 'Integrated Quality Basic Education Program (IQBE)',
                'text' => 'By 2029, girls and boys aged 6-15 in target areas have access to education with quality learning outcome and complete basic education with equity and inclusiveness',
                'cards' => [
                    [
                        'title' => 'Health and Nutrition',
                        'description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                        'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                    ],
                    [
                        'title' => 'Clean Water & Sanitation',
                        'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                        'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                    ],
                ],
            ],
            ],
        ];

        $page = DB::table('pages')->where('slug', 'our-program')->first();

        if (!$page) {
            DB::table('pages')->insert([
                'title' => 'Our Program',
                'title_km' => 'កម្មវិធីរបស់យើង',
                'slug' => 'our-program',
                'content' => json_encode($defaultContent),
                'content_km' => json_encode([
                    'header' => [
                        'title' => 'កម្មវិធីដែលមានឥទ្ធិពល',
                        'description' => 'យើងផ្តល់ជូននូវដំណោះស្រាយដ៏ទូលំទូលាយសម្រាប់ការអប់រំ និងសុខភាព។',
                    ],
                    'sections' => [],
                ]),
                'status' => 'published',
                'icon' => 'graduation-cap',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return;
        }

        $content = json_decode($page->content ?? '[]', true) ?: [];

        if (!empty($content['sections'])) {
            return;
        }

        $content['header']['title'] = $content['header']['title'] ?? $defaultContent['header']['title'];
        $content['header']['description'] = $content['header']['description'] ?? $defaultContent['header']['description'];
        $content['sections'] = $defaultContent['sections'];

        DB::table('pages')
            ->where('slug', 'our-program')
            ->update([
                'content' => json_encode($content),
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        // Keep admin-edited page content intact if this migration is rolled back.
    }
};
