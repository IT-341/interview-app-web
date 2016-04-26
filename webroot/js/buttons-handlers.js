$(document).ready(function() {
	$('#btnEdit').on('click', editHandler);
	$('#btnDelete').on('click', deleteHandler);
	$('#btnCancel').on('click', cancelHandler);
});

function editHandler() {
	$('.show-buttons').hide();
	$('.edit-buttons').show();
	$('.form-control, .keywords-used button').removeAttr('disabled');
}

function cancelHandler() {
	$('.show-buttons').show();
	$('.edit-buttons').hide();
	$('.form-control, .keywords-used button').attr('disabled', true);
}

function deleteHandler() {
	if (!confirm('Are you sure you want to delete?')) {
		return false;
	}

	return true;
}
