 // Ensure that the theme remains the same on page reload
let lightMode = localStorage.getItem('lightMode') === 'true';
document.documentElement.style.setProperty('--background', lightMode ? '#E2E2E2' : '#333');
document.documentElement.style.setProperty('--red', lightMode ? '#F23D4C' : '#F3616D');
document.body.style.color = lightMode ? '#333' : '#E2E2E2';
document.documentElement.style.setProperty('--black', lightMode ? '#000' : '#fff');

// Ensure that the text style remains the same on page reload
let italicHeadings = localStorage.getItem('italicHeadings') === 'true';
let redHeadings = localStorage.getItem('redHeadings') === 'true';
if (italicHeadings && redHeadings) {
    changeTextStyle();
}

// Function to toggle the Background color between light and dark mode
function toggleBackground() {
    lightMode = !lightMode;
    document.documentElement.style.setProperty('--background', lightMode ? '#E2E2E2' : '#333');
    document.documentElement.style.setProperty('--red', lightMode ? '#F23D4C' : '#F3616D');
    document.body.style.color = lightMode ? '#333' : '#E2E2E2';
    document.documentElement.style.setProperty('--black', lightMode ? '#000' : '#fff');

    // Save the updated theme state to localStorage
    localStorage.setItem('lightMode', lightMode);
}

// Function to toggle the About us section details with an animation
function toggleDetails() {
    const details = document.querySelector('.about-details');
    const button = document.getElementById('toggleDetailsBtn');
    
    if (details.classList.contains('open')) {
        details.classList.remove('open');
        button.textContent = 'Show Details';
        // Use a timeout to hide the element after the transition
        setTimeout(function timeout() {
            if (!details.classList.contains('open')) {
                details.style.display = 'none';
            }
        }, 500);
    } else {
        details.style.display = 'block';
        setTimeout(function timeout() { details.classList.add('open')}, 0);
        button.textContent = 'Hide Details';
    }
}

// Initially hide the details
document.addEventListener('DOMContentLoaded', () => {
    const details = document.querySelector('.about-details');
    details.style.display = 'block';
});

// Function to change text style of all headings throughout the document
function changeTextStyle() {
    const headings = document.querySelectorAll('.color-change');
    headings.forEach(function (heading) {
        heading.style.fontStyle = 'italic';
        heading.style.color = 'var(--light_green)';
    });
    // Save in the localStorage to ensure the style remains the same on page reload
    localStorage.setItem('italicHeadings', 'true');
    localStorage.setItem('redHeadings', 'true');
}

// Function to reset the text style of all headings throughout the document
function resetTextStyle() {
    const headings = document.querySelectorAll('.color-change');
    headings.forEach(function (heading) {
        heading.style.fontStyle = 'normal';
        heading.style.color = 'var(--white)';
    });
    // Save in the localStorage to ensure the style remains the same on page reload
    localStorage.setItem('italicHeadings', 'false');
    localStorage.setItem('redHeadings', 'false');
}

function validateEmail(email) {
    // Regular expression to validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Test the email against the regex and return true or false
    return emailRegex.test(email);
}



function validateForm() {
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const phoneField = document.getElementById('phone');

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(msg => msg.remove());

    let isValid = true; // Track overall form validity

    // Validate name field
    if (nameField.value.trim() === '') {
        displayError(nameField, "Please enter a name");
        isValid = false;
    }

    // Validate email field
    if (!validateEmail(emailField.value.trim())) {
        displayError(emailField, "Please enter a valid email");
        isValid = false;
    }

    // Validate phone field: only digits
    const phoneRegex = /^\d+$/;
    if (!phoneRegex.test(phoneField.value.trim())) {
        displayError(phoneField, "Please enter a valid phone number (digits only)");
        isValid = false;
    }

    return isValid;
}

// Function to display error messages
function displayError(inputField, message) {
    const errorSpan = document.createElement('span');
    errorSpan.className = 'error-message';
    errorSpan.style.color = 'red';
    errorSpan.style.fontSize = 'small';
    errorSpan.textContent = message;
    errorSpan.style.color = '#6B0811';
    errorSpan.style.fontWeight ='bold';

    // Append the error message after the input field
    inputField.insertAdjacentElement('afterend', errorSpan);
}

// Attach validateForm to form submission
document.getElementById('contact-form').onsubmit = function (event) {
    event.preventDefault(); // Stop form submission if validation fails
    if (validateForm()) {
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const phoneField = document.getElementById('phone');
        const messageField = document.getElementById('message');

        nameField.value = '';
        emailField.value = '';
        phoneField.value = '';
        messageField.value = '';

        alert('Form submitted Successfully');
    } 
};
