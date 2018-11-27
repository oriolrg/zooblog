jQuery(document).ready(function ($) {
  $("#formCategoria").hide();
  $("#llistarCategoria").addClass("active");
  $("#catala").addClass("active");
  $("#formCastella").hide();
  $("#formAngles").hide();
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
  $("#llistarSeccio").click(function () {
    $("#llistarSeccio").addClass("active");
    $("#crearSeccio").removeClass("active");
    $("#llistaSeccio").show();
    $("#formSeccio").hide();
    //location.reload(true);
  });
  $("#crearSeccio").click(function () {
    $("#crearSeccio").addClass("active");
    $("#llistarSeccio").removeClass("active");
    $("#formSeccio").show();
    $("#llistaSeccio").hide();
    //location.reload(true);
  });
  $("#catala").click(function () {
    $("#catala").addClass("active");
    $("#castella").removeClass("active");
    $("#angles").removeClass("active");
    $("#formCatala").show();
    $("#formCastella").hide();
    $("#formAngles").hide();
    //location.reload(true);
  });
  $("#castella").click(function () {
    $("#catala").removeClass("active");
    $("#castella").addClass("active");
    $("#angles").removeClass("active");
    $("#formCatala").hide();
    $("#formCastella").show();
    $("#formAngles").hide();
    //location.reload(true);
  });
  $("#angles").click(function () {
    $("#catala").removeClass("active");
    $("#castella").removeClass("active");
    $("#angles").addClass("active");
    $("#formCatala").hide();
    $("#formCastella").hide();
    $("#formAngles").show();
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
  $("#LlistaItemsnaddLevel").click(function () {
    var value = $("#list").val() + "<ul><li>Text aquí</li></ul>";
    $("#list").val(value);
  });
  /**
  * Elimina  TODO
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
      var url = "/administra/"+nom+"/"+id;
      console.log(url);
      var data = dataString;
      var data = {_token:_token};
      ajax(data, tipus, url);
    }
  });
  $("#comprar").click(function () {
    var id = $(this).val();
    var nom = $(this).attr("name");
    console.log(nom);
    var dataString = 'id_restaurant=' + id;
    var r = confirm(nom+'?');
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
  * Rutes
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
  }else if(pathname.indexOf("colaboradors") > -1){
    var pathname = "colaboradors";
    menuSelec(pathname);
  }else if(pathname.indexOf("contacta") > -1){
    var pathname = "contacta";
    menuSelec(pathname);
  }else if(pathname.indexOf("apadrina") > -1) {
    var pathname = "apadrina";
    menuSelec(pathname);
  }else if(pathname.indexOf("administra") > -1) {
    var pathname = "administra";
    menuSelec(pathname);
  }
  /*
  * Menú
  */
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
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
      document.getElementById("file1").value = "";
      $('#previewing1').attr('src','noimage.png');
      $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Només s'accepten formats jpeg, jpg and png</span>");
      return false;
    }if(file.size>500000){
      document.getElementById("file1").value = "";
      $('#previewing1').attr('src','noimage.png');
      $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Màxim 500kb</span>");
      return false;
    }else{
      var reader = new FileReader();
      reader.onload = imageIsLoaded1;
      reader.readAsDataURL(this.files[0]);
    }
  });
  // Funcio de carrega de la imatge
  function imageIsLoaded1(e) {
    $("#file1").css("color","green");
    $('#image_preview1').css("display", "block");
    $('#previewing1').attr('src', e.target.result);
    $('#previewing1').attr('width', '100px');
    $('#previewing1').attr('height', '230px');
  }

    /*
  * Afegir seccio
  */
  $('#addSeccio').click(function () {
    alert("afegir");
    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
    var newNum = new Number(num + 1); // the numeric ID of the new input field being added

    // create the new element via clone(), and manipulate it's ID using newNum value
    var newElem = $('#input' + num).clone().attr('id', 'Add' + newNum);

    // manipulate the name/id values of the input inside the new element
    newElem.children(':last').attr('id', 'name' + newNum).attr('name', 'name' + newNum);

    // insert the new element after the last "duplicatable" input field
    $('#input' + num).after(newElem);

    // enable the "remove" button
    $('#btnDel').attr('disabled', false);

    // business rule: you can only add 10 names
    if (newNum == 10)
      $('#btnAdd').attr('disabled', 'disabled');
  });
   /*
  * Popup twitter
  */
  var popupSize = {
    width: 780,
    height: 550
  };

  $(document).on('click', '.social-buttons > ul > li > a', function (e) {

    var
      verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
      horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

    var popup = window.open($(this).prop('href'), 'social',
      'width=' + popupSize.width + ',height=' + popupSize.height +
      ',left=' + verticalPos + ',top=' + horisontalPos +
      ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
      popup.focus();
      e.preventDefault();
    }

  });
  $("section").each(function (index) {
    if (this.className == 'color'){
      if (index % 2 != 0){
        $(this).css("background-color", "#eee");
      }
    }
  });
  
});
  /*
  * Slider
  */
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
