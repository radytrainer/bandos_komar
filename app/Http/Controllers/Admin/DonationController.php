<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = [
            [
                'donor' => 'Johnathan Doe',
                'project' => 'Rural Education Fund',
                'amount' => '$2,500.00',
                'date' => 'Oct 24, 2023',
                'status' => 'Completed',
                'initials' => 'JD'
            ],
            [
                'donor' => 'Alice Smith Corp',
                'project' => 'Clean Water Initiative',
                'amount' => '$12,000.00',
                'date' => 'Oct 22, 2023',
                'status' => 'Completed',
                'initials' => 'AS'
            ],
            [
                'donor' => 'Mark Kandinsky',
                'project' => 'Health Outreach 2023',
                'amount' => '$500.00',
                'date' => 'Oct 21, 2023',
                'status' => 'Pending',
                'initials' => 'MK'
            ],
            [
                'donor' => 'Elena Lopez',
                'project' => 'Emergency Relief Fund',
                'amount' => '$3,200.00',
                'date' => 'Oct 19, 2023',
                'status' => 'Completed',
                'initials' => 'EL'
            ],
            [
                'donor' => 'The Wright Family',
                'project' => 'Renewable Energy Pilot',
                'amount' => '$1,150.00',
                'date' => 'Oct 18, 2023',
                'status' => 'Failed',
                'initials' => 'TW'
            ]
        ];

        return view('admin.donations', compact('donations'));
    }
}
