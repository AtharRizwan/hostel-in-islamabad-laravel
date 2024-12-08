<header class="navbar">
    <img src="{{ asset('img/logo.png') }}" alt="Hostel in Islamabad">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('services') }}">Services</a>
    <div class="dropdown">
        <button class="dropbtn">Page Styles</button>
        <div class="dropdown-content">
            <button onclick="toggleBackground()">Change Background Colour</button>
            <button onclick="changeTextStyle()">Change Text Style</button>
            <button onclick="resetTextStyle()">Reset Text Style</button>
        </div>
    </div>
</header>   