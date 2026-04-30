<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'title' => 'Home - Bandos Komar'
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'title' => 'About Us - Bandos Komar'
        ]);
    }

    public function history()
    {
        return view('pages.history', [
            'title' => 'Our History - Bandos Komar'
        ]);
    }

    public function programs()
    {
        return view('pages.programs', [
            'title' => 'Our Programs - Bandos Komar'
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact Us - Bandos Komar'
        ]);
    }

    public function annualReport() { return view('pages.annual-report', ['title' => 'Annual Report - Bandos Komar']); }
    public function publication() { return view('pages.publication', ['title' => 'Publication - Bandos Komar']); }
    public function photoGallery() { return view('pages.photo-gallery', ['title' => 'Photo Gallery - Bandos Komar']); }
    public function videoCenter() { return view('pages.video-center', ['title' => 'Video Center - Bandos Komar']); }
    
    public function supportUs() { return view('pages.support-us', ['title' => 'Support Us - Bandos Komar']); }
    public function sponsorChild() { return view('pages.sponsor-child', ['title' => 'Sponsor a Child - Bandos Komar']); }
    public function waysToGive() { return view('pages.ways-to-give', ['title' => 'Ways to Give - Bandos Komar']); }
    public function career() { return view('pages.career', ['title' => 'Career - Bandos Komar']); }

    public function donate()
    {
        return view('pages.donate', [
            'title' => 'Make a Donation - Bandos Komar'
        ]);
    }
}
