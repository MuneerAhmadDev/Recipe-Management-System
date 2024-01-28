import { successAlert } from '../../alerts/successAlert.js';

$(document).ready(function (e) {
    const updateCuisineForm = $('#update-cuisine-form');
    updateCuisineForm.on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: updateCuisineForm.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status === 'success') {
                    $('#js-alert').append(successAlert(res.message));
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});
