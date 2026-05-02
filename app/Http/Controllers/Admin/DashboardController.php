<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $postCount = Post::count();
        $donationSum = Donation::sum('amount');
        $categoryCount = \App\Models\Category::count();

        $stats = [
            'total_users' => [
                'value' => number_format($userCount),
                'change' => '+12.5%',
                'up' => true
            ],
            'total_posts' => [
                'value' => number_format($postCount),
                'change' => '+3.2%',
                'up' => true
            ],
            'total_donations' => [
                'value' => '$' . number_format($donationSum),
                'change' => '-1.4%',
                'up' => false
            ],
            'active_categories' => [
                'value' => number_format($categoryCount),
                'change' => 'Stable',
                'up' => null
            ]
        ];

        $recent_posts = Post::with('user', 'category')->latest()->take(4)->get()->map(function($post) {
            return [
                'title' => $post->translated_title,
                'author' => $post->user->name ?? 'Admin',
                'category' => $post->category->translated_name ?? 'Uncategorized',
                'status' => app()->getLocale() === 'km' ? ($post->status === 'published' ? 'បានបោះពុម្ព' : 'ព្រាង') : ucfirst($post->status),
                'date' => $post->created_at->format('M d, Y')
            ];
        });

        // Fallback for demo if no posts exist yet
        if ($recent_posts->isEmpty()) {
            $recent_posts = [
                ['title' => 'Sample Post', 'author' => 'Admin', 'category' => 'News', 'status' => 'Published', 'date' => now()->format('M d, Y')]
            ];
        }

        $top_donors = [
            ['name' => 'Jane Doe', 'donations' => 12, 'amount' => '$4,250', 'initials' => 'JD'],
            ['name' => 'Marcus Smith', 'donations' => 8, 'amount' => '$3,800', 'initials' => 'MS'],
            ['name' => 'Robert L.', 'donations' => 15, 'amount' => '$3,120', 'initials' => 'RL'],
            ['name' => 'Elena K.', 'donations' => 5, 'amount' => '$2,950', 'initials' => 'EK']
        ];

        return view('admin.dashboard', compact('stats', 'recent_posts', 'top_donors'));
    }
}
