export const successAlert = (message) => {
    const alertDiv = document.createElement('div');
    const closeButton = document.createElement('button');

    alertDiv.setAttribute('class', 'alert alert-success alert-dismissible fade show');
    alertDiv.setAttribute('role', 'alert');
    closeButton.setAttribute('class', 'btn-close');
    closeButton.setAttribute('type', 'button');
    closeButton.setAttribute('data-bs-dismiss', 'alert');

    alertDiv.append(message);
    alertDiv.append(closeButton);

    return alertDiv;
}
