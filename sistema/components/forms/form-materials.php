<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Nombre *</label>
        <label class="label has-text-left wd-10">Cantidad *</label>
        <label class="label has-text-left wd-10">Precio *</label>
        <label class="label has-text-left wd-4c">Tipo *</label>
        <label class="label has-text-left wd-4c">Fecha de Expiración *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input class="input" type="hidden" name="id" id="id" value="<?= $id ?? 99 ?>">
            <input id="name_material" name="name" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre de Material" value="<?= $data_result[$who]['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>

        <div class="control wd-10">
            <input id="cantidad_material" name="cantidad" class="input solo-numeros" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Cantidad" value="<?= $data_result[$who]['cantidad'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <input id="precio_material" name="precio" class="input" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="number" placeholder="Precio" value="<?= $data_result[$who]['precio'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'type_material' , '<?= $data_result[$who]['tipo'] ?? '' ?>')" onchange="checkSelect(this, false)" id="tipo_material" name="tipo_material" class="input is-success" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="left-align wd-100 ">
                <input title="Mínimo 2 semanas" type="date" min="<?= $dos_semanas; ?>" value="<?= $data_result[$who]['expiration'] ?? $dos_semanas ?>" id="expiration" name="expiration" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>


<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2-3c">Descripción *</label>
        <label class="label has-text-left wd-1-3c">Proveedor *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2-3c">
            <input id="description" name="description" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="40" type="text" placeholder="Descripción" value="<?= $data_result[$who]['description'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-1-3c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'providers', '<?= $data_result[$who]['provider'] ?? '' ?>')" onchange="checkSelect(this, false)" id="providers" name="providers" class="input" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>