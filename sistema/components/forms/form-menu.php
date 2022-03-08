<?php $who = $who ?? ''; ?>

<div class="file-upload2">
    <div class="image-upload-wrap2 area-img-modal2">
        <input class="input" type="hidden" name="id_menu" id="id_menu" value="<?= $id ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <!-- 3MB -->
        <input id="photo_menu" name="photo_menu" class="file-upload-input2" type='file' onchange="readURL2(this);" accept="image/*" required />
        <div class="drag-text">
            <em class="far fa-image is-size-1"></em>
            <h3 class="subtitle b-600">Selecciona tu foto</h3>
        </div>
    </div>
    <br>
    <p class="has-text-danger b-600 hidden error_photo2">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
    <div class="file-upload-content2">
        <img id="photoUploadMenu" class="file-upload-image2 area-img-modal2" src="#" alt="your image" />
        <div class="image-title-wrap mt-5">
            <button type="button" onclick="removeUpload2()" class="remove-image">Remove

            </button>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Nombre *</label>
        <label class="label has-text-left wd-4c">Tipo *</label>
        <label class="label has-text-left wd-4c">Precio *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <input id="name_menu" name="name_menu" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre de Menu" value="<?= $data_result[$who]['name'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'type_menu', '<?= $data_result[$who]['type'] ?? '' ?>')" onchange="checkSelect(this, false)" id="tipo_menu" name="tipo_menu" class="input is-success" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="precio_menu" name="precio_menu" class="input solo-precio" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Precio" value="<?= $data_result[$who]['price'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-100">Descripción *</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-100">
            <input id="description_menu" name="description_menu" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="60" type="text" placeholder="Descripción" value="<?= $data_result[$who]['description'] ?? '' ?>" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>