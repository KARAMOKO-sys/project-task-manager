document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const fullNameInput = document.getElementById("full_name");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");

    form.addEventListener("submit", function(event) {
        // Effacer les messages d'erreur précédents
        clearErrors();

        let isValid = true;

        // Validation du nom complet
        if (fullNameInput.value.trim() === "") {
            showError(fullNameInput, "Full name is required.");
            isValid = false;
        }

        // Validation de l'email
        if (emailInput.value.trim() === "") {
            showError(emailInput, "Email is required.");
            isValid = false;
        } else if (!isValidEmail(emailInput.value.trim())) {
            showError(emailInput, "Please enter a valid email address.");
            isValid = false;
        }

        // Validation du mot de passe
        if (passwordInput.value.trim() === "") {
            showError(passwordInput, "Password is required.");
            isValid = false;
        }

        // Validation de la confirmation du mot de passe
        if (confirmPasswordInput.value.trim() === "") {
            showError(confirmPasswordInput, "Confirm password is required.");
            isValid = false;
        } else if (passwordInput.value.trim() !== confirmPasswordInput.value.trim()) {
            showError(confirmPasswordInput, "Passwords do not match.");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Empêcher la soumission du formulaire
        }
    });

    function clearErrors() {
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function(error) {
            error.remove();
        });
    }

    function showError(input, message) {
        const error = document.createElement("div");
        error.className = "error-message text-danger";
        error.innerText = message;
        input.parentNode.appendChild(error);
    }

    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
