function checkCedula(path = "root") {
  const submit = document.getElementById("submit")
  const cad = document.getElementById("cedula").value.trim(),
    box = document.getElementById("cedula"),
    salida = document.getElementById("dni_error")
  let total = 0
  let existe = ""
  let longitud = cad.length
  let longcheck = longitud - 1
  let ruta = path == "root" ? "sistema/api/cedula.php" : "api/cedula.php"
  let inputClass =
    path == "root"
      ? "forms_field-input wd-45 solo-numeros"
      : "input solo-numeros mt--5"
  if (
    cad !== "" &&
    longitud === 10 &&
    cad !== "0000000000" &&
    cad !== "1111111111" &&
    cad !== "2222222222" &&
    cad !== "3333333333" &&
    cad !== "4444444444" &&
    cad !== "5555555555" &&
    cad !== "6666666666" &&
    cad !== "7777777777" &&
    cad !== "8888888888" &&
    cad !== "9999999999"
  ) {
    for (i = 0; i < longcheck; i++) {
      if (i % 2 === 0) {
        var aux = cad.charAt(i) * 2
        if (aux > 9) aux -= 9
        total += aux
      } else {
        total += parseInt(cad.charAt(i))
      }
    }
    total = total % 10 ? 10 - (total % 10) : 0
    if (cad.charAt(longitud - 1) == total) {
      $.ajax({
        type: "POST",
        url: ruta,
        data: { dni: cad },
        success: function (resultado) {
          existe = resultado
          if (existe === "existe") {
            salida.innerHTML = "Cedula ya Existe"
            salida.className = "help is-danger"
            box.className = inputClass + " is-danger"
            submit.disabled = true
          } else {
            salida.innerHTML = "Cedula Valida"
            salida.className = "help is-success"
            box.className = inputClass + " is-success"
            submit.disabled = false
          }
        },
        error: function (resultado) {
          console.log("Error al Buscar los Datos: " + resultado)
          salida.innerHTML = ""
        },
      })
    } else {
      salida.innerHTML = "Cedula Inválida"
      salida.className = "help is-danger"
      box.className = inputClass + " is-danger"
      submit.disabled = true
    }
  } else {
    salida.innerHTML = "La cedula debe contener 10 dígitos"
    salida.className = "help is-danger"
    box.className = inputClass + " is-danger"
    submit.disabled = true
  }
}

function checkRUC(elemento) {
  const elementruc = document.getElementById(elemento.id),
    ruc = elementruc.value,
    submit = document.getElementById("submit"),
    salida = document.getElementById("ruc_error")
  let valor,
    acu = 0
  if (ruc == "") {
    submit.disabled = true
  } else {
    for (var i = 0; i < ruc.length; i++) {
      valor = ruc.substring(i, i + 1)
      if (valor >= 0 && valor <= 9) {
        acu = acu + 1
      }
    }
    if (acu == ruc.length && ruc.length == 13) {
      if (ruc.substring(10, 13) != "001") {
        salida.innerHTML =
          "Los tres últimos dígitos no tienen el código del RUC 001."
        salida.className = "help is-danger"
        elementruc.className = "input solo-numeros mt--5 is-danger"
        submit.disabled = true
        return
      }
      if (ruc.substring(0, 2) > 24) {
        salida.innerHTML =
          "Los dos primeros dígitos no pueden ser mayores a 24."
        salida.className = "help is-danger"
        elementruc.className = "input solo-numeros mt--5 is-danger"
        submit.disabled = true
        return
      }
      var firstpart = ruc.substring(2, 3)
      if (firstpart < 6) {
        salida.innerHTML =
          "El RUC es valido y pertenece a una persona natural.\n"
      } else if (firstpart == 6) {
        salida.innerHTML =
          "El RUC es valido y pertenece a una entidad pública.\n"
      } else if (firstpart == 9) {
        salida.innerHTML =
          "El RUC es valido y pertenece a una sociedad privada.\n"
      }
      salida.className = "help is-success"
      elementruc.className = "input solo-numeros mt--5 is-success"
      submit.disabled = false
    } else {
      salida.innerHTML = "Ruc no valido"
      salida.className = "help is-danger"
      elementruc.className = "input solo-numeros mt--5 is-danger"
    }
  }
}

function checkPhone(elemento) {
  const submit = document.getElementById("submit")
  const phone = document.getElementById(elemento.id)
  if (phone.value.length == 10) {
    phone.className = "input is-success solo-numeros"
    submit.disabled = false
  } else {
    phone.className = "input is-danger solo-numeros"
    submit.disabled = true
  }
}

