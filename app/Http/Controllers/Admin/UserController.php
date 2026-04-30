<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@bandos.io',
                'role' => 'Admin',
                'status' => 'Active',
                'last_active' => '2h ago',
                'avatar' => 'https://i.pravatar.cc/150?u=sarah'
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'm.chen@bandos.io',
                'role' => 'Editor',
                'status' => 'Active',
                'last_active' => '1d ago',
                'avatar' => 'https://i.pravatar.cc/150?u=michael'
            ],
            [
                'name' => 'Alex Durand',
                'email' => 'a.durand@external.com',
                'role' => 'User',
                'status' => 'Suspended',
                'last_active' => '3d ago',
                'avatar' => null,
                'initials' => 'AD'
            ],
            [
                'name' => 'Elena Rodriguez',
                'email' => 'e.rodriguez@bandos.io',
                'role' => 'Editor',
                'status' => 'Active',
                'last_active' => '5h ago',
                'avatar' => 'https://i.pravatar.cc/150?u=elena'
            ]
        ];

        return view('admin.users', compact('users'));
    }
}
