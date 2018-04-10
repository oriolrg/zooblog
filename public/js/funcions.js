jQuery(document).ready(function ($) {
  $("#formCategoria").hide();  
  $("#llistarCategoria").addClass("active");
  $("#llistarCategoria").click(function () {
    $("#llistarCategoria").addClass("active");
    $("#crearCategoria").removeClass("active");
    $("#llistaCategoria").show();
    $("#formCategoria").hide();
      //location.reload(true);
  });
   $("#crearCategoria").click(function () {
    $("#crearCategoria").addClass("active");
    $("#llistarCategoria").removeClass("active");
    $("#formCategoria").show();
    $("#llistaCategoria").hide();
      //location.reload(true);
  });
  /**
  * Elimina restaurant
  */
  $("#eliminar button").click(function () {
    var id = $(this).val();
    var dataString = 'id_restaurant='+id;
    var r = confirm('Estas segur que vols eliminar-lo?');
    if (r == true) {
      var _token = $("input[name='_token']").val();
      var tipus = 'DELETE';
      var url = "/administra/categoria/"+id;
      var data = dataString;
      var data = {_token:_token}
      ajax(data, tipus, url);
    }
  });
    /**
  * Elimina restaurant
  */
  $("#eliminar button").click(function () {
    var id = $(this).val();
    var dataString = 'id_restaurant='+id;
    //var r = confirm('Estas segur que vols eliminar-lo?');
    if (r == true) {
      var _token = $("input[name='_token']").val();
      var tipus = 'DELETE';
      var url = "/administra/categoria/"+id;
      var data = dataString;
      var data = {_token:_token}
      ajax(data, tipus, url);
    }
  });
  /**
     * Executa ajax amb les dades passades
     */
    function ajax(data, tipus, url){
        $.ajax({
            url: url,
            type: tipus,
            data: data,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    location.reload(true);
                }else{
                    console.log(data.error);
                }
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                    console.log(msg);
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                    console.log(msg);
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                    console.log(msg);
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                    console.log(msg);
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                    console.log(msg);
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                    console.log(msg);
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    console.log(msg);
                }
            }
        });
    }
});