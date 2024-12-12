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

