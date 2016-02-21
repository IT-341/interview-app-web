$(document).ready(function() {
    $('#tableQuestions').DataTable({
        responsive: true
    });

    $('#tableQuestions tbody').on('click', 'tr', function () {
        window.location = $(this).data('href');
    });
});