// Apply saved page styles before the first paint so the page doesn't flash
if (localStorage.getItem('lightMode') === 'false') {
    document.documentElement.dataset.theme = 'dark';
}
if (localStorage.getItem('italicHeadings') === 'true') {
    document.documentElement.classList.add('styled-headings');
}
