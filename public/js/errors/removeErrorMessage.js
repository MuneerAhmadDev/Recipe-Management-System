export const removeErrorMessage = (field, targetErrorContainer) => {
    field.classList.remove('is-invalid');
    targetErrorContainer.classList.remove('text-danger');
    targetErrorContainer.classList.remove('mt-1');
    targetErrorContainer.innerText = '';
}
