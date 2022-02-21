<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Nombre *</label>
        <label class="label has-text-left wd-4c">Apellido *</label>
        <label class="label has-text-left wd-4c">Cedula *</label>
        <label class="label has-text-left wd-4c">Celular *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <!--  hacer un trim a todos los datos del formulario  -->
            <input id="firstName" name="firstName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Primer Nombre" value="<?= $data_result[$who]['firstname'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="lastName" name="lastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Paterno" value="<?= $data_result[$who]['lastname'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="cedula" name="cedula_customer" minlength="10" maxlength="10" class="input solo-numeros mt--5" onkeyup="checkCedula('gg', this)" type="text" placeholder="Su Cédula" value="<?= $data_result[$who]['dni'] ?? '' ?>" required>
            <input type="hidden" id="dni" name="dni" value="<?= $data_result[$who]['dni'] ?? '' ?>">
            <p id="cedula_customer_error" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="phone" name="phone" class="input solo-numeros" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Celular" value="<?= $data_result[$who]['phone'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Correo *</label>
        <label class="label has-text-left wd-4c">Ciudad de Residencia *</label>
        <label class="label has-text-left wd-4c">Fecha de Nacimiento *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" id="email" name="email" type="email" placeholder="Correo" onkeyup="checkEmail(this, 'gg')" value="<?= $data_result[$who]['email'] ?? '' ?>" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
                <p id="email_error" class="help is-danger">&nbsp;</p>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select wd-100">
                <select id="residence" name="residence" class="wd-100" onchange="checkSelect(this)" required>
                    <option value="">Seleccione su Ciudad</option>
                    <?php
                    $cities = ['Daule', 'Durán', 'Guayaquil', 'Samborondón'];
                    $customer_city = $data_result[$who]['city'] ?? '';
                    foreach ($cities as $city) {
                        if ($customer_city == $city) {
                            echo "<option value='$city' selected>$city</option>";
                        } else {
                            echo "<option value='$city'>$city</option>";
                        }
                    }
                    ?>
                    <option value="Otra">Otra Ciudad</option>
                </select>
            </div>
            <p id="residence_error" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="left-align wd-100 ">
                <input title="Fecha de Nacimiento" type="date" style="" max="<?= $minimo; ?>" value="<?= $data_result[$who]['birthday'] ?? $minimo ?>" id="birthday" name="birthday" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>