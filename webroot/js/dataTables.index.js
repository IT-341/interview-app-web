$(document).ready(function() {
    $('#dataTable').DataTable({
        responsive: true
    });

    $('#dataTable tbody').on('click', 'tr', function () {
        window.location = $(this).data('href');
    });
});