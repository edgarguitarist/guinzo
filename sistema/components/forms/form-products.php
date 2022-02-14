<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Nombre</label>
        <label class="label has-text-left wd-4c">Tipo</label>
        <label class="label has-text-left wd-10">Precio</label>
        <label class="label has-text-left wd-10">Peso</label>
        <label class="label has-text-left wd-20">Unidad de Medida</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input class="input" type="hidden" name="id" id="id" value="<?= $id ?>">
            <input id="name" name="name" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre de Producto" value="<?= $data_result[$who]['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'type_product', '<?= $data_result[$who]['tipo'] ?? '' ?>')" onchange="checkSelect(this, false)" id="tipo_producto" name="tipo_producto" class="input is-success" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <input id="precio" name="precio" class="input solo-precio" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Precio" value="<?= $data_result[$who]['precio'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <input id="peso" name="peso" class="input solo-numeros" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Peso" value="<?= $data_result[$who]['peso'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-20">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'type_amount')" onchange="checkSelect(this, false)" id="tipo_peso" name="tipo_peso" class="input is-success" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Descripción</label>
        <label class="label has-text-left wd-4c">Fecha de Expiración</label>
        <label class="label has-text-left wd-4c">Proveedor</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <input id="description" name="description" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="40" type="text" placeholder="Descripción" value="<?= $data_result[$who]['description'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="left-align wd-100 ">
                <input title="Mínimo 2 Semanas" type="date"  min="<?= $dos_semanas; ?>"  value="<?= $data_result[$who]['expiration'] ?? $dos_semanas ?>" id="expiration" name="expiration" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'providers', '<?= $data_result[$who]['provider'] ?>')" onchange="checkSelect(this, false)" id="providers" name="providers" class="input" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>