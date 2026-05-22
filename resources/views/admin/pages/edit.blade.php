@extends('layouts.admin')

@section('styles')
<style>
    /*  */
    .file-upload {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        transition: 0.2s ease;
    }

    .file-upload:hover {
        border-color: #cbd5e1;
        background: #f1f5f9;
    }

    .upload-btn {
        padding: 9px 14px;
        border: none;
        border-radius: 10px;
        background: #858a94;
        color: white;
        font-size: 0.9rem;
        cursor: pointer;
        transition: 0.2s ease;
        font-weight: 500;
    }

    .upload-btn:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .upload-btn:active {
        transform: translateY(0);
    }

    .file-name {
        font-size: 0.85rem;
        color: #64748b;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 200px;
    }

    /*  */
    .program-builder-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .program-section-editor {
        position: relative;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    }

    .program-card-editor {
        position: relative;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
        transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
    }

    .program-card-editor:hover {
        border-color: #fdba74 !important;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        transform: translateY(-1px);
    }

    .program-editor-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .program-remove-button {
        border: none;
        border-radius: 999px;
        background: #fee2e2;
        color: #dc2626;
        cursor: pointer;
        font-size: 0.75rem;
        font-weight: 800;
        padding: 0.35rem 0.65rem;
    }

    .program-remove-button:hover {
        background: #fecaca;
    }

    .program-image-preview {
        display: block;
        width: 100%;
        height: 110px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 0.65rem;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    .program-image-preview[src=""] {
        display: none;
    }

    .program-card-editor input:focus,
    .program-card-editor textarea:focus,
    .program-section-editor>input:focus,
    .program-section-editor>textarea:focus {
        border-color: #f68b1e !important;
        box-shadow: 0 0 0 3px rgba(246, 139, 30, 0.12);
        outline: none;
    }
</style>
@endsection

@section('admin_content')
<div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 style="font-size: 1.8rem; font-weight: 800; color: #1e293b;">Edit Page: {{ $page->title }}</h1>
        <p style="color: #64748b; font-weight: 500;">Customize content and settings for the {{ strtolower($page->title) }}</p>
    </div>
    <a href="{{ route('admin.pages.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; color: #64748b; text-decoration: none; font-weight: 700; font-size: 0.9rem;">
        <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i> Back to Pages
    </a>
</div>

<form action="{{ route('admin.pages.update', $page->slug) }}" method="POST" enctype="multipart/form-data" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    @csrf
    @method('PUT')

    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Content Card -->
        <div style="background: white; border-radius: 20px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
            <!-- Language Tabs -->
            <div style="display: flex; gap: 1rem; margin-bottom: 2rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem;">
                <button type="button" onclick="switchLang('en')" id="btn-en" style="padding: 0.5rem 1.5rem; border-radius: 8px; border: none; background: #fff7ed; color: #f68b1e; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                    <img src="https://flagcdn.com/w20/gb.png" style="width: 16px;"> English
                </button>
                <button type="button" onclick="switchLang('km')" id="btn-km" style="padding: 0.5rem 1.5rem; border-radius: 8px; border: none; background: #f8fafc; color: #64748b; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                    <img src="https://flagcdn.com/w20/kh.png" style="width: 16px;"> Khmer
                </button>
            </div>

            <div id="en-fields">
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">Page Title (English)</label>
                    <input type="text" name="title" value="{{ $page->title }}" style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 1.2rem; font-weight: 700; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#f68b1e'">
                </div>

                @if($page->slug === 'home')
                <div style="display: flex; flex-direction: column; gap: 2.5rem;">
                    <!-- Hero -->
                    <section>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9; display: flex; align-items: center; gap: 0.5rem;"><i data-lucide="image"></i> Hero Section</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <input type="text" name="content[hero][badge]" value="{{ $page->content['hero']['badge'] ?? '' }}" placeholder="Badge Text" style="grid-column: span 2; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <input type="text" name="content[hero][title]" value="{{ $page->content['hero']['title'] ?? '' }}" placeholder="Main Title" style="padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <input type="text" name="content[hero][subtitle]" value="{{ $page->content['hero']['subtitle'] ?? '' }}" placeholder="Subtitle (Orange)" style="padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <textarea name="content[hero][description]" rows="3" placeholder="Description" style="grid-column: span 2; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content['hero']['description'] ?? '' }}</textarea>
                            <input type="text" name="content[hero][image]" value="{{ $page->content['hero']['image'] ?? '' }}" placeholder="Hero Image URL" style="grid-column: span 2; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                        </div>
                    </section>
                    <!-- Stats -->
                    <section>
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9; display: flex; align-items: center; gap: 0.5rem;"><i data-lucide="bar-chart-2"></i> Stats Section</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            @for($i = 0; $i < 4; $i++)
                                <div style="padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                                <input type="text" name="content[stats][items][{{ $i }}][value]" value="{{ $page->content['stats']['items'][$i]['value'] ?? '' }}" placeholder="Value" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 800; margin-bottom: 0.5rem;">
                                <input type="text" name="content[stats][items][{{ $i }}][label]" value="{{ $page->content['stats']['items'][$i]['label'] ?? '' }}" placeholder="Label" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.8rem;">
                        </div>
                        @endfor
                </div>
                </section>
                <!-- Programs -->
                <section>
                    <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9; display: flex; align-items: center; gap: 0.5rem;"><i data-lucide="grid"></i> Programs Section</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        @for($i = 0; $i < 4; $i++)
                            <div style="padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                            <input type="text" name="content[programs][{{ $i }}][title]" value="{{ $page->content['programs'][$i]['title'] ?? '' }}" placeholder="Program Title" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                            <textarea name="content[programs][{{ $i }}][description]" rows="2" placeholder="Description" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.8rem;">{{ $page->content['programs'][$i]['description'] ?? '' }}</textarea>
                    </div>
                    @endfor
            </div>
            </section>
        </div>

        @elseif($page->slug === 'about-us')
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Header</h3>
                <input type="text" name="content[header][title]" value="{{ $page->content['header']['title'] ?? '' }}" placeholder="Title" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 1rem;">
                <textarea name="content[header][description]" rows="2" placeholder="Description" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content['header']['description'] ?? '' }}</textarea>
            </section>
            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Mission</h3>
                <textarea name="content[mission][description]" rows="4" placeholder="Mission Description" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 1rem;">{{ $page->content['mission']['description'] ?? '' }}</textarea>
                <input type="text" name="content[mission][quote]" value="{{ $page->content['mission']['quote'] ?? '' }}" placeholder="Inspirational Quote" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-style: italic;">
            </section>
        </div>

        @elseif($page->slug === 'our-program')
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">Header</h3>
                <input type="text" name="content[header][title]" value="{{ $page->content['header']['title'] ?? '' }}" placeholder="Page Title" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 1rem;">
                <textarea name="content[header][description]" rows="2" placeholder="Page Description" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content['header']['description'] ?? '' }}</textarea>
            </section>

            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">Program Sections</h3>
                @php
                $programSections = $page->content['sections'] ?? [];
                $programSectionTotal = max(1, count($programSections));
                @endphp
                <div class="program-sections" data-content-root="content" data-upload-root="content_uploads" data-section-label="Section" data-card-label="Card" data-remove-section-label="Delete Section" data-remove-card-label="Delete" data-add-card-label="+ Add Card" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @for($sectionIndex = 0; $sectionIndex < $programSectionTotal; $sectionIndex++)
                        @php
                        $programCards=$page->content['sections'][$sectionIndex]['cards'] ?? [];
                        $programCardTotal = max(1, count($programCards));
                        @endphp
                        <div class="program-section-editor" data-section-index="{{ $sectionIndex }}" style="padding: 1.25rem; background: #f8fafc; border-radius: 15px; border: 1px solid #e2e8f0;">
                            <div class="program-editor-title">
                                <h4 style="font-size: 0.95rem; font-weight: 800; color: #1e293b;">Section {{ $sectionIndex + 1 }}</h4>
                                <button type="button" class="program-remove-button remove-program-section">Delete Section</button>
                            </div>
                            <input type="text" name="content[sections][{{ $sectionIndex }}][title]" value="{{ $page->content['sections'][$sectionIndex]['title'] ?? '' }}" placeholder="Section Title" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.75rem;">
                            <textarea name="content[sections][{{ $sectionIndex }}][text]" rows="2" placeholder="Section Text" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1rem;">{{ $page->content['sections'][$sectionIndex]['text'] ?? '' }}</textarea>

                            <div class="program-cards" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                @for($cardIndex = 0; $cardIndex < $programCardTotal; $cardIndex++)
                                    <div class="program-card-editor" data-card-index="{{ $cardIndex }}" style="padding: 1rem; background: white; border-radius: 12px; border: 1px solid #e2e8f0;">
                                    <div class="program-editor-title">
                                        <h5 style="font-size: 0.85rem; font-weight: 800; color: #64748b;">Card {{ $cardIndex + 1 }}</h5>
                                        <button type="button" class="program-remove-button remove-program-card">Delete</button>
                                    </div>
                                    <input type="text" name="content[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][title]" value="{{ $page->content['sections'][$sectionIndex]['cards'][$cardIndex]['title'] ?? '' }}" placeholder="Card Title" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                                    <textarea name="content[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][description]" rows="2" placeholder="Short Description" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;">{{ $page->content['sections'][$sectionIndex]['cards'][$cardIndex]['description'] ?? '' }}</textarea>
                                    <div class="file-upload">
                                        <input
                                            type="file"
                                            name="content_uploads[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][image]"
                                            accept="image/*"
                                            hidden
                                            id="file-{{ $sectionIndex }}-{{ $cardIndex }}">

                                        <button
                                            type="button"
                                            class="upload-btn"
                                            onclick="document.getElementById('file-{{ $sectionIndex }}-{{ $cardIndex }}').click()">
                                            Upload Image
                                        </button>

                                        <span class="file-name">No file chosen</span>
                                    </div>
                                    @if(!empty($page->content['sections'][$sectionIndex]['cards'][$cardIndex]['image']))
                                    <img class="program-image-preview" src="{{ $page->content['sections'][$sectionIndex]['cards'][$cardIndex]['image'] }}" alt="" onerror="this.style.display='none'">
                                    @endif
                            </div>
                            @endfor
                        </div>
                        <button type="button" class="add-program-card" style="margin-top: 1rem; padding: 0.55rem 0.85rem; border: 1px dashed #f68b1e; color: #f68b1e; background: white; border-radius: 8px; font-weight: 800; cursor: pointer;">+ Add Card</button>
                </div>
                @endfor
        </div>
        <button type="button" class="add-program-section" data-target-root="content" style="margin-top: 1rem; padding: 0.65rem 1rem; border: none; color: white; background: #1e293b; border-radius: 10px; font-weight: 800; cursor: pointer;">+ Add Section</button>
        </section>
    </div>

    @elseif($page->slug === 'history')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">Timeline Management</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 100px 1fr; gap: 1rem;">
                <input type="text" name="content[timeline][{{ $i }}][year]" value="{{ $page->content['timeline'][$i]['year'] ?? '' }}" placeholder="Year" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 800; text-align: center;">
                <div>
                    <input type="text" name="content[timeline][{{ $i }}][title]" value="{{ $page->content['timeline'][$i]['title'] ?? '' }}" placeholder="Event Title" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                    <textarea name="content[timeline][{{ $i }}][description]" rows="2" placeholder="Description" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem;">{{ $page->content['timeline'][$i]['description'] ?? '' }}</textarea>
                </div>
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'annual-report')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">Reports List</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 1fr 120px 1fr; gap: 1rem;">
                <input type="text" name="content[reports][{{ $i }}][title]" value="{{ $page->content['reports'][$i]['title'] ?? '' }}" placeholder="Report Title" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <input type="text" name="content[reports][{{ $i }}][year]" value="{{ $page->content['reports'][$i]['year'] ?? '' }}" placeholder="Year" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; text-align: center;">
                <input type="text" name="content[reports][{{ $i }}][link]" value="{{ $page->content['reports'][$i]['link'] ?? '' }}" placeholder="Download Link" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'publication')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">Publications List</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 2fr 1fr; gap: 1rem;">
                <input type="text" name="content[items][{{ $i }}][title]" value="{{ $page->content['items'][$i]['title'] ?? '' }}" placeholder="Publication Title" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <input type="text" name="content[items][{{ $i }}][link]" value="{{ $page->content['items'][$i]['link'] ?? '' }}" placeholder="Link" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'contact')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">Contact Details</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <input type="text" name="content[info][address]" value="{{ $page->content['info']['address'] ?? '' }}" placeholder="Address" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
            <input type="email" name="content[info][email]" value="{{ $page->content['info']['email'] ?? '' }}" placeholder="Email" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
            <input type="text" name="content[info][phone]" value="{{ $page->content['info']['phone'] ?? '' }}" placeholder="Phone" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
            <input type="text" name="content[info][map_embed]" value="{{ $page->content['info']['map_embed'] ?? '' }}" placeholder="Google Map Embed URL" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
        </div>
    </section>

    @else
    <div style="margin-bottom: 1.5rem;">
        <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">Page Content</label>
        <textarea name="content" rows="20" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 1rem; color: #1e293b; outline: none; transition: border-color 0.2s; resize: vertical; line-height: 1.6;" onfocus="this.style.borderColor='#f68b1e'">{{ is_array($page->content) ? json_encode($page->content, JSON_PRETTY_PRINT) : $page->content }}</textarea>
    </div>
    @endif
    </div>

    <div id="km-fields" style="display: none;">
        <div style="margin-bottom: 2rem;">
            <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">ចំណងជើងទំព័រ (ភាសាខ្មែរ)</label>
            <input type="text" name="title_km" value="{{ $page->title_km }}" style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 1.2rem; font-weight: 700; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#f68b1e'">
        </div>

        @if($page->slug === 'home')
        <div style="display: flex; flex-direction: column; gap: 2.5rem;">
            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">ផ្នែកខាងលើ (Hero)</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <input type="text" name="content_km[hero][badge]" value="{{ $page->content_km['hero']['badge'] ?? '' }}" placeholder="អត្ថបទសម្គាល់" style="grid-column: span 2; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <input type="text" name="content_km[hero][title]" value="{{ $page->content_km['hero']['title'] ?? '' }}" placeholder="ចំណងជើងធំ" style="padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <input type="text" name="content_km[hero][subtitle]" value="{{ $page->content_km['hero']['subtitle'] ?? '' }}" placeholder="ចំណងជើងរង" style="padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <textarea name="content_km[hero][description]" rows="3" placeholder="ការពិពណ៌នា" style="grid-column: span 2; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content_km['hero']['description'] ?? '' }}</textarea>
                </div>
            </section>
            <section>
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">ផ្នែកស្ថិតិ (Stats)</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    @for($i = 0; $i < 4; $i++)
                        <div style="padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <input type="text" name="content_km[stats][items][{{ $i }}][value]" value="{{ $page->content_km['stats']['items'][$i]['value'] ?? '' }}" placeholder="តម្លៃ" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 800; margin-bottom: 0.5rem;">
                        <input type="text" name="content_km[stats][items][{{ $i }}][label]" value="{{ $page->content_km['stats']['items'][$i]['label'] ?? '' }}" placeholder="ស្លាក" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.8rem;">
                </div>
                @endfor
        </div>
        </section>
        <section>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">ផ្នែកកម្មវិធី (Programs)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                @for($i = 0; $i < 4; $i++)
                    <div style="padding: 1rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <input type="text" name="content_km[programs][{{ $i }}][title]" value="{{ $page->content_km['programs'][$i]['title'] ?? '' }}" placeholder="ឈ្មោះកម្មវិធី" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                    <textarea name="content_km[programs][{{ $i }}][description]" rows="2" placeholder="ការពិពណ៌នា" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.8rem;">{{ $page->content_km['programs'][$i]['description'] ?? '' }}</textarea>
            </div>
            @endfor
    </div>
    </section>
    </div>

    @elseif($page->slug === 'about-us')
    <div style="display: flex; flex-direction: column; gap: 2rem;">
        <section>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">ផ្នែកខាងលើ</h3>
            <input type="text" name="content_km[header][title]" value="{{ $page->content_km['header']['title'] ?? '' }}" placeholder="ចំណងជើង" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 1rem;">
            <textarea name="content_km[header][description]" rows="2" placeholder="ការពិពណ៌នា" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content_km['header']['description'] ?? '' }}</textarea>
        </section>
        <section>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">បេសកកម្ម</h3>
            <textarea name="content_km[mission][description]" rows="4" placeholder="ការពិពណ៌នាពីបេសកកម្ម" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 1rem;">{{ $page->content_km['mission']['description'] ?? '' }}</textarea>
            <input type="text" name="content_km[mission][quote]" value="{{ $page->content_km['mission']['quote'] ?? '' }}" placeholder="សម្រង់សម្តី" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-style: italic;">
        </section>
    </div>

    @elseif($page->slug === 'our-program')
    <div style="display: flex; flex-direction: column; gap: 2rem;">
        <section>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem;">ផ្នែកខាងលើ</h3>
            <input type="text" name="content_km[header][title]" value="{{ $page->content_km['header']['title'] ?? '' }}" placeholder="ចំណងជើងទំព័រ" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 1rem;">
            <textarea name="content_km[header][description]" rows="2" placeholder="ការពិពណ៌នាទំព័រ" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">{{ $page->content_km['header']['description'] ?? '' }}</textarea>
        </section>

        <section>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">ផ្នែកកម្មវិធី</h3>
            @php
            $programSectionsKm = $page->content_km['sections'] ?? [];
            $programSectionTotalKm = max(1, count($programSectionsKm));
            @endphp
            <div class="program-sections" data-content-root="content_km" data-upload-root="content_km_uploads" data-section-label="ផ្នែក" data-card-label="កាត" data-remove-section-label="លុបផ្នែក" data-remove-card-label="លុប" data-add-card-label="+ បន្ថែមកាត" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @for($sectionIndex = 0; $sectionIndex < $programSectionTotalKm; $sectionIndex++)
                    @php
                    $programCardsKm=$page->content_km['sections'][$sectionIndex]['cards'] ?? [];
                    $programCardTotalKm = max(1, count($programCardsKm));
                    @endphp
                    <div class="program-section-editor" data-section-index="{{ $sectionIndex }}" style="padding: 1.25rem; background: #f8fafc; border-radius: 15px; border: 1px solid #e2e8f0;">
                        <div class="program-editor-title">
                            <h4 style="font-size: 0.95rem; font-weight: 800; color: #1e293b;">ផ្នែក {{ $sectionIndex + 1 }}</h4>
                            <button type="button" class="program-remove-button remove-program-section">លុបផ្នែក</button>
                        </div>
                        <input type="text" name="content_km[sections][{{ $sectionIndex }}][title]" value="{{ $page->content_km['sections'][$sectionIndex]['title'] ?? '' }}" placeholder="ចំណងជើងផ្នែក" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.75rem;">
                        <textarea name="content_km[sections][{{ $sectionIndex }}][text]" rows="2" placeholder="អត្ថបទផ្នែក" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1rem;">{{ $page->content_km['sections'][$sectionIndex]['text'] ?? '' }}</textarea>

                        <div class="program-cards" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            @for($cardIndex = 0; $cardIndex < $programCardTotalKm; $cardIndex++)
                                <div class="program-card-editor" data-card-index="{{ $cardIndex }}" style="padding: 1rem; background: white; border-radius: 12px; border: 1px solid #e2e8f0;">
                                <div class="program-editor-title">
                                    <h5 style="font-size: 0.85rem; font-weight: 800; color: #64748b;">កាត {{ $cardIndex + 1 }}</h5>
                                    <button type="button" class="program-remove-button remove-program-card">លុប</button>
                                </div>
                                <input type="text" name="content_km[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][title]" value="{{ $page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['title'] ?? '' }}" placeholder="ចំណងជើងកាត" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                                <textarea name="content_km[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][description]" rows="2" placeholder="ការពិពណ៌នាខ្លី" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;">{{ $page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['description'] ?? '' }}</textarea>
                                <textarea name="content_km[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][full_description]" rows="3" placeholder="ការពិពណ៌នាពេញក្នុង modal" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;">{{ $page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['full_description'] ?? '' }}</textarea>
                                <input type="text" name="content_km[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][image]" value="{{ $page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['image'] ?? '' }}" placeholder="URL រូបភាព ឬ path រូបដែលបាន upload" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;">
                                <div class="image-upload">
                                    <label class="upload-box">
                                        <input
                                            type="file"
                                            name="content_km_uploads[sections][{{ $sectionIndex }}][cards][{{ $cardIndex }}][image]"
                                            accept="image/*"
                                            class="file-input">

                                        <div class="upload-content">
                                            <span class="icon">📁</span>
                                            <span class="text">Click or drag image to upload</span>
                                        </div>
                                    </label>
                                </div>
                                @if(!empty($page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['image']))
                                <img class="program-image-preview" src="{{ $page->content_km['sections'][$sectionIndex]['cards'][$cardIndex]['image'] }}" alt="" onerror="this.style.display='none'">
                                @endif
                        </div>
                        @endfor
                    </div>
                    <button type="button" class="add-program-card" style="margin-top: 1rem; padding: 0.55rem 0.85rem; border: 1px dashed #f68b1e; color: #f68b1e; background: white; border-radius: 8px; font-weight: 800; cursor: pointer;">+ បន្ថែមកាត</button>
            </div>
            @endfor
    </div>
    <button type="button" class="add-program-section" data-target-root="content_km" style="margin-top: 1rem; padding: 0.65rem 1rem; border: none; color: white; background: #1e293b; border-radius: 10px; font-weight: 800; cursor: pointer;">+ បន្ថែមផ្នែក</button>
    </section>
    </div>

    @elseif($page->slug === 'history')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">គ្រប់គ្រងប្រវត្តិរូប (Timeline)</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 100px 1fr; gap: 1rem;">
                <input type="text" name="content_km[timeline][{{ $i }}][year]" value="{{ $page->content_km['timeline'][$i]['year'] ?? '' }}" placeholder="ឆ្នាំ" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 800; text-align: center;">
                <div>
                    <input type="text" name="content_km[timeline][{{ $i }}][title]" value="{{ $page->content_km['timeline'][$i]['title'] ?? '' }}" placeholder="ចំណងជើងព្រឹត្តិការណ៍" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                    <textarea name="content_km[timeline][{{ $i }}][description]" rows="2" placeholder="ការពិពណ៌នា" style="width: 100%; padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem;">{{ $page->content_km['timeline'][$i]['description'] ?? '' }}</textarea>
                </div>
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'annual-report')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">បញ្ជីរបាយការណ៍</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 1fr 120px 1fr; gap: 1rem;">
                <input type="text" name="content_km[reports][{{ $i }}][title]" value="{{ $page->content_km['reports'][$i]['title'] ?? '' }}" placeholder="ចំណងជើងរបាយការណ៍" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <input type="text" name="content_km[reports][{{ $i }}][year]" value="{{ $page->content_km['reports'][$i]['year'] ?? '' }}" placeholder="ឆ្នាំ" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0; text-align: center;">
                <input type="text" name="content_km[reports][{{ $i }}][link]" value="{{ $page->content_km['reports'][$i]['link'] ?? '' }}" placeholder="តំណភ្ជាប់" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'publication')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">បញ្ជីការបោះពុម្ពផ្សាយ</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @for($i = 0; $i < 5; $i++)
                <div style="padding: 1rem; background: #f8fafc; border-radius: 15px; display: grid; grid-template-columns: 2fr 1fr; gap: 1rem;">
                <input type="text" name="content_km[items][{{ $i }}][title]" value="{{ $page->content_km['items'][$i]['title'] ?? '' }}" placeholder="ចំណងជើង" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <input type="text" name="content_km[items][{{ $i }}][link]" value="{{ $page->content_km['items'][$i]['link'] ?? '' }}" placeholder="តំណភ្ជាប់" style="padding: 0.5rem; border-radius: 8px; border: 1px solid #e2e8f0;">
        </div>
        @endfor
        </div>
    </section>

    @elseif($page->slug === 'contact')
    <section>
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #f1f5f9;">ព័ត៌មានទំនាក់ទំនង</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <input type="text" name="content_km[info][address]" value="{{ $page->content_km['info']['address'] ?? '' }}" placeholder="អាសយដ្ឋាន" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0;">
        </div>
    </section>

    @else
    <div style="margin-bottom: 1.5rem;">
        <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">មាតិកាទំព័រ</label>
        <textarea name="content_km" rows="20" style="width: 100%; padding: 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 1rem; color: #1e293b; outline: none; transition: border-color 0.2s; resize: vertical; line-height: 1.6;" onfocus="this.style.borderColor='#f68b1e'">{{ is_array($page->content_km) ? json_encode($page->content_km, JSON_PRETTY_PRINT) : $page->content_km }}</textarea>
    </div>
    @endif
    </div>
    </div>

    <!-- SEO Card -->
    <div style="background: white; border-radius: 20px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
        <h3 style="font-size: 1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i data-lucide="search" style="width: 18px; height: 18px; color: #f68b1e;"></i> SEO & Meta Tags
        </h3>
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">Meta Description</label>
            <textarea name="meta_description" rows="3" style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 0.95rem; font-weight: 600; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#f68b1e'">{{ $page->meta_description }}</textarea>
        </div>
        <div>
            <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ $page->meta_keywords }}" placeholder="e.g. education, children, cambodia" style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 0.95rem; font-weight: 600; color: #1e293b; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#f68b1e'">
        </div>
    </div>
    </div>

    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Publish Card -->
        <div style="background: white; border-radius: 20px; border: 1px solid #e2e8f0; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); position: sticky; top: 1.5rem;">
            <h3 style="font-size: 1rem; font-weight: 800; color: #1e293b; margin-bottom: 1.25rem;">Publish Settings</h3>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.85rem;">Status</label>
                <select name="status" style="width: 100%; padding: 0.75rem; border-radius: 10px; border: 1px solid #e2e8f0; font-weight: 600; color: #1e293b; outline: none;">
                    <option value="published" {{ $page->status === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ $page->status === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div style="background: #f8fafc; border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span style="font-size: 0.8rem; color: #64748b; font-weight: 600;">Last Modified:</span>
                    <span style="font-size: 0.8rem; color: #1e293b; font-weight: 700;">{{ $page->updated_at->format('M d, Y') }}</span>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span style="font-size: 0.8rem; color: #64748b; font-weight: 600;">Slug:</span>
                    <span style="font-size: 0.8rem; color: #f68b1e; font-weight: 700;">/{{ $page->slug }}</span>
                </div>
            </div>
            <button type="submit" style="width: 100%; padding: 0.8rem; background: var(--primary); color: white; border: none; border-radius: 12px; font-weight: 800; font-size: 1rem; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                <i data-lucide="save" style="width: 20px; height: 20px;"></i> Save Changes
            </button>
            @php
            $livePath = match ($page->slug) {
            'home' => '/',
            'about-us' => '/about',
            'our-program' => '/programs',
            default => '/' . $page->slug,
            };
            @endphp
            <a href="{{ url($livePath) }}" target="_blank" style="display: block; text-align: center; margin-top: 1rem; color: #64748b; font-size: 0.85rem; font-weight: 700; text-decoration: none;">View Live Page</a>
        </div>
    </div>
</form>

<script>
    function switchLang(lang) {
        const enFields = document.getElementById('en-fields');
        const kmFields = document.getElementById('km-fields');
        const btnEn = document.getElementById('btn-en');
        const btnKm = document.getElementById('btn-km');

        if (lang === 'en') {
            enFields.style.display = 'block';
            kmFields.style.display = 'none';
            btnEn.style.background = '#fff7ed';
            btnEn.style.color = '#f68b1e';
            btnKm.style.background = '#f8fafc';
            btnKm.style.color = '#64748b';
        } else {
            enFields.style.display = 'none';
            kmFields.style.display = 'block';
            btnEn.style.background = '#f8fafc';
            btnEn.style.color = '#64748b';
            btnKm.style.background = '#fff7ed';
            btnKm.style.color = '#f68b1e';
        }
    }

    function programCardHtml(contentRoot, uploadRoot, sectionIndex, cardIndex, cardLabel, removeCardLabel = 'Delete') {
        return `
            <div class="program-card-editor" data-card-index="${cardIndex}" style="padding: 1rem; background: white; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div class="program-editor-title">
                    <h5 style="font-size: 0.85rem; font-weight: 800; color: #64748b;">${cardLabel} ${cardIndex + 1}</h5>
                    <button type="button" class="program-remove-button remove-program-card">${removeCardLabel}</button>
                </div>
                <input type="text" name="${contentRoot}[sections][${sectionIndex}][cards][${cardIndex}][title]" placeholder="Card Title" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.5rem;">
                <textarea name="${contentRoot}[sections][${sectionIndex}][cards][${cardIndex}][description]" rows="2" placeholder="Description" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;"></textarea>
                <input type="text" name="${contentRoot}[sections][${sectionIndex}][cards][${cardIndex}][image]" placeholder="Image URL or uploaded path" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; margin-bottom: 0.5rem;">
                <input type="file" name="${uploadRoot}[sections][${sectionIndex}][cards][${cardIndex}][image]" accept="image/*" style="width: 100%; padding: 0.55rem; border-radius: 8px; border: 1px dashed #cbd5e1; background: #f8fafc; font-size: 0.85rem;">
                <img class="program-image-preview" src="" alt="">
            </div>
        `;
    }

    function programSectionHtml(container, sectionIndex) {
        const contentRoot = container.dataset.contentRoot;
        const uploadRoot = container.dataset.uploadRoot;
        const sectionLabel = container.dataset.sectionLabel || 'Section';
        const cardLabel = container.dataset.cardLabel || 'Card';
        const removeSectionLabel = container.dataset.removeSectionLabel || 'Delete Section';
        const removeCardLabel = container.dataset.removeCardLabel || 'Delete';
        const addCardLabel = container.dataset.addCardLabel || '+ Add Card';

        return `
            <div class="program-section-editor" data-section-index="${sectionIndex}" style="padding: 1.25rem; background: #f8fafc; border-radius: 15px; border: 1px solid #e2e8f0;">
                <div class="program-editor-title">
                    <h4 style="font-size: 0.95rem; font-weight: 800; color: #1e293b;">${sectionLabel} ${sectionIndex + 1}</h4>
                    <button type="button" class="program-remove-button remove-program-section">${removeSectionLabel}</button>
                </div>
                <input type="text" name="${contentRoot}[sections][${sectionIndex}][title]" placeholder="Section Title" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; margin-bottom: 0.75rem;">
                <textarea name="${contentRoot}[sections][${sectionIndex}][text]" rows="2" placeholder="Section Text" style="width: 100%; padding: 0.65rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1rem;"></textarea>
                <div class="program-cards" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    ${programCardHtml(contentRoot, uploadRoot, sectionIndex, 0, cardLabel, removeCardLabel)}
                </div>
                <button type="button" class="add-program-card" style="margin-top: 1rem; padding: 0.55rem 0.85rem; border: 1px dashed #f68b1e; color: #f68b1e; background: white; border-radius: 8px; font-weight: 800; cursor: pointer;">${addCardLabel}</button>
            </div>
        `;
    }

    document.addEventListener('click', (event) => {
        const removeCardButton = event.target.closest('.remove-program-card');
        if (removeCardButton) {
            removeCardButton.closest('.program-card-editor')?.remove();
            return;
        }

        const removeSectionButton = event.target.closest('.remove-program-section');
        if (removeSectionButton) {
            removeSectionButton.closest('.program-section-editor')?.remove();
            return;
        }

        const addCardButton = event.target.closest('.add-program-card');
        if (addCardButton) {
            const section = addCardButton.closest('.program-section-editor');
            const container = addCardButton.closest('.program-sections');
            const cards = section.querySelector('.program-cards');
            const sectionIndex = Number(section.dataset.sectionIndex);
            const cardIndexes = [...cards.querySelectorAll('.program-card-editor')].map((card) => Number(card.dataset.cardIndex));
            const cardIndex = cardIndexes.length ? Math.max(...cardIndexes) + 1 : 0;
            cards.insertAdjacentHTML('beforeend', programCardHtml(
                container.dataset.contentRoot,
                container.dataset.uploadRoot,
                sectionIndex,
                cardIndex,
                container.dataset.cardLabel || 'Card',
                container.dataset.removeCardLabel || 'Delete'
            ));
            return;
        }

        const addSectionButton = event.target.closest('.add-program-section');
        if (addSectionButton) {
            const container = document.querySelector(`.program-sections[data-content-root="${addSectionButton.dataset.targetRoot}"]`);
            const sectionIndexes = [...container.querySelectorAll('.program-section-editor')].map((section) => Number(section.dataset.sectionIndex));
            const sectionIndex = sectionIndexes.length ? Math.max(...sectionIndexes) + 1 : 0;
            container.insertAdjacentHTML('beforeend', programSectionHtml(container, sectionIndex));
        }
    });

    document.addEventListener('change', (event) => {
        const fileInput = event.target.matches('input[type="file"][accept="image/*"]') ? event.target : null;

        if (!fileInput || !fileInput.files?.[0]) {
            return;
        }

        const card = fileInput.closest('.program-card-editor');
        let preview = card.querySelector('.program-image-preview');

        if (!preview) {
            preview = document.createElement('img');
            preview.className = 'program-image-preview';
            preview.alt = '';
            fileInput.insertAdjacentElement('afterend', preview);
        }

        preview.src = URL.createObjectURL(fileInput.files[0]);
        preview.style.display = 'block';
    });
    // button file img 
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : "No file chosen";
            this.parentElement.querySelector('.file-name').textContent = fileName;
        });
    });
</script>
</script>
@endsection