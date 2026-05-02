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

    public function programs()
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

    public function photoGallery()
    {
        $page = Page::where('slug', 'photo-gallery')->first();
        return view('pages.photo-gallery', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Photo Gallery - Bandos Komar'
        ]);
    }

    public function videoCenter()
    {
        $page = Page::where('slug', 'video-center')->first();
        return view('pages.video-center', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Video Center - Bandos Komar'
        ]);
    }

    public function supportUs()
    {
        $page = Page::where('slug', 'support-us')->first();
        return view('pages.support-us', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Support Us - Bandos Komar'
        ]);
    }

    public function sponsorChild()
    {
        $page = Page::where('slug', 'sponsor-child')->first();
        return view('pages.sponsor-child', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Sponsor a Child - Bandos Komar'
        ]);
    }

    public function waysToGive()
    {
        $page = Page::where('slug', 'ways-to-give')->first();
        return view('pages.ways-to-give', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Ways to Give - Bandos Komar'
        ]);
    }

    public function career()
    {
        $page = Page::where('slug', 'career')->first();
        return view('pages.career', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Career - Bandos Komar'
        ]);
    }

    public function donate()
    {
        $page = Page::where('slug', 'donate')->first();
        return view('pages.donate', [
            'page' => $page,
            'title' => $page->translated_title ?? 'Donate - Bandos Komar'
        ]);
    }
}
