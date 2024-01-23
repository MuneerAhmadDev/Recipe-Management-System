export const generateErrorMessage = (field, targetErrorContainer, errorMessage) => {
    field.classList.add('is-invalid');
    targetErrorContainer.classList.add('text-danger');
    targetErrorContainer.classList.add('mt-1');
    targetErrorContainer.innerText = errorMessage;

    return targetErrorContainer;
}
