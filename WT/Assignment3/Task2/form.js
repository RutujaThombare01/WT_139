document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.registration-form');

    form.addEventListener('submit', function (event) {
        let isValid = true;

        // Get form elements
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const mobile = document.getElementById('mobile');
        const mobileError = document.getElementById("mobile-error");

        // Clear previous error messages
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(error => error.remove());

        // Validate username (Only letters and spaces)
        const usernamePattern = /^[A-Za-z\s]+$/;
        if (username.value.trim() === "") {
            isValid = false;
            displayError(username, "Username is required.");
        } else if (!usernamePattern.test(username.value.trim())) {
            isValid = false;
            displayError(username, "Username should only contain letters and spaces.");
        }

        // Validate email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email.value.trim() === "" || !emailPattern.test(email.value)) {
            isValid = false;
            displayError(email, "Please enter a valid email address.");
        }

        // Validate mobile number (10 digits only)
        const mobilePattern = /^[0-9]{10}$/;
        if (!mobilePattern.test(mobile.value)) {
            isValid = false;
            mobileError.textContent = "Please enter a valid 10-digit mobile number.";
        } else {
            mobileError.textContent = "";
        }

        // If all validations pass, allow form submission
        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Function to display error messages
    function displayError(inputElement, message) {
        const errorMessage = document.createElement('span');
        errorMessage.classList.add('error-message');
        errorMessage.style.color = 'red';
        errorMessage.textContent = message;
        inputElement.parentElement.appendChild(errorMessage);
    }
});
