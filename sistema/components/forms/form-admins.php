<?php
# TODO: Obtener los datos de los usuarios que pueden ser administradores
?>
<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="">
        <label class="label has-text-centered wd-100">USUARIO</label>
    </div>
    <div class="field-body forms_row">
        <div class="wd-3c control"></div>
        <div class="control wd-3c">
            <select name="users" id="users">
                <option value="">Seleccione una opción</option>
                <?php foreach ($data_result['admins'] as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php } ?>
            </select>
            <h1><?= $data_result ?></h1>
            <h1><?= $who ?></h1>
            <p>&nbsp;</p>
        </div>        
        <div class="wd-3c control"></div>
    </div>
</div>
<div class="field">
    <div class="">
        <label class="label has-text-centered wd-100">FOTO</label>
    </div>
    <div class="field-body forms_row">
        <div class="wd-3c control"></div>
        <div class="control wd-3c">
            <img src="" alt="">
        </div>        
        <div class="wd-3c control"></div>
    </div>
</div>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Cedula</label>
        <label class="label has-text-left wd-4c">Nombres</label>
        <label class="label has-text-left wd-4c">Celular</label>
        <label class="label has-text-left wd-4c">Correo</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <input class="input" type="hidden" name="id" id="id" value="<?= $id ?? 99 ?>">
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
            <input id="precio" name="precio" class="input" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="number" placeholder="Precio" value="<?= $data_result[$who]['precio'] ?? '' ?>" required>
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


