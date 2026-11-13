<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Nadila Amelia</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>
    <div id="page-loader" aria-hidden="true"></div>
    <div class="layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="profile">
                    <img src="{{ asset('images/profile.jpeg') }}?v={{ filemtime(public_path('images/profile.jpeg')) }}" alt="Nadila Amelia">
                    <div>
                        <h2>Nadila Amelia</h2>
                        <p>Junior iOS Developer</p>
                        <p>🇮🇩 Bali, Indonesia</p>
                    </div>
                </div>

                <button type="button" class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="sidebarMenu">
                    <i class='bx bx-menu'></i>
                </button>
            </div>

            <div class="sidebar-menu" id="sidebarMenu">
                <!-- <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Looking for something? I might have it, haha">
                </div> -->

                <nav class="side-nav">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                        <i class='bx bx-home'></i> Home
                    </a>
                    <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">
                        <i class='bx bx-user'></i> About Me
                    </a>
                    <details class="side-nav-group {{ request()->is('projects*') ? 'is-active' : '' }}" @if (request()->is('projects*')) open @endif>
                        <summary>
                            <span><i class='bx bx-sun'></i> All Projects</span>
                            <i class='bx bx-chevron-down chevron'></i>
                        </summary>
                        <div class="side-nav-sub">
                            <a href="/projects/coding-mentor" class="{{ request()->is('projects/coding-mentor') ? 'active' : '' }}">Programming Teacher</a>
                            <a href="/projects/ios-developer" class="{{ request()->is('projects/ios-developer') ? 'active' : '' }}">iOS Developer</a>
                            <a href="/projects/web-developer" class="{{ request()->is('projects/web-developer') ? 'active' : '' }}">Web Developer</a>
                            <a href="/projects/curriculum-maker" class="{{ request()->is('projects/curriculum-maker') ? 'active' : '' }}">Curriculum Maker</a>
                        </div>
                    </details>
                </nav>

                <div class="sidebar-footer">
                    <h4>Contact Me</h4>
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/in/nadila-rizky/" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        <a href="https://instagram.com/nadilaarizky_" target="_blank"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-medium'></i></a>
                        <a href="https://github.com/nadilarizky05/" target="_blank"><i class='bx bxl-github'></i></a>
                    </div>
                    <p class="copyright">Copyright @2026 by Dila</p>
                </div>
            </div>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}?v={{ filemtime(public_path('js/script.js')) }}"></script>
</body>
</html>