$(document).ready(function(){
    $("#ccontrasena").keyup(function(){
      comprobar();
    });
    $("#contrasena").keyup(function(){
      comprobar();
    });
    function comprobar() {
      if ($("#contrasena").val() == $("#ccontrasena").val() != "") {
        $("#submit").prop('disabled', false);
        $("#aviso").hide();
      } else {
        $("#submit").prop('disabled', true);
        $("#aviso").show();
      }
    }
  });