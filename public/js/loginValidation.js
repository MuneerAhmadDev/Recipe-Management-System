import { validateEmail } from "./validateEmail.js";
import { generateErrorMessage } from "./generateErrorMessage.js";
import { removeErrorMessage } from "./removeErrorMessage.js";

const userEmail = document.getElementById('userEmail');
const userPassword = document.getElementById('userPassword');
const emailErrorMessage = document.getElementById('email-error');
const passwordErrorMessage = document.getElementById('password-error');

userEmail.addEventListener('change', () => {
    if (userEmail.value === '') {
        generateErrorMessage(userEmail, emailErrorMessage, 'Email Address is required');
    } else if (!validateEmail(userEmail.value)) {
        generateErrorMessage(userEmail, emailErrorMessage, 'Email Address is not correct');
    } else {
        removeErrorMessage(userEmail, emailErrorMessage);
    }
});

userPassword.addEventListener('change', () => {
    if (userPassword.value === '') {
        generateErrorMessage(userPassword, passwordErrorMessage, 'Password is required');
    } else if (userPassword.value.length < 8) {
        generateErrorMessage(userPassword, passwordErrorMessage, 'The password field must be at least 8 characters.');
    } else {
        removeErrorMessage(userPassword, passwordErrorMessage);
    }
});
