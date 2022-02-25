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

function makePDF(name, container) {
  var quotes = document.getElementById(container)
  html2canvas(quotes).then((canvas) => {
    //! MAKE YOUR PDF
    var pdf = new jsPDF("p", "pt", "letter")

    for (var i = 0; i <= quotes.clientHeight / 980; i++) {
      //! This is all just html2canvas stuff
      var srcImg = canvas
      var sX = 0
      var sY = 980 * i // start 980 pixels down for every new page
      var sWidth = 900
      var sHeight = 980
      var dX = 0
      var dY = 0
      var dWidth = 900
      var dHeight = 980

      window.onePageCanvas = document.createElement("canvas")
      onePageCanvas.setAttribute("width", 900)
      onePageCanvas.setAttribute("height", 980)
      var ctx = onePageCanvas.getContext("2d")
      // details on this usage of this function:
      // https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API/Tutorial/Using_images#Slicing
      ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight)

      // document.body.appendChild(canvas);
      var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0)

      var width = onePageCanvas.width
      var height = onePageCanvas.clientHeight

      //! If we're on anything other than the first page,
      // add another page
      if (i > 0) {
        pdf.addPage(612, 791) //8.5" x 11" in pts (in*72)
      }
      //! now we declare that we're working on that page
      pdf.setPage(i + 1)
      //! now we add content to that page!
      pdf.addImage(canvasDataURL, "PNG", 20, 40, width * 0.62, height * 0.62)
    }
    //! after the for loop is finished running, we save the pdf.
    pdf.save(name +".pdf")
  })
}

function genPDF(name, container) {
  const { jsPDF } = window.jspdf
  var scaleBy = 1
  html2canvas(document.getElementById(container), {
    useCORS: true,
    onrendered: (canvas) => {
      let doc = new jsPDF("p", "mm", "a4")

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
          page = doc.addPage()
          page.addImage(imgtoPdf, "PNG", 4, 2, width, height)
        }
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
