function logout() {
  $.ajax({
    type: "POST",
    url: "components/logout.php",
    success: function (resultado) {
      $.jGrowl("CERRANDO LA SESIÓN", {
        header: "RESPUESTA",
      })

      setTimeout(function () {
        window.location.href = "../index.php?info=logout"
      }, 3000)
    },
    error: function (resultado) {
      $.jGrowl("NO SE HA PODIDO MANEJAR LA SESIÓN", {
        header: "RESPUESTA",
      })

      setTimeout(function () {
        window.location.href = "../"
      }, 3000)
    },
  })
}

function logout2() {
  $.ajax({
    type: "POST",
    url: "sistema/components/logout.php",
    success: function (resultado) {
      $.jGrowl("CERRANDO LA SESIÓN", {
        header: "RESPUESTA",
      })

      setTimeout(function () {
        window.location.href = "index.php?info=logout"
      }, 3000)
    },
    error: function (resultado) {
      $.jGrowl("NO SE HA PODIDO MANEJAR LA SESIÓN", {
        header: "RESPUESTA",
      })

      setTimeout(function () {
        window.location.href = "index.php?info=error"
      }, 3000)
    },
  })
}

let currentPath = window.location.href.split("?")
let previousPath = document.referrer.split("?")

localStorage.setItem("currentPath", currentPath[0])
localStorage.setItem("previousPath", previousPath[0])

function copia(valor){
  let aux = document.getElementById("prueba")
  aux.innerHTML = valor;
 }