function checkLength(elemento, sl = true, min = 3, number = false) {
  const submit = document.getElementById("submit")
  let campo = document.getElementById(elemento.id)
  let oclass = sl ? " solo-letras" : ""
  let oclass2 = number ? " solo-numeros" : ""
  if (campo.value.length < min || campo.value.length == 0) {
    campo.className = "input is-danger" + oclass + oclass2
    submit.disabled = true
  } else {
    campo.className = "input is-success" + oclass + oclass2
    submit.disabled = false
  }
}

function checkSelect(elemento, error_msg = true) {
  const submit = document.getElementById("submit"),
    campo = document.getElementById(elemento.id),
    error_sel = document.getElementById(elemento.id + "_error")
  if (campo.value == "0" || campo.value == "") {
    campo.className = "input is-danger"
    submit.disabled = true
    if (error_msg) error_sel.innerHTML = "Seleccione una opción"
  } else {
    campo.className = "input is-success"
    submit.disabled = false
    if (error_msg) error_sel.innerHTML = "&nbsp;"
  }
}

function checkEmail(elemento, path = "root") {
  const submit = document.getElementById("submit")
  let email = document.getElementById(elemento.id)
  let error_email = document.getElementById(elemento.id + "_error")
  let ruta = path == "root" ? "sistema/api/email.php" : "api/email.php"
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
    $.ajax({
      type: "POST",
      url: ruta,
      data: { email: email.value },
      success: function (resultado) {
        if (resultado === "existe") {
          email.className = "input mt--5 is-danger"
          submit.disabled = true
          error_email.innerHTML = "El correo ya existe"
        } else {
          email.className = "input mt--5 is-success"
          submit.disabled = false
          error_email.innerHTML = "&nbsp;"
        }
      },
      error: function (resultado) {
        console.log("Error al Buscar los Datos: " + resultado)
        error_email.innerHTML = "&nbsp;"
      },
    })
  } else {
    email.className = "input mt--5 is-danger"
    submit.disabled = true
    error_email.innerHTML = "El correo no es valido"
  }
}

//////SOLO NUMERO/////// add like a class
$(document).ready(function () {
  $(".solo-numeros").keyup(function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9]/g, "")
    )
  })
})

$(document).ready(function () {
  $(".solo-precio").keyup(function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9.]/g, "")
    )
    puntos = $(this).val().split(".")
    if (puntos.length > 2) {
      $(this).val(puntos[0] + "." + puntos[1])
    }
    if(puntos[1].length > 2){
      $(this).val(puntos[0] + "." + puntos[1].substring(0,2))
    }
  })
})

//preguntar cuantos puntos hay en un string

////////////SOLO LETRA////////
$(document).ready(function () {
  $(".solo-letras").keypress(function (e) {
    $(this).val($(this).val().replace(/ /g, ""))
    //preguntar si el length es mayor que 3
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true
        break
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false
    }
  })
})

function checkForm() {
  let inputs = document.getElementsByClassName("input")
  const submit = document.getElementById("submit")
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].className.includes("danger") || inputs[i].value == "") {
      submit.disabled = true
    }
  }
}

let stateLoadSelect = {
  providers: {
    status: false,
  },
  type_amount: {
    status: false,
  },
  type_company: {
    status: false,
  },
  type_product: {
    status: false,
  },
  type_material: {
    status: false,
  },
}

function loadSelects(elemento, who, default_option = "") {
  const select = document.getElementById(elemento.id)
  if (stateLoadSelect[who].status) {
    return
  }

  $.ajax({
    type: "POST",
    url: "api/data-tables.php",
    data: { table: who },
    success: function (resultado) {
      if (resultado != false) {
        let data = JSON.parse(resultado)
        for (let i = 0; i < data.length; i++) {
          let data_array = Object.values(data[i])
          let option = document.createElement("option")
          option.value = data_array[0]
          if (who == "type_amount") {
            default_option = default_option != "" ? default_option : 1
            option.selected = data_array[0] == default_option ? true : false
            option.innerHTML =
              data_array[0] == 1
                ? data_array[1] + " (Libras)"
                : data_array[1] + " (Litros)"
          } else if (who == "providers") {
            default_option = default_option != "" ? default_option : ""
            option.selected = data_array[0] == default_option ? true : false
            option.innerHTML =
              data_array[6] + " - " + data_array[1] + " " + data_array[2]
          } else {
            default_option = default_option != "" ? default_option : ""
            option.selected = data_array[0] == default_option ? true : false
            option.innerHTML = data_array[1]
          }
          select.appendChild(option)
        }
        stateLoadSelect[who].status = true
      }
    },
    error: function (resultado) {
      let data = JSON.parse(resultado)
      console.log("Error al Buscar los Datos: " + data)
    },
  })
}
