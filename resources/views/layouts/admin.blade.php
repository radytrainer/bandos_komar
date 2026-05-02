<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - Bandos Komar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Manually define Khmer fonts with unicode-range to ensure they only apply to Khmer characters */
        @font-face {
            font-family: 'Battambang';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/battambang/v19/6NUK8F-S_I_4387N5A754ivJ.woff2) format('woff2');
            unicode-range: U+1780-17FF, U+19E0-19FF;
        }

        @font-face {
            font-family: 'Moul';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/moul/v24/S9m_4mZpB-45WvR8.woff2) format('woff2');
            unicode-range: U+1780-17FF, U+19E0-19FF;
        }

        :root {
            --sidebar-bg: #1e293b;
            --sidebar-text: #94a3b8;
            --sidebar-active: #334155;
            --primary: #f68b1e;
            --bg-light: #f8fafc;
            --border: #e2e8f0;
            --header-height: 70px;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --font-km-content: 'Plus Jakarta Sans', 'Battambang', sans-serif;
            --font-km-title: 'Plus Jakarta Sans', 'Moul', sans-serif;
        }

        /* 
           Apply Khmer font stacks. 
           Because of unicode-range, 'Battambang' and 'Moul' will ONLY be used 
           for Khmer characters. English characters in the same block will 
           automatically use 'Plus Jakarta Sans'.
        */
        html[lang="km"] body {
            font-family: var(--font-km-content);
            font-size: 1.1rem; /* Increase base size further */
        }

        html[lang="km"] h1 { font-size: 2rem; } 
        html[lang="km"] h2 { font-size: 1.6rem; }
        html[lang="km"] h3 { font-size: 1.35rem; }

        html[lang="km"] h1,
        html[lang="km"] h2,
        html[lang="km"] h3,
        html[lang="km"] .km-title,
        html[lang="km"] .card-title,
        html[lang="km"] .page-title {
            font-family: var(--font-km-title);
            line-height: 1.6;
        }

        html[lang="km"] .nav-text {
            font-family: var(--font-km-content);
            font-size: 1.1rem !important; 
            font-weight: 600;
        }

        html[lang="km"] .nav-label {
            font-family: var(--font-km-content);
            font-size: 0.9rem !important;
            font-weight: 700;
        }

        html[lang="km"] .km-content,
        html[lang="km"] p,
        html[lang="km"] span,
        html[lang="km"] td,
        html[lang="km"] a,
        html[lang="km"] div,
        html[lang="km"] label,
        html[lang="km"] input,
        html[lang="km"] textarea {
            font-family: var(--font-km-content);
            line-height: 1.8;
        }

        html[lang="km"] td {
            font-size: 1rem !important; 
        }

        html[lang="km"] th {
            font-family: var(--font-km-title) !important;
            font-size: 0.95rem !important;
            font-weight: 400; /* Moul is naturally bold */
        }

        html[lang="km"] .card-subtitle,
        html[lang="km"] .stat-label,
        html[lang="km"] .donor-count {
            font-size: 0.9rem !important; /* Increase small subtitles */
        }

        /* Adjust specific UI elements that might overflow */
        html[lang="km"] .btn {
            font-size: 1rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            height: 100vh;
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr;
            overflow: hidden;
            transition: var(--transition);
        }

        body.collapsed {
            grid-template-columns: var(--sidebar-collapsed-width) 1fr;
        }

        /* Sidebar */
        aside {
            grid-row: 1 / 3;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: var(--transition);
            overflow-x: hidden;
        }

        .sidebar-header {
            height: var(--header-height);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
        }

        .brand-logo {
            width: 35px;
            height: 35px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: white;
            margin-left: 0.75rem;
            transition: opacity 0.2s;
        }

        body.collapsed .brand-name {
            opacity: 0;
            pointer-events: none;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 1rem;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .nav-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #475569;
            margin: 1.5rem 0 0.75rem 0.5rem;
            white-space: nowrap;
            transition: opacity 0.2s;
        }

        body.collapsed .nav-label {
            opacity: 0;
        }

        .nav-list {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.4rem;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.8rem 1rem;
            color: var(--sidebar-text);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 12px;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .nav-item.active a {
            background: var(--primary);
            color: white;
        }

        .nav-item a:hover:not(.active) {
            background: var(--sidebar-active);
            color: white;
        }

        .nav-item a svg {
            width: 20px;
            height: 20px;
            stroke-width: 2.5;
            flex-shrink: 0;
        }

        .nav-text {
            transition: opacity 0.2s;
        }

        body.collapsed .nav-text {
            opacity: 0;
            pointer-events: none;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
        }

        body.collapsed .footer-text {
            display: none;
        }

        /* Header */
        header {
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 900;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-toggle {
            cursor: pointer;
            padding: 0.5rem;
            background: #f1f5f9;
            border: none;
            border-radius: 8px;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .sidebar-toggle:hover {
            background: #e2e8f0;
            color: var(--primary);
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
            background: #f1f5f9;
            border: none;
            border-radius: 8px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .view-site-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-left: 1.5rem;
            border-left: 1px solid var(--border);
            cursor: pointer;
            position: relative;
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 220px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            display: none;
            flex-direction: column;
            z-index: 1001;
            animation: slideIn 0.2s ease-out;
        }

        .profile-dropdown.show {
            display: flex;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #475569;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .dropdown-divider {
            height: 1px;
            background: var(--border);
            margin: 0.5rem 0;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
        }

        /* Content Area */
        main {
            overflow-y: auto;
            padding: 2.5rem;
            background-color: var(--bg-light);
        }

        /* Mobile Adjustments */
        @media (max-width: 991px) {
            body {
                grid-template-columns: 1fr;
            }

            body.collapsed {
                grid-template-columns: 1fr;
            }

            aside {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: var(--sidebar-width) !important;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            aside.open {
                transform: translateX(0);
            }

            header {
                grid-column: 1 / 2;
            }

            main {
                grid-column: 1 / 2;
            }

            .mobile-toggle {
                display: block;
            }

            .sidebar-toggle {
                display: none;
            }

            .close-sidebar {
                display: block;
            }

            body.collapsed .brand-name,
            body.collapsed .nav-label,
            body.collapsed .nav-text {
                opacity: 1 !important;
                pointer-events: auto !important;
            }
        }

        .close-sidebar {
            display: none;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        .hidden {
            display: none;
        }

        @media (min-width: 640px) {
            .sm\:block {
                display: block;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside id="adminSidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; text-decoration: none;">
                <div class="brand-logo">BK</div>
                <span class="brand-name">{{ __('Bandos Komar') }}</span>
            </a>
            <button id="closeSidebar" class="close-sidebar">
                <i data-lucide="x"></i>
            </button>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">{{ __('GENERAL') }}</div>
            <ul class="nav-list">
                <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-lucide="layout-dashboard"></i>
                        <span class="nav-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i data-lucide="users"></i>
                            <span class="nav-text">{{ __('Users') }}</span>
                        </a>
                    </li>
                @endif
            </ul>

            <div class="nav-label">{{ __('MANAGEMENT') }}</div>
            <ul class="nav-list">
                <li class="nav-item {{ Request::is('admin/pages/home*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'home') }}">
                        <i data-lucide="home"></i>
                        <span class="nav-text">{{ __('Home Page') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/about-us*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'about-us') }}">
                        <i data-lucide="info"></i>
                        <span class="nav-text">{{ __('About Us') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/history*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'history') }}">
                        <i data-lucide="history"></i>
                        <span class="nav-text">{{ __('History') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/our-program*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'our-program') }}">
                        <i data-lucide="graduation-cap"></i>
                        <span class="nav-text">{{ __('Our Program') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/annual-report*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'annual-report') }}">
                        <i data-lucide="file-text"></i>
                        <span class="nav-text">{{ __('Annual Report') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/publication*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'publication') }}">
                        <i data-lucide="book-open"></i>
                        <span class="nav-text">{{ __('Publication') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pages/contact*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.edit', 'contact') }}">
                        <i data-lucide="mail"></i>
                        <span class="nav-text">{{ __('Contact') }}</span>
                    </a>
                </li>
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item {{ Request::routeIs('admin.donations.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.donations.index') }}">
                            <i data-lucide="heart-handshake"></i>
                            <span class="nav-text">{{ __('Donations') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: none;">
                @csrf
            </form>
            <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit();"
                style="color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 0.75rem; font-weight: 600;">
                <i data-lucide="log-out"></i>
                <span class="nav-text footer-text">{{ __('Logout') }}</span>
            </a>
        </div>
    </aside>

    <header>
        <div class="header-left">
            <button class="sidebar-toggle" id="toggleSidebar">
                <i data-lucide="menu"></i>
            </button>
            <button class="mobile-toggle" id="openSidebar">
                <i data-lucide="menu"></i>
            </button>
            <h2 style="font-size: 1rem; font-weight: 700; color: #64748b;">{{ __('Admin Control Panel') }}</h2>
        </div>

        <div class="header-right">
            <div class="lang-switcher"
                style="display: flex; gap: 0.5rem; margin-right: 1rem; padding-right: 1rem; border-right: 1px solid var(--border);">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                    style="text-decoration: none; font-size: 0.8rem; font-weight: 700; color: {{ app()->getLocale() == 'en' ? 'var(--primary)' : '#64748b' }};">EN</a>
                <span style="color: #cbd5e1;">|</span>
                <a href="{{ route('lang.switch', 'km') }}"
                    class="lang-btn {{ app()->getLocale() == 'km' ? 'active' : '' }}"
                    style="text-decoration: none; font-size: 0.8rem; font-weight: 700; color: {{ app()->getLocale() == 'km' ? 'var(--primary)' : '#64748b' }};">KM</a>
            </div>
            <a href="{{ route('home') }}" class="view-site-btn">
                <i data-lucide="globe"></i>
                <span class="hidden md:inline">{{ __('Visit Website') }}</span>
            </a>

            <div class="user-profile" id="userProfile">
                <div style="text-align: right; margin-right: 0.75rem;" class="hidden sm:block">
                    <div style="font-weight: 800; font-size: 0.85rem;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.7rem; color: #94a3b8; font-weight: 700; text-transform: uppercase;">
                        {{ __(ucfirst(Auth::user()->role)) }}
                    </div>
                </div>
                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=f68b1e&color=fff&bold=true' }}"
                    class="user-avatar" alt="User">
                <i data-lucide="chevron-down" style="width: 14px; color: #94a3b8; margin-left: 0.25rem;"></i>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                        <i data-lucide="user"></i> {{ __('Change Profile') }}
                    </a>
                    <a href="#" class="dropdown-item">
                        <i data-lucide="settings"></i> {{ __('Account Settings') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit();"
                        class="dropdown-item" style="color: #ef4444;">
                        <i data-lucide="log-out"></i> {{ __('Logout') }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('admin_content')
    </main>

    <script>
        lucide.createIcons();

        const body = document.body;
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('toggleSidebar');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        // User Profile Dropdown
        const userProfile = document.getElementById('userProfile');
        const profileDropdown = document.getElementById('profileDropdown');

        userProfile.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
        });

        window.addEventListener('click', () => {
            profileDropdown.classList.remove('show');
        });

        // Check for saved sidebar state
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            body.classList.add('collapsed');
        }

        const toggleSidebarCollapse = () => {
            body.classList.toggle('collapsed');
            localStorage.setItem('sidebar-collapsed', body.classList.contains('collapsed'));
        };

        const toggleMobileSidebar = (state) => {
            if (state) {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            } else {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            }
        };

        toggleBtn.addEventListener('click', toggleSidebarCollapse);
        openBtn.addEventListener('click', () => toggleMobileSidebar(true));
        if (closeBtn) closeBtn.addEventListener('click', () => toggleMobileSidebar(false));
        overlay.addEventListener('click', () => toggleMobileSidebar(false));
    </script>
    @yield('scripts')
</body>

</html>
@yield('scripts')
</body>

</html>