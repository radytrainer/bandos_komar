<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - Bandos Komar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --sidebar-bg: #1e293b;
            --sidebar-text: #94a3b8;
            --sidebar-active: #334155;
            --primary: #f68b1e;
            --bg-light: #f8fafc;
            --border: #e2e8f0;
            --header-height: 70px;
            --sidebar-width: 280px;
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
        }

        /* Sidebar */
        aside {
            grid-row: 1 / 3;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .sidebar-header {
            height: var(--header-height);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.05);
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
        }

        .brand-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: white;
            margin-left: 0.75rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 1rem;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #475569;
            margin: 1.5rem 0 0.75rem 0.5rem;
        }

        .nav-list { list-style: none; }
        .nav-item { margin-bottom: 0.4rem; }

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
        }

        .nav-item.active a { background: var(--primary); color: white; }
        .nav-item a:hover:not(.active) { background: var(--sidebar-active); color: white; }
        .nav-item a svg { width: 20px; height: 20px; stroke-width: 2.5; }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.05);
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

        .header-left { display: flex; align-items: center; gap: 1rem; }

        .mobile-toggle {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
            background: #f1f5f9;
            border: none;
            border-radius: 8px;
        }

        .header-right { display: flex; align-items: center; gap: 1.5rem; }

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
        }

        .user-avatar { width: 38px; height: 38px; border-radius: 50%; }

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
            aside {
                position: fixed;
                top: 0; left: 0; bottom: 0;
                width: var(--sidebar-width);
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            aside.open { transform: translateX(0); }
            header { grid-column: 1 / 2; }
            main { grid-column: 1 / 2; }
            .mobile-toggle { display: block; }
            .close-sidebar { display: block; }
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
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }
        .sidebar-overlay.show { display: block; }

        .hidden { display: none; }
        @media (min-width: 640px) { .sm\:block { display: block; } }
    </style>
    @yield('styles')
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside id="adminSidebar">
        <div class="sidebar-header">
            <div style="display: flex; align-items: center;">
                <div class="brand-logo">BK</div>
                <span class="brand-name">Bandos Komar</span>
            </div>
            <button id="closeSidebar" class="close-sidebar">
                <i data-lucide="x"></i>
            </button>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">General</div>
            <ul class="nav-list">
                <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-lucide="layout-dashboard"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i data-lucide="users"></i> User Accounts
                    </a>
                </li>
            </ul>

            <div class="nav-label">Management</div>
            <ul class="nav-list">
                <li class="nav-item {{ Request::routeIs('admin.posts.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}">
                        <i data-lucide="newspaper"></i> Posts
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i data-lucide="folder-tree"></i> Categories
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('admin.donations.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.donations.index') }}">
                        <i data-lucide="heart-handshake"></i> Donations
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <a href="/logout" style="color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 0.75rem; font-weight: 600;">
                <i data-lucide="log-out"></i> Logout
            </a>
        </div>
    </aside>

    <header>
        <div class="header-left">
            <button class="mobile-toggle" id="openSidebar">
                <i data-lucide="menu"></i>
            </button>
            <h2 style="font-size: 1rem; font-weight: 700; color: #64748b;">Admin Control Panel</h2>
        </div>

        <div class="header-right">
            <a href="{{ route('home') }}" class="view-site-btn">
                <i data-lucide="globe"></i>
                <span class="hidden md:inline">Visit Website</span>
            </a>
            
            <div class="user-profile">
                <div style="text-align: right; margin-right: 0.75rem;" class="hidden sm:block">
                    <div style="font-weight: 800; font-size: 0.85rem;">Administrator</div>
                    <div style="font-size: 0.7rem; color: #94a3b8; font-weight: 700;">SUPER ADMIN</div>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=f68b1e&color=fff&bold=true" class="user-avatar" alt="Admin">
            </div>
        </div>
    </header>

    <main>
        @yield('admin_content')
    </main>

    <script>
        lucide.createIcons();

        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        const toggleSidebar = (state) => {
            if (state) {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            } else {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            }
        };

        openBtn.addEventListener('click', () => toggleSidebar(true));
        if(closeBtn) closeBtn.addEventListener('click', () => toggleSidebar(false));
        overlay.addEventListener('click', () => toggleSidebar(false));
    </script>
    @yield('scripts')
</body>
</html>
