// About page: "Show Details" toggle and contact form validation

// Function to toggle the About us section details with an animation
function toggleDetails() {
    const details = document.querySelector('.about-details');
    const button = document.getElementById('toggleDetailsBtn');

    const open = details.classList.toggle('open');
    button.textContent = open ? 'Hide Details' : 'Show Details';
    button.setAttribute('aria-expanded', open);
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
    const messageField = document.getElementById('message');

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(msg => msg.remove());
    document.querySelectorAll('#contact-form [aria-invalid]').forEach(field => field.removeAttribute('aria-invalid'));

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

    // Validate phone field: digits, spaces and dashes, with an optional leading +
    const phoneRegex = /^\+?[\d\s-]{7,20}$/;
    if (!phoneRegex.test(phoneField.value.trim())) {
        displayError(phoneField, "Please enter a valid phone number, e.g. +92 300 1234567");
        isValid = false;
    }

    // Validate message field
    if (messageField.value.trim() === '') {
        displayError(messageField, "Please enter a message");
        isValid = false;
    }

    return isValid;
}

// Function to display error messages
function displayError(inputField, message) {
    const errorSpan = document.createElement('span');
    errorSpan.className = 'error-message';
    errorSpan.textContent = message;
    inputField.setAttribute('aria-invalid', 'true');

    // Append the error message after the input field
    inputField.insertAdjacentElement('afterend', errorSpan);
}

// Attach validateForm to form submission
const contactForm = document.getElementById('contact-form');
contactForm.onsubmit = function (event) {
    event.preventDefault(); // Stop form submission if validation fails
    if (validateForm()) {
        contactForm.reset();
        alert('Form submitted Successfully');
    }
};
