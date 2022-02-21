<section class="user">
    <div class="user_options-container">
        <div class="user_options-text">
            <div class="user_options-unregistered center">
                    <img src="sistema/images/logos/logo-bockcao-white.png" width="50%" alt="logo">
                    <h2 class="subtitle has-text-white">Ya recordaste tu Contraseña?</h2>
                    
                    <a class="user_unregistered-signup button is-light is-outlined b-600" id="signup-button-r" href="login.php" >Iniciar Sesión</a>
            </div>   
        </div>

        <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
                <h2 class="forms_title">Recuperar Contraseña</h2>
                <form class="forms_form" method="POST" action="send-mail.php">
                    <fieldset class="forms_fieldset">
                        <div class="forms_field">                            
                            <input type="email" name="email" onkeyup="checkCampoCorreo(this);" placeholder="Email" id="email_recovery" class="forms_field-input" required autofocus />
                            <br>
                            <br>
                            <label class="text-danger" for="email" id="mensaje_recovery" style="display: none;">*Ingrese su email para recibir las instrucciones para recuperar su cuenta.*</label>
                        </div>
                    </fieldset>
                    <div class="center">
                        <br>
                        <br>
                        <input id="submit_recovery" type="submit" value="Enviar Correo" class="forms_buttons-action">
                    </div>
                </form>
            </div>            
        </div>
    </div>
</section>
