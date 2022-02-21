<section class="user">
    <div class="user_options-container">
        <div class="user_options-text">
            <div class="user_options-unregistered center">
                <img src="sistema/images/logos/logo-bockcao-white.png" width="50%" alt="logo">
                <h2 class="subtitle has-text-white">Ya recordaste tu Contraseña?</h2>

                <a class="user_unregistered-signup button is-light is-outlined b-600" id="signup-button-r" href="login.php">Iniciar Sesión</a>
            </div>
        </div>

        <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
                <h2 class="forms_title">Cambiar Contraseña</h2>
                <form class="forms_form" method="POST" action="change-pass-update.php">
                    <input type="hidden" name="userID" value="<?= $userID ?>">
                    <fieldset class="forms_fieldset">
                        <div class="forms_field">
                            <label for="password_change">Nueva Contraseña</label>
                            <div>
                                <input type="password" name="password" onkeyup="checkPass('password_change','password_change2');" placeholder="Su nueva contraseña" id="password_change" minlength="8" class="forms_field-input" required autofocus />
                            </div>
                            <label style="margin-top: 20px;" for="password_change2">Repetir contraseña</label>
                            <div>
                                <input type="password" name="password2" onkeyup="checkPass('password_change','password_change2');" placeholder="Repita la contraseña" id="password_change2" minlength="8" class="forms_field-input" required autofocus />
                            </div>
                            <br>
                            <label class="text-danger" for="email" id="mensaje_change" style="display: none;">Las contraseñas no coinciden</label>
                        </div>
                    </fieldset>
                    <div class="center">
                        <br>
                        <input id="submit_change" type="submit" value="Cambiar Contraseña" class="forms_buttons-action">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>