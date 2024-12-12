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
    <div class="auth-links">
        @auth
            <a href="#" onclick="showLogoutModal()">Logout</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</header>

<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="modal" style="display: none;">
    <div class="modal-content">
        <p>Are you sure you want to log out?</p>
        <button onclick="confirmLogout()">Yes</button>
        <button onclick="hideLogoutModal()">No</button>
    </div>
</div>

<!-- Modal CSS -->
<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .modal-content button {
        margin: 10px;
        padding: 10px 20px;
        cursor: pointer;
    }
</style>

<!-- Modal JavaScript -->
<script>
    function showLogoutModal() {
        document.getElementById('logoutModal').style.display = 'flex';
    }

    function hideLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }
async function confirmLogout() {
    hideLogoutModal();
    try {
        const response = await fetch("{{ route('logout') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        });

        window.location.href = "{{ route('login') }}"; // Redirect to login

        alert("Successfully Logged out");
    } catch (error) {
        console.error("Logout error:", error);
        alert("An error occurred. Please try again.");
    }
}
</script>
