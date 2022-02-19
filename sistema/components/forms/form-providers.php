<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Nombre *</label>
        <label class="label has-text-left wd-4c">Apellido *</label>
        <label class="label has-text-left wd-4c">Cédula *</label>
        <label class="label has-text-left wd-4c">Celular *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <!--  hacer un trim a todos los datos del formulario  -->
            <input id="firstName" name="firstName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Primer Nombre" value="<?= $data_result[$who]['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="lastName" name="lastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Paterno" value="<?= $data_result[$who]['lastname'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="cedula" name="cedula" minlength="10" maxlength="10" class="input solo-numeros mt--5" onkeyup="checkCedula('gg')" type="text" placeholder="Cédula" value="<?= $data_result[$who]['dni'] ?? '' ?>" required>
            <input type="hidden" id="dni" name="dni" value="<?= $data_result[$who]['dni'] ?? '' ?>">
            <p id="dni_error" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="phone" name="phone" class="input solo-numeros" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Celular" onkeyup="checkPhone(this)" value="<?= $data_result[$who]['phone'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Correo *</label>
        <label class="label has-text-left wd-2c">Ruc *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input mt--5" id="email" name="email" type="email" placeholder="Correo" onkeyup="checkEmail(this, 'gg')" value="<?= $data_result[$who]['email'] ?? '' ?>" required>
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
        <div class="control wd-2c">
            <input id="ruc" name="ruc" minlength="13" maxlength="13" class="input solo-numeros mt--5" onkeyup="checkRUC(this)" type="text" placeholder="RUC" value="<?= $data_result[$who]['ruc'] ?? '' ?>" required>
            <input type="hidden" id="ruc_2" name="ruc_2" value="<?= $data_result[$who]['ruc'] ?? '' ?>">
            <p id="dni_error" class="help is-danger">&nbsp;</p>
            <p id="ruc_error" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>
<h2 class="subtitle is-size-3 is-bold">Empresa</h2>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Nombre *</label>
        <label class="label has-text-left wd-4c">Teléfono *</label>
        <label class="label has-text-left wd-2c">Correo *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input id="companyName" name="companyName" class="input" onkeyup="checkLength(this , false)" minlength="3" maxlength="30" type="text" placeholder="Nombre Empresa" value="<?= $data_result[$who]['name_company'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="companyPhone" name="companyPhone" class="input solo-numeros" type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Teléfono" onkeyup="checkPhone(this)" value="<?= $data_result[$who]['tel_company'] ?? '' ?>"required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-2c">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input mt--5" id="companyEmail" name="companyEmail" type="email" placeholder="Correo" onkeyup="checkEmail(this, 'gg')" value="<?= $data_result[$who]['email_company'] ?? '' ?>" required>
                    <span class="icon is-small is-left">
                        <em class="fas fa-envelope"></em>
                    </span>
                    <span class="icon is-small is-right">
                        <em class="fas fa-check"></em>
                    </span>
                </p>
                <p id="companyEmail_error" class="help is-danger">&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2-3c">Dirección *</label>
        <label class="label has-text-left wd-1-3c">Tipo *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2-3c">
            <input id="companyAddress" name="companyAddress" class="input" onkeyup="checkLength(this , false, 10)" minlength="10" maxlength="80" type="text" placeholder="Dirección" value="<?= $data_result[$who]['address_company'] ?? '' ?>" required>            
        </div>
        <div class="control wd-1-3c">
            <div class="select wd-100">
                <select onmouseover="loadSelects(this, 'type_company')" id="companyType" name="companyType" class="wd-100" onchange="checkSelect(this)"  required>
                    <option value="">Seleccione el Tipo</option>
                </select>
            </div>
        </div>

    </div>
</div>