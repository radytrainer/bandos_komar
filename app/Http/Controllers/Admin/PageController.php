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
            'content_uploads.sections.*.cards.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'content_km_uploads.sections.*.cards.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
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

        if ($page->slug === 'our-program') {
            $content = $this->applyProgramUploads($request, $content, 'content_uploads');
            $content_km = $this->applyProgramUploads($request, $content_km, 'content_km_uploads');
            $content = $this->normalizeProgramContent($content);
            $content_km = $this->normalizeProgramContent($content_km);
        }

        $page->update(array_merge($validated, [
            'content' => $content,
            'content_km' => $content_km
        ]));

        return redirect()->route('admin.pages.edit', $page->slug)->with('success', 'Page updated successfully.');
    }

    private function applyProgramUploads(Request $request, $content, string $uploadRoot): mixed
    {
        if (!is_array($content)) {
            return $content;
        }

        foreach (($content['sections'] ?? []) as $sectionIndex => $section) {
            foreach (($section['cards'] ?? []) as $cardIndex => $card) {
                $file = data_get($request->file($uploadRoot), "sections.$sectionIndex.cards.$cardIndex.image");

                if ($file) {
                    $path = $file->store('programs', 'public');
                    $content['sections'][$sectionIndex]['cards'][$cardIndex]['image'] = '/storage/' . $path;
                }
            }
        }

        return $content;
    }

    private function normalizeProgramContent($content): mixed
    {
        if (!is_array($content)) {
            return $content;
        }

        $normalized = [
            'header' => [
                'title' => $content['header']['title'] ?? '',
                'description' => $content['header']['description'] ?? '',
            ],
            'sections' => [],
        ];

        foreach (($content['sections'] ?? []) as $section) {
            $cards = [];

            foreach (($section['cards'] ?? []) as $card) {
                $card = [
                    'title' => $card['title'] ?? '',
                    'description' => $card['description'] ?? '',
                    'image' => $card['image'] ?? '',
                ];

                if (collect($card)->filter(fn ($value) => filled($value))->isNotEmpty()) {
                    $cards[] = $card;
                }
            }

            $section = [
                'title' => $section['title'] ?? '',
                'text' => $section['text'] ?? '',
                'cards' => $cards,
            ];

            if (filled($section['title']) || filled($section['text']) || !empty($cards)) {
                $normalized['sections'][] = $section;
            }
        }

        return $normalized;
    }
}
