<section class="user">
    <div class="user_options-container">
        <div class="user_options-text">
            <div class="user_options-unregistered">
                <center>
                    <img src="sistema/images/logos/logo-bockcao-white.png" width="50%" alt="logo">
                    <h2 class="subtitle has-text-white">Aún no tienes una Cuenta?</h2>
                    <!-- <p class="user_unregistered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p> -->
                    <button class="user_unregistered-signup button is-light is-outlined b-600" id="signup-button">Registrarse</button>
            </div>

            <div class="user_options-registered">
                <center>
                    <img src="sistema/images/logos/logo-bockcao-white.png" width="50%" alt="logo">
                    <h2 class="subtitle has-text-white">Ya tienes una Cuenta?</h2>
                    <!-- <p class="user_registered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p> -->
                    <button class="user_registered-login button is-light is-outlined b-600" id="login-button">Iniciar Sesión</button>
            </div>
        </div>

        <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
                <h2 class="forms_title">Iniciar Sesión</h2>
                <form id="form_login" name="form_login" method="POST" action="sistema/components/root/login-checker.php" class="forms_form">
                    <fieldset class="forms_fieldset">
                        <div class="forms_field">
                            <input type="email" placeholder="Email" id="email" name="email" class="forms_field-input" required autofocus />
                        </div>
                        <div class="forms_field">
                            <input type="password" placeholder="Password" id="password" name="password" class="forms_field-input" required />
                        </div>
                    </fieldset>
                    <div class="forms_buttons">
                        <a href="recovery.php" type="button" class="forms_buttons-forgot">Olvidaste tu Contraseña?</a>
                        <input type="submit" id="logearse" value="Iniciar Sesión" class="forms_buttons-action">
                    </div>
                </form>
            </div>
            <div class="user_forms-signup">
                <h2 style="margin-bottom: 10px !important;" class="forms_title">Registrarse</h2>
                <form id="form_signup" name="form_signup" method="POST"  class="forms_form" action="sistema/components/root/signup-checker.php" >
                    <fieldset class="forms_fieldset">
                        <div class="forms_field">
                            <input type="text" placeholder="Nombre" id="name" name="name" minlength="3" class="forms_field-input wd-45" required />
                            <input type="text" style="position: relative; float: right;" placeholder="Apellido" id="lastname" name="lastname" minlength="3" class="forms_field-input wd-45" required />
                        </div>

                        <div class="forms_field">
                            <input type="text" placeholder="Cedula" onkeyup="checkCedula()" id="cedula" name="cedula" minlength="10" maxlength="10" class="forms_field-input wd-45" required />
                            <input type="text" style="position: relative; float: right;" placeholder="Telefono" id="phone" name="phone" minlength="10" maxlength="10" class="forms_field-input wd-45" required />
                            <span id="cedula_error" style="display: flex;"></span>
                        </div>

                        <div class="forms_field">
                            <input type="email" placeholder="Correo" id="email_r" name="email_r" class="forms_field-input" required />
                        </div>
                        <div class="forms_field">
                            <input type="password" placeholder="Contraseña" id="password_r" name="password_r" minlength="8" maxlength="30" class="forms_field-input wd-45" required />
                            <input type="date" style="position: relative; float: right;" max="<?php echo $minimo; ?>" value="<?php echo $minimo; ?>" id="birthday" name="birthday" class="forms_field-input wd-45" required />
                        </div>
                    </fieldset>
                    <div style="margin-top: 15px;" class="center">
                        <input type="submit" id="registrarse" value="Registrarse" class="forms_buttons-action">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>