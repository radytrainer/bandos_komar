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
                'title_km' => 'ទំព័រដើម',
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
                ],
                'content_km' => [
                    'hero' => [
                        'title' => 'ការផ្តល់អំណាចដល់សហគមន៍',
                        'subtitle' => 'ដើម្បីអនាគតកាន់តែប្រសើរ',
                        'description' => 'អង្គការបណ្តុះកុមារ គឺជាអង្គការក្នុងស្រុកមួយដែលខិតខំលើកកម្ពស់វិស័យអប់រំនៅកម្ពុជា ជាពិសេសនៅតំបន់ជនបទ។ យើងជឿជាក់ថាកុមារគ្រប់រូបសមនឹងទទួលបានឱកាសក្នុងការរៀនសូត្រ និងការរីកចម្រើន។',
                        'badge' => 'ផលប៉ះពាល់តាំងពីឆ្នាំ ១៩៨៩',
                        'image' => '/assets/images/hero.png',
                    ],
                    'stats' => [
                        'heading' => 'តើពួកយើងជានរណា',
                        'title' => 'សមាគមបណ្តុះកុមារ',
                        'description' => 'អង្គការបណ្តុះកុមារ (BK) គឺជាអង្គការមិនមែនរដ្ឋាភិបាលក្នុងស្រុកដែលខិតខំកែលម្អការអប់រំនៅកម្ពុជា ជាពិសេសនៅតំបន់ជនបទ។ អង្គការនេះមានប្រភពចេញពី Partage ដែលបានចាប់ផ្តើមប្រតិបត្តិការនៅក្នុងប្រទេសកម្ពុជាក្នុងខែវិច្ឆិកា ឆ្នាំ១៩៨៩។',
                        'items' => [
                            ['label' => 'បង្កើតឡើង', 'value' => '១៩៨៩'],
                            ['label' => 'ឆ្នាំនៃផលប៉ះពាល់', 'value' => '៣០+'],
                            ['label' => 'សហគមន៍', 'value' => '១០០+'],
                            ['label' => 'កុមារដែលបានជួយ', 'value' => '១ម៉ឺន+'],
                        ]
                    ],
                    'cta' => [
                        'title' => 'គាំទ្របេសកកម្មរបស់យើង',
                        'description' => 'ការចូលរួមរបស់អ្នកពិតជាអាចបង្កើតការផ្លាស់ប្តូរពិតប្រាកដនៅក្នុងជីវិតរបស់កុមារនៅតំបន់ជនបទនៃប្រទេសកម្ពុជា។ ចូលរួមជាមួយយើងក្នុងដំណើរនៃការផ្តល់អំណាចដល់យុវជនជំនាន់ក្រោយ។',
                    ],
                    'programs' => [
                        ['title' => 'ការថែទាំកុមារតូច', 'description' => 'ការធានាថាកុមារអាយុពី ០-៥ ឆ្នាំទទួលបានការថែទាំប្រកបដោយគុណភាព និងការអប់រំកម្រិតដំបូង។', 'icon' => 'book-open'],
                        ['title' => 'ការអប់រំបឋមសិក្សា', 'description' => 'គាំទ្រសាលារៀនក្នុងស្រុកដើម្បីលើកកម្ពស់គុណភាពនៃការបង្រៀន និងការរៀន។', 'icon' => 'graduation-cap'],
                        ['title' => 'ការផ្តល់អំណាចដល់សហគមន៍', 'description' => 'ធ្វើការជាមួយមាតាបិតា និងអាជ្ញាធរមូលដ្ឋានដើម្បីកសាងប្រព័ន្ធគាំទ្រដ៏រឹងមាំ។', 'icon' => 'users'],
                        ['title' => 'ទឹកស្អាត និងអនាម័យ', 'description' => 'ផ្តល់ទឹកស្អាត អនាម័យ និងសម្ភារៈអនាម័យដើម្បីសុខភាពកាន់តែប្រសើរ។', 'icon' => 'droplets'],
                    ]
                ]
            ],
            [
                'title' => 'About Us',
                'title_km' => 'អំពីយើង',
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
                ],
                'content_km' => [
                    'header' => [
                        'badge' => 'អំពីយើង',
                        'title' => 'បេសកកម្ម និងចក្ខុវិស័យរបស់យើង',
                        'description' => 'នៅអង្គការបណ្តុះកុមារ យើងជឿជាក់ថាកុមារគ្រប់រូបមានសក្តានុពលក្នុងការផ្លាស់ប្តូរពិភពលោកតាមរយៈការអប់រំ និងការគាំទ្រពីសហគមន៍។',
                    ],
                    'mission' => [
                        'title' => 'ការផ្លាស់ប្តូរការអប់រំនៅតំបន់ជនបទនៃប្រទេសកម្ពុជា',
                        'description' => 'អង្គការបណ្តុះកុមារ (BK) គឺជាអង្គការមិនមែនរដ្ឋាភិបាលក្នុងស្រុកដែលខិតខំកែលម្អការអប់រំនៅកម្ពុជា ជាពិសេសនៅតំបន់ជនបទ។ អង្គការនេះមានប្រភពចេញពី Partage ដែលបានចាប់ផ្តើមប្រតិបត្តិការនៅក្នុងប្រទេសកម្ពុជាក្នុងខែវិច្ឆិកា ឆ្នាំ១៩៨៩។',
                        'quote' => 'ការអប់រំគឺជាអាវុធដ៏មានឥទ្ធិពលបំផុតដែលអ្នកអាចប្រើដើម្បីផ្លាស់ប្តូរពិភពលោក។',
                        'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop'
                    ],
                    'values' => [
                        'title' => 'តម្លៃស្នូលរបស់យើង',
                        'items' => [
                            ['title' => 'សុចរិតភាព', 'description' => 'យើងរក្សានូវស្តង់ដារខ្ពស់បំផុតនៃតម្លាភាព និងគណនេយ្យភាព។', 'icon' => 'shield-check'],
                            ['title' => 'ការផ្តល់អំណាច', 'description' => 'យើងជឿជាក់លើការអនុញ្ញាតឱ្យសហគមន៍ទទួលខុសត្រូវលើការអភិវឌ្ឍន៍ផ្ទាល់ខ្លួនរបស់ពួកគេ។', 'icon' => 'hand-metal'],
                            ['title' => 'បរិយាប័ន្ន', 'description' => 'យើងខិតខំធានាថាកុមារគ្រប់រូបមានលទ្ធភាពទទួលបានការអប់រំប្រកបដោយគុណភាពស្មើៗគ្នា។', 'icon' => 'heart'],
                        ]
                    ]
                ]
            ],
            [
                'title' => 'History',
                'title_km' => 'ប្រវត្តិ',
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
                ],
                'content_km' => [
                    'header' => [
                        'title' => 'ដំណើររបស់យើងតាំងពីឆ្នាំ ១៩៨៩',
                        'description' => 'កេរ្តិ៍ដំណែលនៃការប្តេជ្ញាចិត្តចំពោះកុមារកម្ពុជា និងការអភិវឌ្ឍន៍ជនបទ។',
                    ],
                    'timeline' => [
                        ['year' => '១៩៨៩', 'title' => 'ការបង្កើតឡើង', 'description' => 'Partage ចាប់ផ្តើមប្រតិបត្តិការនៅក្នុងប្រទេសកម្ពុជា ដើម្បីគាំទ្រការអប់រំក្នុងស្រុក។'],
                        ['year' => '២០០០', 'title' => 'ការពង្រីកខ្លួន', 'description' => 'អង្គការបណ្តុះកុមារពង្រីកកម្មវិធីរបស់ខ្លួនដើម្បីរួមបញ្ចូលការផ្តល់អំណាចដល់សហគមន៍។'],
                        ['year' => '២០២០', 'title' => 'ទំនើបកម្ម', 'description' => 'ការអនុវត្តការអប់រំឌីជីថល និងកម្មវិធីទឹកស្អាតទូទាំងប្រទេសកម្ពុជា។'],
                    ]
                ]
            ],
            [
                'title' => 'Our Program',
                'title_km' => 'កម្មវិធីរបស់យើង',
                'slug' => 'our-program',
                'icon' => 'graduation-cap',
                'content' => [
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
                                    'full_description' => 'Rate of births attended by skilled provider is at 2014-2022, from 96% to 99%. Exclusive breastfeeding (0-5 months) increased from 11% in 2000 to 74% in 2010, but declined to 51% in 2021-2022. High rates of stunting, wasting and underweight children: 22% stunted, 22% underweight, 16% wasting, 10%.',
                                    'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                                ],
                                [
                                    'title' => 'Clean Water & Sanitation',
                                    'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                                    'full_description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable sanitation and hygiene support to protect children from preventable illness.',
                                    'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                                ],
                                [
                                    'title' => 'Early Learning Challenges',
                                    'description' => 'Many children fall behind in school due to poor early learning. Only 12% of 3-year-olds, 28% of 4-year-olds, and 57% of 5-year-olds access early learning.',
                                    'full_description' => 'Many children fall behind in school due to poor early learning. Only 12% of 3-year-olds, 28% of 4-year-olds, and 57% of 5-year-olds access early learning opportunities before primary school.',
                                    'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1400&auto=format',
                                ],
                                [
                                    'title' => 'Caregiver Knowledge',
                                    'description' => 'Around 73% of children under age 3 are cared for by grandmothers with limited knowledge of early childhood care and development practices.',
                                    'full_description' => 'Around 73% of children under age 3 are cared for by grandmothers with limited knowledge of early childhood care and development practices, creating a need for stronger caregiver guidance and family support.',
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
                                    'full_description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                                    'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                                ],
                                [
                                    'title' => 'Clean Water & Sanitation',
                                    'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                                    'full_description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                                    'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                                ],
                            ],
                        ],
                    ],
                ],
                'content_km' => [
                    'header' => [
                        'title' => 'កម្មវិធីដែលមានឥទ្ធិពល',
                        'description' => 'យើងផ្តល់ជូននូវដំណោះស្រាយដ៏ទូលំទូលាយសម្រាប់ការអប់រំ និងសុខភាព។',
                    ],
                    'sections' => [],
                ]
            ],
            [
                'title' => 'Annual Report',
                'title_km' => 'របាយការណ៍ប្រចាំឆ្នាំ',
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
                ],
                'content_km' => [
                    'header' => [
                        'title' => 'របាយការណ៍ប្រចាំឆ្នាំ',
                        'description' => 'ឯកសារប្រកបដោយតម្លាភាពនៃផលប៉ះពាល់ប្រចាំឆ្នាំ និងសុខភាពហិរញ្ញវត្ថុរបស់យើង។',
                    ],
                    'reports' => [
                        ['title' => 'របាយការណ៍ប្រចាំឆ្នាំ ២០២៣', 'year' => '២០២៣', 'link' => '#'],
                        ['title' => 'របាយការណ៍ប្រចាំឆ្នាំ ២០២២', 'year' => '២០២២', 'link' => '#'],
                    ]
                ]
            ],
            [
                'title' => 'Publication',
                'title_km' => 'ការបោះពុម្ពផ្សាយ',
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
                ],
                'content_km' => [
                    'header' => [
                        'title' => 'ការបោះពុម្ពផ្សាយ',
                        'description' => 'ឯកសារស្រាវជ្រាវ ការសិក្សាករណី និងសម្ភារៈព័ត៌មានផ្សេងៗ។',
                    ],
                    'items' => [
                        ['title' => 'ការសិក្សាអំពីការអប់រំ ២០២៣', 'type' => 'PDF', 'link' => '#'],
                    ]
                ]
            ],
            [
                'title' => 'Contact',
                'title_km' => 'ទំនាក់ទំនង',
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
                        'phone' => '+855 (0) 23 881 234',
                        'map_embed' => '#'
                    ]
                ],
                'content_km' => [
                    'header' => [
                        'title' => 'ទាក់ទងមកយើង',
                        'description' => 'យើងនៅទីនេះដើម្បីឆ្លើយសំណួររបស់អ្នក និងស្វែងរកកិច្ចសហការផ្សេងៗ។',
                    ],
                    'info' => [
                        'address' => '#១២ ផ្លូវ ៣១៥ បឹងកក់២ ខណ្ឌទួលគោក ភ្នំពេញ',
                        'email' => 'info@bandoskomar.org',
                        'phone' => '+៨៥៥ (០) ២៣ ៨៨១ ២៣៤',
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
