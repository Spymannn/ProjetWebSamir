$(document).ready(function() {
//cacher ou afficher une div  
  $('#cacher').click(function(){
    $('#apropos').toggle();
    if($('#apropos').is(':visible')){
        $(this).val('Cacher');
    }
    else {
        $(this).val('Afficher');
    }
  });
  });