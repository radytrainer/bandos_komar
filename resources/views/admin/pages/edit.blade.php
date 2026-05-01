@extends('layouts.admin')

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

<form action="{{ route('admin.pages.update', $page->slug) }}" method="POST" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    @csrf
    @method('PUT')
    
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Content Card -->
        <div style="background: white; border-radius: 20px; border: 1px solid #e2e8f0; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-weight: 800; color: #1e293b; margin-bottom: 0.5rem; font-size: 0.9rem;">Page Title</label>
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
            <a href="{{ url($page->slug === 'home' ? '/' : $page->slug) }}" target="_blank" style="display: block; text-align: center; margin-top: 1rem; color: #64748b; font-size: 0.85rem; font-weight: 700; text-decoration: none;">View Live Page</a>
        </div>
    </div>
</form>
@endsection
