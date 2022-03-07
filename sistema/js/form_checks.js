function checkCedula(path = "root", elemento) {
  const submit = document.getElementById("submit")
  const cad = document.getElementById(elemento.id).value.trim(),
    box = document.getElementById(elemento.id),
    salida = document.getElementById(elemento.id + "_error")
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
    if (inputs[i].className.includes("is-danger") || inputs[i].value == "") {
      submit.disabled = true
    }
    console.log(inputs[i])
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
  users: {
    status: false,
  },
  type_event: {
    status: false,
  },
  type_menu: {
    status: false,
  },
}

function loadSelects(elemento, who, default_option = "", condition = "") {
  const select = document.getElementById(elemento.id)
  if (stateLoadSelect[who].status) {
    return
  }

  $.ajax({
    type: "POST",
    url: "api/data-tables.php",
    data: { table: who, conditions: condition },
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
          } else if (who == "users") {
            option.innerHTML = data_array[1] + " " + data_array[2]
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
      stateLoadSelect[who].status = false
      let data = JSON.parse(resultado)
      console.log("Error al Buscar los Datos: " + data)
    },
  })
}

const togglePassword = (elemento) => {
  let input = document.getElementById(elemento)
  let anchor = document.getElementById("togglePassword")
  let eye = document.getElementById("eye")
  let eye2 = document.getElementById("eye2")
  if (input.type == "password") {
    input.type = "text"
    anchor.title = "Ocultar Contraseña"
    eye.style.display = "none"
    eye2.style.display = "block"
  } else {
    input.type = "password"
    anchor.title = "Mostrar Contraseña"
    eye.style.display = "block"
    eye2.style.display = "none"
  }
}

let prices = {
  event_type: {
    1: {
      price: 50,
    },
    2: {
      price: 200,
    },
    3: {
      price: 150,
    },
    4: {
      price: 100,
    },
    5: {
      price: 250,
    },
    "": {
      price: 0,
    },
  },
  employees: {
    captains: {
      price: 50,
    },
    chefs: {
      price: 35,
    },
    waitress: {
      price: 30,
    },
    stewards: {
      price: 25,
    },
    others: {
      price: 25,
    },
  },
  menus: {
    entrances: {
      price: 3,
    },
    principals: {
      price: 5,
    },
    desserts: {
      price: 3,
    },
    othermenus: {
      price: 3,
    },
  },
  products: {
    meats: {
      price: 5,
    },
    fruitsveges: {
      price: 2,
    },
    drinks: {
      price: 3,
    },
    otherproducts: {
      price: 5,
    },
  },
  materials: {
    kitchen: {
      price: 2,
    },
    cuberteria: {
      price: 2,
    },
    bar: {
      price: 2,
    },
    decoration: {
      price: 2,
    },
    othermaterials: {
      price: 2,
    },
  },
  providers: {
    transporte: {},
    buffet: {},
    otherproviders: {},
  },
}

let statePrecio = {
  actual: {
    price: 0,
  },
  lastprice: {
    price: 0,
  },
}

const calculatePrice = () => {
  let type_event = document.getElementById("tipo_evento").value // select
  let amount_guest = document.getElementById("cantidad").value

  let employee = document.getElementsByClassName("employee") // Empleados

  let menu = document.getElementsByClassName("menu") // Menus
  let amount_menu = document.getElementsByClassName("menu_amount")

  let product = document.getElementsByClassName("product") // Productos
  let amount_product = document.getElementsByClassName("product-amount")

  let material = document.getElementsByClassName("material") // Materiales
  let amount_material = document.getElementsByClassName("material-amount")

  let providers = document.getElementsByClassName("provider") // Proveedores
  let price_provider = document.getElementsByClassName("provider-price")

  let other_concepts = document.getElementsByClassName("other_concepts_price") // Otros Conceptos

  let total_final = document.getElementById("precio")
  let price_total_final = document.getElementById("price_total")
  let place = document.getElementById("place")
  let total = 0

  //numero de invitados
  total += amount_guest * 5

  //tipo de evento
  total += prices.event_type[type_event].price

  // Lugar Propio
  if (place.value == "Domicilio") {
    total += 50
  }

  // Empleados
  for (let i = 0; i < employee.length; i++) {
    let name = employee[i].name.substring(0, employee[i].name.length - 2)
    if (employee[i].checked) {
      valor = prices.employees[name].price
      total += valor
    }
  }

  // Menus
  for (let i = 0; i < menu.length; i++) {
    let name = menu[i].name.substring(0, menu[i].name.length - 2)
    if (menu[i].checked) {
      valor = prices.menus[name].price * amount_menu[i].value
      total += valor
    }
  }

  // Productos
  for (let i = 0; i < product.length; i++) {
    let name = product[i].name.substring(0, product[i].name.length - 2)
    if (product[i].checked) {
      valor = prices.products[name].price * amount_product[i].value
      total += valor
    }
  }

  // Materiales
  for (let i = 0; i < material.length; i++) {
    let name = material[i].name.substring(0, material[i].name.length - 2)
    if (material[i].checked) {
      valor = prices.materials[name].price * amount_material[i].value
      total += valor
    }
  }

  // Providers
  for (let i = 0; i < providers.length; i++) {
    if (providers[i].checked) {
      valor = parseInt(price_provider[i].value)
      total += valor
    }
  }

  // Other Concepts
  for (let i = 0; i < other_concepts.length; i++) {
    valor = parseInt(other_concepts[i].value)
    total += valor
  }

  total_final.value = total
  price_total_final.value = total
  statePrecio.actual.price = total
}

