$(document).ready(function () {
    const deleteCuisineBtns = $('.delete-cuisine-btn');
    $(document).on('click', '.delete-cuisine-btn', function (e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: $(this).attr('href'),
                method: 'delete',
                success: function (res) {
                    if (res.status === 'success')
                        $('.table').load(location.href + ' .table');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
});
