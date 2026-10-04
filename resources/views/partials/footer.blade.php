<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <img src="{{ asset('img/logo-white.png') }}" alt="Hostel in Islamabad" width="465" height="148" loading="lazy">
            <p>A cozy, friendly base for students and travellers in the heart of Islamabad.</p>
        </div>
        <div>
            <h2 class="footer-title">Explore</h2>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('about') }}#contact">Contact</a></li>
            </ul>
        </div>
        <div>
            <h2 class="footer-title">Get in touch</h2>
            <ul>
                <li>Contact us: <a href="tel:+923001234567">+92&nbsp;300&nbsp;1234567</a></li>
                <li>Email: <a href="mailto:info@hostelinislamabad.com">info@hostelinislamabad.com</a></li>
                <li>Follow us: <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">Facebook</a>, <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">Instagram</a>, and <a href="https://www.x.com" target="_blank" rel="noopener noreferrer">X</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">&copy; {{ date('Y') }} Hostel in Islamabad. All rights reserved.</div>
    </div>
</footer>
