@extends('layouts.admin')

@section('styles')
<style>
    .profile-container {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 2rem;
        align-items: start;
    }

    @media (max-width: 1024px) {
        .profile-container {
            grid-template-columns: 1fr;
        }
    }

    /* Settings Sidebar */
    .settings-nav {
        background: white;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 0.75rem;
        position: sticky;
        top: 2rem;
    }

    .settings-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.85rem 1rem;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 10px;
        transition: all 0.2s;
        margin-bottom: 0.25rem;
    }

    .settings-link:last-child {
        margin-bottom: 0;
    }

    .settings-link:hover {
        background: #f8fafc;
        color: var(--primary);
    }

    .settings-link.active {
        background: #fff7ed;
        color: var(--primary);
    }

    /* Main Settings Card */
    .settings-card {
        background: white;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .settings-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .settings-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
    }

    .settings-body {
        padding: 2rem;
    }

    /* Avatar Section */
    .avatar-upload-section {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #f1f5f9;
    }

    .avatar-preview-container {
        position: relative;
        width: 100px;
        height: 100px;
    }

    .avatar-preview {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 0 0 1px #e2e8f0;
    }

    .avatar-edit-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 32px;
        height: 32px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: all 0.2s;
    }

    .avatar-edit-btn:hover {
        color: var(--primary);
        border-color: var(--primary);
    }

    .avatar-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    .avatar-info p {
        font-size: 0.85rem;
        color: #64748b;
    }

    /* Form Styles */
    .settings-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    @media (max-width: 640px) {
        .settings-form-grid {
            grid-template-columns: 1fr;
        }
    }

    .input-group {
        margin-bottom: 1.5rem;
    }

    .input-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .input-styled {
        width: 100%;
        padding: 0.75rem 1rem;
        background: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 0.95rem;
        color: #1e293b;
        transition: all 0.2s;
        outline: none;
    }

    .input-styled:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(246, 139, 30, 0.1);
    }

    .input-styled::placeholder {
        color: #94a3b8;
    }

    .section-divider {
        margin: 2rem 0;
        height: 1px;
        background: #f1f5f9;
    }

    .section-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary);
    }

    .btn-update {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }

    .btn-update:hover {
        background: #ea580c;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(246, 139, 30, 0.2);
    }

    /* Custom Toast Notification */
    .notification {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        font-weight: 600;
        font-size: 0.9rem;
        animation: fadeIn 0.3s ease-out;
    }

    .notification-success {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .notification-error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('admin_content')
<div class="page-header" style="margin-bottom: 2.5rem;">
    <h1 class="page-title">{{ __('Account Settings') }}</h1>
    <p class="page-subtitle">{{ __('Manage your personal information, security, and preferences.') }}</p>
</div>

@if(session('success'))
    <div class="notification notification-success">
        <i data-lucide="check-circle" style="width: 20px;"></i>
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="notification notification-error">
        <i data-lucide="alert-circle" style="width: 20px;"></i>
        <div>
            @foreach($errors->all() as $error)
                <div style="margin-bottom: 2px;">{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif

<div class="profile-container">
    {{-- Settings Sidebar --}}
    <div class="settings-nav">
        <a href="#general" class="settings-link active">
            <i data-lucide="user"></i> {{ __('General Information') }}
        </a>
        <a href="#security" class="settings-link">
            <i data-lucide="shield-check"></i> {{ __('Security & Password') }}
        </a>
        <a href="#" class="settings-link">
            <i data-lucide="bell"></i> {{ __('Notifications') }}
        </a>
        <a href="#" class="settings-link">
            <i data-lucide="link"></i> {{ __('Connected Apps') }}
        </a>
    </div>

    {{-- Settings Content --}}
    <div class="settings-card">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="settings-header">
                <span class="settings-title">{{ __('Profile Details') }}</span>
                <button type="submit" class="btn-update">
                    <i data-lucide="save"></i> {{ __('Save Changes') }}
                </button>
            </div>

            <div class="settings-body">
                {{-- Avatar Section --}}
                <div class="avatar-upload-section">
                    <div class="avatar-preview-container">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=f68b1e&color=fff&bold=true&size=200' }}" id="avatarPreview" class="avatar-preview">
                        <label for="avatarInput" class="avatar-edit-btn">
                            <i data-lucide="camera" style="width: 16px;"></i>
                        </label>
                        <input type="file" id="avatarInput" name="avatar" style="display: none;" accept="image/*">
                    </div>
                    <div class="avatar-info">
                        <h4>{{ __('Profile Picture') }}</h4>
                        <p>{{ __('JPG, GIF or PNG. Max size of 2MB.') }}</p>
                        <button type="button" onclick="document.getElementById('avatarInput').click()" style="margin-top: 0.75rem; background: none; border: 1px solid #d1d5db; padding: 0.4rem 0.8rem; border-radius: 8px; font-size: 0.8rem; font-weight: 600; cursor: pointer; color: #475569;">
                            {{ __('Change Photo') }}
                        </button>
                    </div>
                </div>

                {{-- General Information --}}
                <div class="section-title">
                    <i data-lucide="info"></i> {{ __('General Information') }}
                </div>
                
                <div class="settings-form-grid">
                    <div class="input-group">
                        <label>{{ __('Full Name') }}</label>
                        <input type="text" name="name" class="input-styled" value="{{ old('name', $user->name) }}" placeholder="e.g. John Doe" required>
                    </div>
                    <div class="input-group">
                        <label>{{ __('Email Address') }}</label>
                        <input type="email" name="email" class="input-styled" value="{{ old('email', $user->email) }}" placeholder="e.g. john@example.com" required>
                    </div>
                </div>

                <div class="section-divider"></div>

                {{-- Password Section --}}
                <div class="section-title" id="security">
                    <i data-lucide="lock"></i> {{ __('Update Password') }}
                </div>
                <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 1.5rem;">{{ __('For your security, please use a password with at least 8 characters.') }}</p>

                <div class="settings-form-grid">
                    <div class="input-group">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="input-styled" placeholder="{{ __('Leave blank to keep current') }}">
                    </div>
                    <div class="input-group">
                        <label>{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" class="input-styled" placeholder="{{ __('Re-type new password') }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ex) {
                document.getElementById('avatarPreview').src = ex.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Simple scroll behavior for sidebar links
    document.querySelectorAll('.settings-link').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                // e.preventDefault();
                document.querySelectorAll('.settings-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
</script>
@endsection
