document.getElementsByName(fieldset).disabled=true;
function disableForm(form6){
    $('#' + form6).children(':input').attr('disabled', 'disabled');

  }
  $('#myForm :input').prop('disabled', true); 
  $('#' + form6).children(':input').attr('disabled', 'disabled');