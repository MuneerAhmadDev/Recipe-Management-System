export const isImage = (file) => {
    const validImageTypes = [
        'image/jpeg',
        'image/jpg',
        'image/png'
    ];
    return validImageTypes.includes(file.type);
}
