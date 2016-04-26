$(function() {
  var source = null;

  $.get('/keywords/get', function(data) {
    source = data;

    $('#keywords').autocomplete({
      source: source,
      select: selectHandler,
      close: closeHandler,
      delay: 100,
      minLength: 0
    });
  }, 'json');

  $('.keywords-used button').on('click', removeKeyword);
});

function selectHandler(event, ui) {
  var button  = "<button type='button' class='btn btn-info btn-xs'>";
      button += ui.item.value + " <i class='fa fa-times'></i>";
      button += "<input type='hidden' name='keywords[]' value='" + ui.item.id + "'>";
      button += "</button>&nbsp;";
  $('.keywords-used').append(button);

  $('.keywords-used button').last().on('click', removeKeyword);
}

function closeHandler(event, ui) {
  // only clear the input if one of the options is chosen
  if (event.toElement || event.which === 13) {
    $(event.target).val([]);
  }
}

function removeKeyword(e) {
  if (confirm('Are you sure you want to delete?')) {
    $(e.currentTarget).remove();
  }
}
