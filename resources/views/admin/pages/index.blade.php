@extends('layouts.admin')

@section('admin_content')
<div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 style="font-size: 1.8rem; font-weight: 800; color: #1e293b;">Page Management</h1>
        <p style="color: #64748b; font-weight: 500;">Manage the content of your website pages</p>
    </div>
</div>

@if(session('success'))
    <div style="background: #ecfdf5; color: #059669; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem;">
        <i data-lucide="check-circle"></i> {{ session('success') }}
    </div>
@endif

<div style="background: white; border-radius: 20px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                <th style="padding: 1.25rem 1.5rem; font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Page Title</th>
                <th style="padding: 1.25rem 1.5rem; font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Slug</th>
                <th style="padding: 1.25rem 1.5rem; font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Status</th>
                <th style="padding: 1.25rem 1.5rem; font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Last Updated</th>
                <th style="padding: 1.25rem 1.5rem; font-weight: 700; color: #475569; font-size: 0.85rem; text-transform: uppercase; text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr style="border-bottom: 1px solid #e2e8f0; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                <td style="padding: 1.25rem 1.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 35px; height: 35px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #64748b;">
                            <i data-lucide="{{ $page->icon ?? 'file' }}" style="width: 18px; height: 18px;"></i>
                        </div>
                        <span style="font-weight: 700; color: #1e293b;">{{ $page->title }}</span>
                    </div>
                </td>
                <td style="padding: 1.25rem 1.5rem; color: #64748b; font-family: monospace; font-size: 0.9rem;">/{{ $page->slug }}</td>
                <td style="padding: 1.25rem 1.5rem;">
                    <span style="padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: 700; {{ $page->status === 'published' ? 'background: #ecfdf5; color: #059669;' : 'background: #f1f5f9; color: #64748b;' }}">
                        {{ ucfirst($page->status) }}
                    </span>
                </td>
                <td style="padding: 1.25rem 1.5rem; color: #64748b; font-size: 0.9rem;">{{ $page->updated_at->format('M d, Y') }}</td>
                <td style="padding: 1.25rem 1.5rem; text-align: right;">
                    <a href="{{ route('admin.pages.edit', $page->slug) }}" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; background: #f1f5f9; color: #1e293b; text-decoration: none; border-radius: 10px; font-weight: 700; font-size: 0.85rem; transition: all 0.2s;">
                        <i data-lucide="edit-3" style="width: 16px; height: 16px;"></i> Edit Page
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