const addOtherConcepts = () => {
  let otherConcepts = document.getElementById("otherConcepts")
  let label = document.createElement("label")
  label.innerText = "Concepto: "
  let label2 = document.createElement("label")
  label2.innerText = "Descripción: "
  let label3 = document.createElement("label")
  label3.innerText = "Precio: "
  let otherConceptsInput = document.createElement("input")
  otherConceptsInput.type = "text"
  otherConceptsInput.name = "otherConcepts[]"
  otherConceptsInput.className = "input wd-60 right2-0"
  otherConceptsInput.placeholder = "Otros Conceptos"
  let otherConceptsInput2 = document.createElement("textarea")
  otherConceptsInput2.name = "otherConceptsDetail[]"
  otherConceptsInput2.className = "input wd-60 right2-0"
  otherConceptsInput2.placeholder = "Descripción"
  let otherConceptsInput3 = document.createElement("input")
  otherConceptsInput3.type = "number"
  otherConceptsInput3.name = "otherConceptsPrice[]"
  otherConceptsInput3.className = "input wd-30 right2-0 other_concepts_price"
  otherConceptsInput3.placeholder = "Precio"
  otherConceptsInput3.required = true
  let p = document.createElement("p")
  let p2 = document.createElement("p")
  let p3 = document.createElement("p")
  p2.style.marginTop = "10px"
  p3.style.marginTop = "10px"
  p.appendChild(label)
  p.appendChild(otherConceptsInput)
  p2.appendChild(label2)
  p2.appendChild(otherConceptsInput2)
  p3.appendChild(label3)
  p3.appendChild(otherConceptsInput3)
  let column = document.createElement("div")
  column.className = "column is-one-third has-text-left"
  column.appendChild(p)
  column.appendChild(p2)
  column.appendChild(p3)
  otherConcepts.appendChild(column)
}

const addCheckfromSelect = (
  elemento,
  where,
  inputText = false,
  description = false,
  placeholder = "Cantidad"
) => {
  let extraClass = ""
  let extraClass2 = ""
  if (prices.employees[where]) {
    extraClass = "employee"
  } else if (prices.menus[where]) {
    extraClass = "menu"
    extraClass2 = "menu_amount"
  } else if (prices.products[where]) {
    extraClass = "product"
    extraClass2 = "product-amount"
  } else if (prices.materials[where]) {
    extraClass = "material"
    extraClass2 = "material-amount"
  } else if (prices.providers[where]) {
    extraClass = "provider"
    extraClass2 = "provider-price"
  }
  const select = document.getElementById(elemento.id)
  const destiny = document.getElementById(where)
  const value = select.value
  const text = select.options[select.selectedIndex].text
  let checkbox = document.createElement("input")
  checkbox.type = "checkbox"
  checkbox.value = value
  checkbox.name = where + "[]"
  checkbox.id = value
  checkbox.className = extraClass
  checkbox.checked = true
  let label = document.createElement("label")
  label.htmlFor = value
  label.innerHTML = text
  label.className = "ml-20 is-size-5 mt--5"
  let li = document.createElement("li")
  li.style.listStyle = "none"
  li.appendChild(checkbox)
  li.appendChild(label)
  if (inputText) {
    checkbox.onclick = () => {
      const myInput = document.getElementById(value + "input")
      if (checkbox.checked) {
        myInput.required = true
      } else {
        myInput.required = false
      }
    }
    let input = document.createElement("input")
    input.id = value + "input"
    input.type = "number"
    input.name = where + "Input[]"
    input.placeholder = placeholder
    input.min = "0"
    input.className =
      "ml-10 height-30 input is-size-5 input-check " + extraClass2
    input.required = true
    li.appendChild(input)
  }
  if (description) {
    let input2 = document.createElement("textarea")
    input2.type = "text"
    input2.name = where + "Description[]"
    input2.placeholder = "Descripción"
    input2.style = "width: 98% !important;"
    input2.className = "ml-10 input is-size-5 textarea-check"
    input2.required = false
    li.appendChild(input2)
  }
  destiny.appendChild(li)
  select.remove(select.selectedIndex)
  select.value = ""
}

function minClausure() {
  const fecha = document.getElementById("date_event")
  const fecha2 = document.getElementById("date_clausure")

  const newFecha = new Date(fecha.value)
  const newHour = newFecha.getHours() + 1
  let newDate = new Date(newFecha.setHours(newHour))
  newDate = new Date(newDate.setMonth(newDate.getMonth() + 1))
  console.log(newFecha)

  year = newDate.getFullYear()
  month = newDate.getMonth() > 9 ? newDate.getMonth() : "0" + newDate.getMonth()
  day = newDate.getDate() > 9 ? newDate.getDate() : "0" + newDate.getDate()
  hour = newDate.getHours() > 9 ? newDate.getHours() : "0" + newDate.getHours()
  minute =
    newDate.getMinutes() > 9 ? newDate.getMinutes() : "0" + newDate.getMinutes()

  const fechaFinal = year + "-" + month + "-" + day + "T" + hour + ":" + minute
  console.log(fechaFinal)
  fecha2.min = fechaFinal
}
