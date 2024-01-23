import { validateEmail } from "./emailValidations/validateEmail.js";
import { generateErrorMessage } from "../errors/generateErrorMessage.js";
import { removeErrorMessage } from "../errors/removeErrorMessage.js";

const userName = document.getElementById('userName');
const userEmail = document.getElementById('userEmail');
const userPassword = document.getElementById('userPassword');
const userPasswordConfirmation = document.getElementById('confirmPassword');
const userNameErrorMessage = document.getElementById('name-error');
const userEmailErroMessage = document.getElementById('email-error');
const userPasswordErrorMessage = document.getElementById('user-password-error');
const userPasswordConfirmationErrorMessage = document.getElementById('user-password-confirmation-error');

userName.addEventListener('change', () => {
    if (userName.value === '') {
        generateErrorMessage(userName, userNameErrorMessage, 'The name field is required.');
    } else if (userName.value.length < 4) {
        generateErrorMessage(userName, userNameErrorMessage, 'The name field must be at least 4 characters.');
    } else {
        removeErrorMessage(userName, userNameErrorMessage);
        nameStatus = true;
    }
});

userEmail.addEventListener('change', () => {
    if (userEmail.value === '') {
        generateErrorMessage(userEmail, userEmailErroMessage, 'The email field is required.');
    } else if (!validateEmail(userEmail.value)) {
        generateErrorMessage(userEmail, userEmailErroMessage, 'The email is incorrect.');
    } else {
        removeErrorMessage(userEmail, userEmailErroMessage);
        emailStatus = true;
    }
});

userPassword.addEventListener('change', () => {
    if (userPassword.value === '') {
        generateErrorMessage(userPassword, userPasswordErrorMessage, 'The password field is required.');
    } else if (userPassword.value.length < 8) {
        generateErrorMessage(userPassword, userPasswordErrorMessage, 'The password field must be at least 8 characters.');
    } else {
        removeErrorMessage(userPassword, userPasswordErrorMessage);
        passStatus = true;
    }
});

userPasswordConfirmation.addEventListener('change', () => {
    if (userPasswordConfirmation.value === '') {
        generateErrorMessage(userPasswordConfirmation, userPasswordConfirmationErrorMessage, 'Please confirm password.');
    } else if (userPasswordConfirmation.value.length < 8) {
        generateErrorMessage(userPasswordConfirmation, userPasswordConfirmationErrorMessage, 'The password field must be at least 8 characters.');
    } else if (userPasswordConfirmation.value !== userPassword.value) {
        generateErrorMessage(userPasswordConfirmation, userPasswordConfirmationErrorMessage, 'Password confirmation not match.');
    } else {
        removeErrorMessage(userPasswordConfirmation, userPasswordConfirmationErrorMessage);
        confirmPassStatus = true;
    }
});
