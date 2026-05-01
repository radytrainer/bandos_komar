<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home Page', 
                'slug' => 'home', 
                'icon' => 'home',
                'content' => [
                    'hero' => [
                        'title' => 'Empowering Communities',
                        'subtitle' => 'for a Better Future',
                        'description' => 'Bandos Komar is a local NGO dedicated to improving education in Cambodia, especially in rural areas. We believe every child deserves a chance to learn and grow.',
                        'badge' => 'Impact since 1989',
                        'image' => '/assets/images/hero.png',
                    ],
                    'stats' => [
                        'heading' => 'Who We Are',
                        'title' => 'Bandos Komar Association',
                        'description' => 'Bandos Komar (BK) is a local NGO dedicated to improving education in Cambodia, especially in rural areas. The organization originated from Partage, which began operating in Cambodia in November 1989.',
                        'items' => [
                            ['label' => 'Founded', 'value' => '1989'],
                            ['label' => 'Years Impact', 'value' => '30+'],
                            ['label' => 'Communities', 'value' => '100+'],
                            ['label' => 'Children Helped', 'value' => '10k+'],
                        ]
                    ],
                    'cta' => [
                        'title' => 'Support Our Mission',
                        'description' => 'Your contribution can make a real difference in the lives of children in rural Cambodia. Join us in our journey to empower the next generation.',
                    ],
                    'programs' => [
                        ['title' => 'Early Childhood Care', 'description' => 'Ensuring children aged 0-5 have access to quality care and early education.', 'icon' => 'book-open'],
                        ['title' => 'Primary Education', 'description' => 'Supporting local schools to improve the quality of teaching and learning.', 'icon' => 'graduation-cap'],
                        ['title' => 'Community Empowerment', 'description' => 'Working with parents and local authorities to build strong support systems.', 'icon' => 'users'],
                        ['title' => 'WASH & Health', 'description' => 'Providing clean water, sanitation, and hygiene facilities for better health.', 'icon' => 'droplets'],
                    ]
                ]
            ],
            [
                'title' => 'About Us', 
                'slug' => 'about-us', 
                'icon' => 'info',
                'content' => [
                    'header' => [
                        'badge' => 'About Us',
                        'title' => 'Our Mission & Vision',
                        'description' => 'At Bandos Komar, we believe every child has the potential to change the world through education and community support.',
                    ],
                    'mission' => [
                        'title' => 'Transforming Education in Rural Cambodia',
                        'description' => 'Bandos Komar (BK) is a local NGO dedicated to improving education in Cambodia, especially in rural areas. The organization originated from Partage, which began operating in Cambodia in November 1989.',
                        'quote' => 'Education is the most powerful weapon which you can use to change the world.',
                        'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop'
                    ],
                    'values' => [
                        'title' => 'Our Core Values',
                        'items' => [
                            ['title' => 'Integrity', 'description' => 'We maintain the highest standards of transparency and accountability.', 'icon' => 'shield-check'],
                            ['title' => 'Empowerment', 'description' => 'We believe in enabling communities to take charge of their own development.', 'icon' => 'hand-metal'],
                            ['title' => 'Inclusion', 'description' => 'We strive to ensure that every child has equal access to quality education.', 'icon' => 'heart'],
                        ]
                    ]
                ]
            ],
            [
                'title' => 'History', 
                'slug' => 'history', 
                'icon' => 'history',
                'content' => [
                    'header' => [
                        'title' => 'Our Journey Since 1989',
                        'description' => 'A legacy of commitment to Cambodian children and rural development.',
                    ],
                    'timeline' => [
                        ['year' => '1989', 'title' => 'Foundation', 'description' => 'Partage begins operating in Cambodia to support local education.'],
                        ['year' => '2000', 'title' => 'Expansion', 'description' => 'BK expands its programs to include community empowerment.'],
                        ['year' => '2020', 'title' => 'Modernization', 'description' => 'Implementing digital education and WASH programs across Cambodia.'],
                    ]
                ]
            ],
            [
                'title' => 'Our Program', 
                'slug' => 'our-program', 
                'icon' => 'graduation-cap',
                'content' => [
                    'header' => [
                        'title' => 'Impactful Programs',
                        'description' => 'We deliver comprehensive solutions for education and health.',
                    ]
                ]
            ],
            [
                'title' => 'Annual Report', 
                'slug' => 'annual-report', 
                'icon' => 'file-text',
                'content' => [
                    'header' => [
                        'title' => 'Annual Reports',
                        'description' => 'Transparent documentation of our annual impact and financial health.',
                    ],
                    'reports' => [
                        ['title' => 'Annual Report 2023', 'year' => '2023', 'link' => '#'],
                        ['title' => 'Annual Report 2022', 'year' => '2022', 'link' => '#'],
                    ]
                ]
            ],
            [
                'title' => 'Publication', 
                'slug' => 'publication', 
                'icon' => 'book-open',
                'content' => [
                    'header' => [
                        'title' => 'Publications',
                        'description' => 'Research papers, case studies, and informational materials.',
                    ],
                    'items' => [
                        ['title' => 'Education Study 2023', 'type' => 'PDF', 'link' => '#'],
                    ]
                ]
            ],
            [
                'title' => 'Contact', 
                'slug' => 'contact', 
                'icon' => 'mail',
                'content' => [
                    'header' => [
                        'title' => 'Get in Touch',
                        'description' => 'We are here to answer your questions and explore collaboration.',
                    ],
                    'info' => [
                        'address' => 'Phnom Penh, Cambodia',
                        'email' => 'info@bandoskomar.org',
                        'phone' => '+855 23 456 789',
                        'map_embed' => '#'
                    ]
                ]
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
