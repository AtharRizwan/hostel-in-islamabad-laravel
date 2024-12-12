<header class="navbar">
    <img src="{{ asset('img/logo.png') }}" alt="Hostel in Islamabad">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('services') }}">Services</a>
    <div class="button">
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