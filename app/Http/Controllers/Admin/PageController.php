<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_km' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:published,draft',
        ]);

        $content = $request->input('content');
        $content_km = $request->input('content_km');
        
        // Helper to handle JSON input from textarea if needed
        $processContent = function($c) {
            if (is_string($c) && !empty($c)) {
                $decoded = json_decode($c, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $decoded;
                }
            }
            return $c;
        };

        $content = $processContent($content);
        $content_km = $processContent($content_km);

        $page->update(array_merge($validated, [
            'content' => $content,
            'content_km' => $content_km
        ]));

        return redirect()->route('admin.pages.edit', $page->slug)->with('success', 'Page updated successfully.');
    }
}
