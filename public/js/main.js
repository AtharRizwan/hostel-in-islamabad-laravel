// Site-wide behaviour. Saved page styles are applied on load by theme.js in the <head>

// Function to toggle the Background color between light and dark mode
function toggleBackground() {
    const root = document.documentElement;
    const switchToLight = root.dataset.theme === 'dark';
    if (switchToLight) {
        delete root.dataset.theme;
    } else {
        root.dataset.theme = 'dark';
    }

    // Save the updated theme state to localStorage
    localStorage.setItem('lightMode', switchToLight);
}

// Function to change text style of all headings throughout the document
function changeTextStyle() {
    document.documentElement.classList.add('styled-headings');
    // Save in the localStorage to ensure the style remains the same on page reload
    localStorage.setItem('italicHeadings', 'true');
}

// Function to reset the text style of all headings throughout the document
function resetTextStyle() {
    document.documentElement.classList.remove('styled-headings');
    // Save in the localStorage to ensure the style remains the same on page reload
    localStorage.setItem('italicHeadings', 'false');
}

// Mobile menu: the hamburger button opens and closes the navigation panel
const siteHeader = document.querySelector('.site-header');
const navToggle = document.querySelector('.nav-toggle');

function setMenuOpen(open) {
    siteHeader.classList.toggle('nav-open', open);
    navToggle.setAttribute('aria-expanded', open);
}

navToggle.addEventListener('click', () => setMenuOpen(!siteHeader.classList.contains('nav-open')));
document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
        setMenuOpen(false);
    }
});
siteHeader.querySelectorAll('.site-nav a').forEach(link => link.addEventListener('click', () => setMenuOpen(false)));
