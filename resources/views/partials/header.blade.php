<header class="site-header">
    <div class="container header-inner">
        <a href="{{ auth()->check() ? route('home') : route('login') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Hostel in Islamabad" width="465" height="148" class="logo-default">
            <img src="{{ asset('img/logo-white.png') }}" alt="Hostel in Islamabad" width="465" height="148" class="logo-dark">
        </a>
        <button type="button" class="nav-toggle" aria-expanded="false" aria-controls="site-nav">
            <span class="visually-hidden">Menu</span>
            <span class="nav-toggle-bar"></span>
        </button>
        <nav class="site-nav" id="site-nav" aria-label="Main">
            @auth
                <a href="{{ route('home') }}" @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('about') }}" @if (request()->routeIs('about')) aria-current="page" @endif>About</a>
                <a href="{{ route('services') }}" @if (request()->routeIs('services', 'service.show')) aria-current="page" @endif>Services</a>
            @endauth
            <div class="dropdown">
                <button type="button" class="dropbtn">Page Styles</button>
                <div class="dropdown-content">
                    <button type="button" onclick="toggleBackground()">Change Background Colour</button>
                    <button type="button" onclick="changeTextStyle()">Change Text Style</button>
                    <button type="button" onclick="resetTextStyle()">Reset Text Style</button>
                </div>
            </div>
            @auth
                <button type="button" class="nav-logout" onclick="document.getElementById('logout-dialog').showModal()">Log out</button>
            @else
                <a href="{{ route('login') }}" @if (request()->routeIs('login')) aria-current="page" @endif>Log in</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endauth
        </nav>
    </div>
</header>

@auth
    <!-- Logout confirmation -->
    <dialog class="logout-dialog" id="logout-dialog" aria-labelledby="logout-title">
        <h2 id="logout-title">Log out?</h2>
        <p>Are you sure you want to log out?</p>
        <div class="dialog-actions">
            <form method="dialog">
                <button type="submit" class="btn btn-outline">No</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Yes, log out</button>
            </form>
        </div>
    </dialog>
@endauth
