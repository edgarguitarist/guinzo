<?php $who = $who ?? ''; ?>
<div class="field">
    <label class="label has-text-left">Nombres y Apellidos *</label>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <!--  hacer un trim a todos los datos del formulario  -->
            <input id="firstName" name="firstName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Primer Nombre" value="<?= $data_result[$who]['firstname'] ?? '' ?>" required>
        </div>
        <div class="control wd-4c">
            <input id="middleName" name="middleName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Segundo Nombre" value="<?= $data_result[$who]['middlename'] ?? '' ?>" required>
        </div>
        <div class="control wd-4c">
            <input id="lastName" name="lastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Paterno" value="<?= $data_result[$who]['lastname'] ?? '' ?>" required>
        </div>
        <div class="control wd-4c">
            <input id="secondLastName" name="secondLastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Materno" value="<?= $data_result[$who]['secondlastname'] ?? '' ?>" required>
        </div>
    </div>
</div>

<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Cédula *</label>
        <label class="label has-text-left wd-4c">Celular *</label>
        <label class="label has-text-left wd-4c">Ciudad de Residencia *</label>
        <label class="label has-text-left wd-4c">Fecha de Nacimiento *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input id="cedula" name="cedula" minlength="10" maxlength="10" class="input solo-numeros mt--5" onkeyup="checkCedula('gg')" type="text" placeholder="Su Cédula" value="<?= $data_result[$who]['dni'] ?? '' ?>" required>
            <input type="hidden" id="dni" name="dni" value="<?= $data_result[$who]['dni'] ?? '' ?>">
            <p id="dni_error" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="phone" name="phone" class="input solo-numeros" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Celular" onkeyup="checkPhone(this)" value="<?= $data_result[$who]['phone'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select wd-100">
                <select id="residence" name="residence" class="input is-success" onchange="checkSelect(this)" required>
                    <option value="">Seleccione su Ciudad</option>
                    <?php
                    $employee_city = $data_result[$who]['city'] ?? '';
                    $cities = ['Daule', 'Durán', 'Guayaquil', 'Samborondón'];
                    $defaultcity = $employee_city != '' ? $employee_city : 'Guayaquil';
                    foreach ($cities as $city) {
                        if ($city == $defaultcity) {
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
            <p id="residence_error" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Correo *</label>
        <label class="label has-text-left wd-4c">Rol de Empleado *</label>
        <label class="label has-text-left wd-4c">Tipo de Empleado *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" id="email" name="email" type="email" placeholder="Correo" onkeyup="checkEmail(this, 'gg')" value="<?= $data_result[$who]['email'] ?? '' ?>" required>
                    <span class="icon is-small is-left">
                        <em class="fas fa-envelope"></em>
                    </span>
                    <span class="icon is-small is-right">
                        <em class="fas fa-check"></em>
                    </span>
                </p>
                <p id="email_error" class="help is-danger">&nbsp;</p>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select wd-100">
                <select id="role_employees" name="role_employees" class="input is-success" onchange="checkSelect(this)" required>
                    <option value="">Seleccione el Tipo</option>
                    <?php
                    $employee_role = $data_result[$who]['role'] ?? '';
                    $roles = [1 => 'Administrador', 2 => 'Capitán', 3 => 'Chef', 9 => 'Cocinero', 4 => 'Salonero Fijo', 5 => 'Salonero Eventual', 8 => 'Steward', 10 => 'Bartender'];
                    $defaultrole = $employee_role != '' ? $employee_role : 5;
                    foreach ($roles as $id_role_employee => $role_employee) {
                        if ($id_role_employee == $defaultrole) {
                            echo "<option value='$id_role_employee' selected>$role_employee</option>";
                        } else {
                            echo "<option value='$id_role_employee'>$role_employee</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <p id="role_employees_error" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select wd-100">
                <select id="type_employees" name="type_employees" class="input is-success" onchange="checkSelect(this)" required>
                    <option value="">Seleccione el Tipo</option>
                    <?php
                    $employee_type = $data_result[$who]['rank'] ?? '';
                    $types = [1 => 'Nuevo', 2 => 'Malo', 3 => 'Regular', 4 => 'Bueno', 5 => 'Excelente', 6 => 'Estrella'];
                    $defaulttype = $employee_type != '' ? $employee_type : 4;

                    foreach ($types as $id_type_employee => $type_employee) {
                        if ($id_type_employee == $defaulttype) {
                            echo "<option value='$id_type_employee' selected>$type_employee</option>";
                        } else {
                            echo "<option value='$id_type_employee'>$type_employee</option>";
                        }                        
                    }
                    ?>
                </select>
            </div>
            <p id="type_employees_error" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>