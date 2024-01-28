import { generateErrorMessage } from '../../errors/generateErrorMessage.js';
import { removeErrorMessage } from '../../errors/removeErrorMessage.js';
import { successAlert } from '../../alerts/successAlert.js';

$(document).ready(function () {
    const addCuisineName = $('#cuisine_name');
    const addCuisineNameError = $('#cuisine_name_error');
    const addCuisineForm = $('#add-cuisine-form');
    const addCuisineButton = $('#add-cuisine-btn');
    let isValid = false;

    addCuisineButton.addClass('disable');
    function handleSubmitButton() {
        if (isValid)
            addCuisineButton.removeClass('disable');
        else
            addCuisineButton.addClass('disable');
    }

    // >>>>>>>>>>>>>>>>>>>> Validation <<<<<<<<<<<<<<<<<<<<
    addCuisineName.on('change', function () {
        if (addCuisineName.val() === '') {
            isValid = false;
            handleSubmitButton();
            generateErrorMessage(addCuisineName[0], addCuisineNameError[0], 'Cuisine name is required.');
        } else if (addCuisineName.val().length < 4) {
            isValid = false;
            handleSubmitButton();
            generateErrorMessage(addCuisineName[0], addCuisineNameError[0], 'Cuisine name should be at least 4 characters long.');
        } else {
            isValid = true;
            handleSubmitButton();
            removeErrorMessage(addCuisineName[0], addCuisineNameError[0]);
        }
    });

    // >>>>>>>>>>>>>>>>>>>> Ajax <<<<<<<<<<<<<<<<<<<<
    addCuisineForm.on('submit', function (e) {
        e.preventDefault();
        if (!isValid)
            return;

        const formData = new FormData(this);
        $.ajax({
            url: addCuisineForm.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status === 'success') {
                    isValid = false;
                    handleSubmitButton();
                    addCuisineForm[0].reset();
                    $('#js-alert').append(successAlert(res.message));
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});
