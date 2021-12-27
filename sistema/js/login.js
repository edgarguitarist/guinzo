/**
 * Variables
 */

const signupButton = document.getElementById("signup-button"),
  signupButton_r = document.getElementById("signup-button-r"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);

function checkCampoCorreo() {
  campo = document.getElementById("email");
  //validar si campo es un email correcto

  if (campo.value.length < 10) {
    campo.className = "forms_field-input is-danger";
    document.getElementById("mensaje").style.display = "block";
    //deshabilitar submit
    document.getElementById("submit").disabled = true;
  } else {
    campo.className = "forms_field-input";
    document.getElementById("mensaje").style.display = "none";
    //habilitar submit
    document.getElementById("submit").disabled = false;
  }
}

