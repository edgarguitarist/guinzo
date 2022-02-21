/**
 * Variables
 */

const signupButton = document.getElementById("signup-button"),
  signupButton_r = document.getElementById("signup-button-r"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms")

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceRight")
    userForms.classList.add("bounceLeft")
  },
  false
)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft")
    userForms.classList.add("bounceRight")
  },
  false
)

function checkCampoCorreo(elemento) {
  campo = document.getElementById(elemento.id)

  if (campo.value.length > 10) {
    campo.className = "forms_field-input is-success"
    document.getElementById("mensaje_recovery").style.display = "none"
    document.getElementById("submit_recovery").disabled = false
  } else {
    campo.className = "forms_field-input is-danger"
    document.getElementById("mensaje_recovery").style.display = "block"
    document.getElementById("submit_recovery").disabled = true
  }
}

function checkPass(elemento1, elemento2){
  campo1 = document.getElementById(elemento1)
  campo2 = document.getElementById(elemento2)
  mensaje = document.getElementById("mensaje_change")
  submit = document.getElementById("submit_change")
  console.log(campo1.value)
  if (campo1.value.length >= 8 && campo1.value == campo2.value) {
    campo1.className = "forms_field-input is-success"
    campo2.className = "forms_field-input is-success"
    mensaje.style.display = "none"
    submit.disabled = false
  } else if(campo1.value.length < 8) {
    campo1.className = "forms_field-input is-danger"
    campo2.className = "forms_field-input is-danger"
    mensaje.innerHTML = "Las contraseña deben tener al menos 8 caracteres"
    mensaje.style.display = "block"
    submit.disabled = true
  } else if (campo1.value !== campo2.value){
    campo1.className = "forms_field-input is-danger"
    campo2.className = "forms_field-input is-danger"
    mensaje.innerHTML = "Las contraseñas no coinciden"
    mensaje.style.display = "block"
    submit.disabled = true
  }
}