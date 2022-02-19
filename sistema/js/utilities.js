$(function () {
  $("a.page-scroll").bind("click", function (event) {
    var $anchor = $(this);
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top,
        },
        1500,
        "easeInOutExpo"
      );
    event.preventDefault();
  });
});

// Highlight the top nav as scrolling occurs
$("body").scrollspy({
  target: ".navbar-fixed-top",
});

// Closes the Responsive Menu on Menu Item Click
$(".navbar-collapse ul li a").click(function () {
  $(".navbar-toggle:visible").click();
});

//buscar todos los elementos que contengan la clase modal
function buscarModal(elemento) {
  var modal = document.getElementsByClassName("modal");
  nameElement = elemento.id + "Modal";
  for (var i = 0; i < modal.length; i++) {
    if(modal[i].id == nameElement || modal[i].id == "changePhotoS" || modal[i].id == "changePhoto" || modal[i].id == "updateProfile" || modal[i].id == "updateProfileS") {
      //console.log(modal[i].id)
    }else{
      modal[i].remove();
    } 
  }
}

const capitalize = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1)
}