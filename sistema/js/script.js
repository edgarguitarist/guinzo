function logout() {
  $.ajax({
    type: "POST",
    url: "components/logout.php",
    success: function (resultado) {
      $.jGrowl("CERRANDO LA SESIÓN", {
        header: "RESPUESTA",
      });

      setTimeout(function () {
        window.location.href = "../index.php?info=logout";
      }, 3000);
    },
    error: function (resultado) {
      $.jGrowl("NO SE HA PODIDO MANEJAR LA SESIÓN", {
        header: "RESPUESTA",
      });

      setTimeout(function () {
        window.location.href = "../";
      }, 3000);
    },
  });
}

function logout2() {
  $.ajax({
    type: "POST",
    url: "sistema/components/logout.php",
    success: function (resultado) {
      $.jGrowl("CERRANDO LA SESIÓN", {
        header: "RESPUESTA",
      });

      setTimeout(function () {
        window.location.href = "index.php?info=logout";
      }, 3000);
    },
    error: function (resultado) {
      $.jGrowl("NO SE HA PODIDO MANEJAR LA SESIÓN", {
        header: "RESPUESTA",
      });

      setTimeout(function () {
        window.location.href = "index.php?info=error";
      }, 3000);
    },
  });
}

soloNumeros = function (e) {
  var key = window.Event ? e.which : e.keyCode;
  return (key >= 48 && key <= 57) || key == 8;
};

soloLetras = function (e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = "8-37-39-46";

  tecla_especial = false;
  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
};

function checkCedula() {
  const submit = document.getElementById("registrarse"),
  cad = document.getElementById("cedula").value.trim(),
  salida = document.getElementById("cedula_error");
  let total = 0;
  let existe = "";
  let longitud = cad.length;
  let longcheck = longitud - 1;

  if (cad !== "" && longitud === 10 && cad !== "0000000000" && cad !== "1111111111" && cad !== "2222222222" && cad !== "3333333333" && cad !== "4444444444" && cad !== "5555555555" && cad !== "6666666666" &&  cad !== "7777777777" && cad !== "8888888888" && cad !== "9999999999"){
    for (i = 0; i < longcheck; i++) {
      if (i % 2 === 0) {
        var aux = cad.charAt(i) * 2;
        if (aux > 9) aux -= 9;
        total += aux;
      } else {
        total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
      }
    }
    total = total % 10 ? 10 - (total % 10) : 0;
    if (cad.charAt(longitud - 1) == total) {
      $.ajax({
        type: "POST",
        url: "sistema/api/cedula.php",
        data: { dni: cad },
        success: function (resultado) {
          existe = resultado;
          if (existe === "existe") {
            salida.innerHTML = "Cedula Ya Existe";
            salida.style.color = "red";
            submit.disabled = true;
          } else {
            salida.innerHTML = "Cedula Valida";
            salida.style.color = "green";
            submit.disabled = false;
          }
        },
        error: function (resultado) {
          console.log("Error al Buscar los Datos: " + resultado);
          salida.innerHTML = "" ;
        },
      });
    } else {
      salida.innerHTML = "Cedula Inválida";
      salida.style.color = "red";
      submit.disabled = false;
    }
  } else {
    salida.innerHTML = "La cedula debe contener 10 digitos";
    salida.style.color = "red";
    submit.disabled = false;
  }
}
