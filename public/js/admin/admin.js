$(document).ready(function() {
   $('#titol').keyup(function () {
     var titol = $(this).val()
     $("#vistaTitol").html(titol);
   });
   $('#descripcio').keyup(function () {
     var descripcio = $(this).val()
     $("#vistaDescripcio").html(descripcio);
   });
   $('#ico').keyup(function () {
     var ico = $(this).val()
     $("#vistaIco").removeClass();
     $("#vistaIco").addClass(ico);
   });
 });
