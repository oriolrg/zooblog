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
  
  $("#pesaddLevel").click(function () {
    var value = $("#pes").val() + "<ul>Text aquí</ul>";
    $("#pes").val(value);
  });
  $("#midaaddLevel").click(function () {
    var value = $("#mida").val() + "<ul>Text aquí</ul>";
    $("#mida").val(value);
  });
  $("#vidaaddLevel").click(function () {
    var value = $("#vida").val() + "<ul>Text aquí</ul>";
    $("#vida").val(value);
  });
  $("#dietaaddLevel").click(function () {
    var value = $("#dieta").val() + "<ul>Text aquí</ul>";
    $("#dieta").val(value);
  });
  $("#descriptionaddLevel").click(function () {
    var value = $("#description").val() + "<ul><li>Text aquí</li></ul>";
    $("#description").val(value);
  });
  
  /**
  * Elimina restaurant

  $("#eliminar button").click(function () {
    var id = $(this).val();
    var dataString = 'id_restaurant='+id;
    var r = confirm('Estas segur que vols eliminar-lo?');
    if (r == true) {
      var _token = $("input[name='_token']").val();
      var tipus = 'DELETE';
      var url = "/administra/familia/"+id;
      var data = dataString;
      var data = {_token:_token}
      ajax(data, tipus, url);
    }
  });*/
    /**
  * Elimina restaurant
  */
  $("#eliminar button").click(function () {
    var id = $(this).val();
    var nom = $(this).attr("name");
    console.log(nom);
    var dataString = 'id_restaurant='+id;
    var r = confirm('Estas segur que vols eliminar-lo?');
    if (r == true) {
      var _token = $("input[name='_token']").val();
      var tipus = 'DELETE';
      var url = "/public/ZooBlog/administra/"+nom+"/"+id;
      console.log(url);
      var data = dataString;
      var data = {_token:_token};
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

    /*
    * Menú
    */

    var pathname = window.location.pathname;
    if(pathname.indexOf("especie") > -1){
      var pathname = "especie";
      menuSelec(pathname);
    }
    if(pathname.indexOf("/especie/") > -1){
      var pathname = "especie";
      submenuSelec(pathname);
    }else if(pathname.indexOf("familia") > -1){
      var pathname = "familia";
      menuSelec(pathname);
    }else if(pathname.indexOf("quisom") > -1){
      var pathname = "quisom";
      menuSelec(pathname);
    }else if(pathname.indexOf("colaboradors") > -1){
      var pathname = "colaboradors";
      menuSelec(pathname);
    }else if(pathname.indexOf("contacta") > -1){
      var pathname = "contacta";
      menuSelec(pathname);
    }
    function menuSelec(pathname){
      $(".menu").removeClass("active");
      $("."+pathname).addClass("active");
    }
    function submenuSelec(pathname){
      alert(pathname);
      $('.menu-content .collapse').on("show.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
      });
      //alert();
      $(".smenu-content .collapse").on("hide.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
      });
      if(pathname=="especie"){
        $('.sub-menu').removeClass("collapse");
      }
    }



     // Funcio de previsualització de la imatge

        $("#file1").change(function() {

            $("#message1").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing1').attr('src','noimage.png');
                $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Només s'accepten formats jpeg, jpg and png</span>");

                return false;
            }if(file.size>500000){
              $('#previewing1').attr('src','noimage.png');
              $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Màxim 50kb</span>");
              return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded1;
                reader.readAsDataURL(this.files[0]);
            }
        });


    function imageIsLoaded1(e) {
        $("#file1").css("color","green");
        $('#image_preview1').css("display", "block");
        $('#previewing1').attr('src', e.target.result);
        $('#previewing1').attr('width', '250px');
        $('#previewing1').attr('height', '230px');
    }

});
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = x.length }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " w3-opacity-off";
}