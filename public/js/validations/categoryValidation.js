import { generateErrorMessage } from "../errors/generateErrorMessage.js"
import { removeErrorMessage } from "../errors/removeErrorMessage.js";
import { isImage } from "./fileValidations/isImage.js";
import { maxSize } from "./fileValidations/maxSize.js";

const categoryPicture = document.getElementById('category_picture');
const categoryName = document.getElementById('category_name');
const categoryPictureError = document.getElementById('category_picture_error');
const categoryNameError = document.getElementById('category_name_error');

categoryName.addEventListener('change', () => {
    if (categoryName.value === '')
        generateErrorMessage(categoryNameError, categoryNameError, 'The Category name field is required.');
    else if (categoryName.value.length < 4)
        generateErrorMessage(categoryName, categoryNameError, 'The Category name field must be at least 4 characters.');
    else
        removeErrorMessage(categoryName, categoryNameError);
});

categoryPicture.addEventListener('change', () => {
    let file = categoryPicture.files[0];
    if (!isImage(file))
        generateErrorMessage(categoryPicture, categoryPictureError, 'Please select a valid image file.');
    else if (!maxSize(file, 2 * 1024 * 1024))
        generateErrorMessage(categoryPicture, categoryPictureError, 'Maximum file size allowed is 2 MB.');
    else
        removeErrorMessage(categoryPicture, categoryPictureError);
});
