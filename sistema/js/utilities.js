$(function () {
  $("a.page-scroll").bind("click", function (event) {
    var $anchor = $(this)
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top,
        },
        1500,
        "easeInOutExpo"
      )
    event.preventDefault()
  })
})

// Highlight the top nav as scrolling occurs
$("body").scrollspy({
  target: ".navbar-fixed-top",
})

// Closes the Responsive Menu on Menu Item Click
$(".navbar-collapse ul li a").click(function () {
  $(".navbar-toggle:visible").click()
})

//buscar todos los elementos que contengan la clase modal
function buscarModal(elemento) {
  var modal = document.getElementsByClassName("modal")
  nameElement = elemento.id + "Modal"
  for (var i = 0; i < modal.length; i++) {
    if (
      modal[i].id == nameElement ||
      modal[i].id == "changePhotoS" ||
      modal[i].id == "changePhoto" ||
      modal[i].id == "updateProfile" ||
      modal[i].id == "updateProfileS"
    ) {
      //console.log(modal[i].id)
    } else {
      modal[i].remove()
    }
  }
}

const capitalize = (string) => {
  return string.charAt(0).toUpperCase() + string.slice(1)
}

function genPDF(name, container, hidden = false) {
  const { jsPDF } = window.jspdf
  var scaleBy = 1
  let contenedor = document.getElementById(container)
  if (hidden) {
      contenedor.style.display = "block"
  }
  html2canvas(contenedor, {
    useCORS: true,
    onrendered: (canvas) => {
      let doc = new jsPDF("p", "mm", "a4")
      if (hidden) {
        contenedor.style.display = "none"
    }
      let a4Size = {
        w: convertPointsToUnit(595.28, "px"),
        h: convertPointsToUnit(841.89, "px"),
      }

      let canvastoPrint = document.createElement("canvas")
      let ctx = canvastoPrint.getContext("2d")
      canvastoPrint.width = a4Size.w
      canvastoPrint.height = a4Size.h
      ctx.scale(scaleBy, scaleBy)

      let aspectRatioA4 = a4Size.w / a4Size.h
      let resized = canvas.width / aspectRatioA4

      let printed = 0,
        page = 0

      while (printed < canvas.height) {
        ctx.drawImage(
          canvas,
          0,
          printed,
          canvas.width,
          resized,
          0,
          0,
          a4Size.w,
          a4Size.h
        )
        var imgtoPdf = canvastoPrint.toDataURL("image/png")
        let width = doc.internal.pageSize.getWidth() - 10
        let height = doc.internal.pageSize.getHeight()
        if (page == 0) {
          doc.addImage(imgtoPdf, "PNG", 4, 0, width, height)
        } else {
          let page = doc.addPage()
          page.addImage(imgtoPdf, "PNG", 4, 15, width, height)
        }
        ctx.clearRect(0, 0, canvastoPrint.width, canvastoPrint.height) 
        printed += resized 
        page++ 
      }
      doc.save(name + ".pdf")
    },
  })

  function convertPointsToUnit(points, unit) {
    var multiplier
    switch (unit) {
      case "pt":
        multiplier = 1
        break
      case "mm":
        multiplier = 72 / 25.4
        break
      case "cm":
        multiplier = 72 / 2.54
        break
      case "in":
        multiplier = 72
        break
      case "px":
        multiplier = 96 / 72
        break
      case "pc":
        multiplier = 12
        break
      case "em":
        multiplier = 12
        break
      case "ex":
        multiplier = 6
      default:
        throw "Invalid unit: " + unit
    }
    return points * multiplier
  }
}

genPDF2 = (name, container) => {
  const { jsPDF } = window.jspdf

  var pdf = new jsPDF("p", "pt", [580, 630])

  html2canvas($(".page1"), {
    onrendered: function (canvas) {
      document.body.appendChild(canvas)
      var ctx = canvas.getContext("2d")
      var imgData = canvas.toDataURL("image/png", 1.0)
      var width = canvas.width
      var height = canvas.clientHeight
      pdf.addImage(imgData, "PNG", 20, 20, width - 10, height)
    },
  })
  html2canvas($(".page2"), {
    allowTaint: true,
    onrendered: function (canvas) {
      var ctx = canvas.getContext("2d")
      var imgData = canvas.toDataURL("image/png", 1.0)
      var htmlH = $(".page2").height() + 100
      var width = canvas.width
      var height = canvas.clientHeight
      pdf.addPage(580, htmlH)
      pdf.addImage(imgData, "PNG", 20, 20, width - 40, height)
    },
  })
  setTimeout(function () {
    //jsPDF code to save file
    pdf.save(name + ".pdf")
  }, 0)
}
