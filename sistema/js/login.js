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
    if (campo.value.length == 0) {
        campo.className = 'forms_field-input is-danger';
        //mostrar el mensaje de error  
        document.getElementById('mensaje').style.display = 'block';
        return false;
    } else {
        campo.className = 'forms_field-input';
        //ocultar el mensaje de error
        document.getElementById('mensaje').style.display = 'none';
        return true;
    }
}
