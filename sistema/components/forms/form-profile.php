<?php
//Obtener la ruta actual
$ruta =  "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Cedula *</label>
        <label class="label has-text-left wd-4c">Nombre *</label>
        <label class="label has-text-left wd-4c">Apellido *</label>
        <label class="label has-text-left wd-4c">Fecha de Nacimiento *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input class="input" type="hidden" name="dni" id="dni_profile" value="<?= $_SESSION['dni'] ?? '' ?>">
            <input class="input" type="hidden" name="ruta" id="ruta_profile" value="<?= $ruta ?>">
            <input id="cedula_profile" name="cedula" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre de Material" value="<?= $_SESSION['dni'] ?? '' ?>" required disabled>
            <p>&nbsp;</p>
        </div>

        <div class="control wd-4c">
            <input id="firstName_profile" name="firstName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Primer Nombre" value="<?= $_SESSION['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="lastName_profile" name="lastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Paterno" value="<?= $_SESSION['lastname'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="left-align wd-100 ">
                <input title="Fecha de Nacimiento" type="date" max="<?= $minimo; ?>" value="<?= $_SESSION['birthday'] ?? '' ?>" id="birthday_profile" name="birthday" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>
        
    </div>
</div>


<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Correo *</label>
        <label class="label has-text-left wd-4c">Celular *</label>
        <label class="label has-text-left wd-4c">Contrase??a *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" id="email_profile" name="email" type="email" placeholder="Correo" onkeyup="checkEmail(this, 'gg')" value="<?= $_SESSION['email'] ?? '' ?>" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
                <p id="email_profile_error" class="help is-danger">&nbsp;</p>
            </div>
        </div>
        <div class="control wd-4c">
            <input id="phone_profile" name="phone" class="input solo-numeros" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Celular" value="<?= $_SESSION['phone'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="is-flex">
                <input id="password_profile" name="password" class="input" type="password" minlength="8" maxlength="20" placeholder="Contrase??a" value="<?= $_SESSION['password'] ?? '' ?>" required>
                <a id="togglePassword" type="button" onclick="togglePassword('password_profile')" title="Mostrar Contrase??a" class="button is-black is-inverted m-auto ph-5"><em id="eye" class="fas fa-eye"></em><em id="eye2" class="fas fa-eye-slash" hidden></em></a>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>