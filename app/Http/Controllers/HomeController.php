<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->first();
        return view('pages.home', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Home - Bandos Komar'
        ]);
    }

    public function about()
    {
        $page = Page::where('slug', 'about-us')->first();
        return view('pages.about', [
            'page' => $page,
            'title' => $page->translated_title ?? 'About Us - Bandos Komar'
        ]);
    }

    public function history()
    {
        $page = Page::where('slug', 'history')->first();
        return view('pages.history', [
            'page' => $page,
            'title' => $page->translated_title ?? 'History - Bandos Komar'
        ]);
    }

    public function program()
    {
        $page = Page::where('slug', 'our-program')->first();
        return view('pages.programs', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Our Program - Bandos Komar'
        ]);
    }

    public function annualReport()
    {
        $page = Page::where('slug', 'annual-report')->first();
        return view('pages.annual-report', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Annual Report - Bandos Komar'
        ]);
    }

    public function publication()
    {
        $page = Page::where('slug', 'publication')->first();
        return view('pages.publication', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Publication - Bandos Komar'
        ]);
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        return view('pages.contact', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Contact - Bandos Komar'
        ]);
    }
}
