<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-45">Nombre *</label>
        <label class="label has-text-left wd-50">Descripción *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-45">
            <input class="input" type="hidden" name="id_type" id="id_type" value="<?= $id ?? 99 ?>">
            <input class="input" type="hidden" name="type" id="type" value="<?= $type ?>">
            <input class="input" type="hidden" name="table" id="table" value="<?= $table ?>">
            <input id="name_type" name="name_type" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre" value="<?= $data_result[$who]['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-50">
            <input id="description_type" name="description_type" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Descripción" value="<?= $data_result[$who]['description'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>