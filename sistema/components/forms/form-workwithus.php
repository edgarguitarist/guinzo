<form onchange="checkForm()" class="form-new" action="sistema/components/root/signup-employee-checker.php" autocomplete="none" aria-autocomplete="none" enctype="multipart/form-data" method="post">
    <h1 class="tittle is-cookie has-text-centered">Registrate</h1>
    <div class="field">
        <label class="label has-text-left">Nombres y Apellidos</label>
        <div class="field-body forms_row">
            <div class="control wd-4c">
                <!--  hacer un trim a todos los datos del formulario  -->
                <input id="firstName" name="firstName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Primer Nombre" required>
            </div>
            <div class="control wd-4c">
                <input id="middleName" name="middleName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Segundo Nombre" required>
            </div>
            <div class="control wd-4c">
                <input id="lastName" name="lastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Paterno" required>
            </div>
            <div class="control wd-4c">
                <input id="secondLastName" name="secondLastName" class="input solo-letras" onkeyup="checkLength(this)" minlength="3" maxlength="30" type="text" placeholder="Apellido Materno" required>
            </div>
        </div>
    </div>


    <div class="field">
        <div class="forms_row">
            <label class="label has-text-left wd-4c">Cedula</label>
            <label class="label has-text-left wd-4c">Contraseña</label>
            <label class="label has-text-left wd-4c">Ciudad de Residencia</label>
            <label class="label has-text-left wd-4c">Fecha de Nacimiento</label>
        </div>
        <div class="field-body forms_row">
            <div class="control wd-4c">
                <input id="cedula" name="cedula" minlength="10" maxlength="10" class="input solo-numeros" onkeyup="checkCedula()" type="text" placeholder="Su Cédula" required>
                <p id="dni_error" class="help is-danger">&nbsp;</p>
            </div>
            <div class="control wd-4c">
                <input id="password" name="password" style="margin-top: -20px;" minlength="8" maxlength="20" class="input" type="password" placeholder="Su Contraseña" required>
            </div>
            <div class="control wd-4c">
                <div class="select wd-100">
                    <select id="residence" name="residence" class="wd-100" onchange="checkSelect(this)" required>
                        <option value="">Seleccione su Ciudad</option>
                        <?php
                        $cities = ['Daule', 'Durán', 'Guayaquil', 'Samborondón'];

                        foreach ($cities as $city) {
                            echo "<option value='$city'>$city</option>";
                        }
                        ?>
                        <option value="Otra">Otra Ciudad</option>
                    </select>
                </div>
                <p id="residence_error" class="help is-danger">&nbsp;</p>
            </div>
            <div class="control wd-4c">
                <div class="left-align wd-100 ">
                    <input title="Fecha de Nacimiento" type="date" style="" max="<?= $minimo; ?>" value="<?= $minimo; ?>" id="birthday" name="birthday" class="input wd-100" required />
                </div>
                <p id="residence_error" class="help is-danger">&nbsp;</p>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="forms_row">
            <label class="label wd-2c">Su Curriculum</label>
            <label class="label wd-2c">Su Foto</label>
        </div>
        <div class="field-body forms_row">
            <div class="control wd-2c">
                <label class="label has-text-center">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                    <input id="curriculum" onchange="" name="curriculum" type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf" required />
                </label><br>
                <p id="error_curriculum" class="has-text-danger is-size-6 has-text-centered b-600 hidden">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>

            </div>
            <div class="control wd-2c">
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required />
                        <div class="drag-text center-total">
                            <em class="far fa-image is-size-2"></em>
                            <h3>Selecciona tu foto</h3>
                        </div>
                    </div>
                    <br>
                    

                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                <!-- <span class="image-title">Uploaded Image</span> -->
                            </button>
                        </div>
                    </div>
                </div>
                <p id="error_photo2" class="has-text-danger is-size-6 has-text-centered b-600 hidden">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label has-text-left wd-2c">Contacto</label>
        <div class="field-body forms_row">
            <div class="field is-expanded">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static">
                            +593
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input id="phone" name="phone" onkeyup="checkPhone()" class="input solo-numeros" type="tel" pattern="[0-9]{9}" minlength="9" maxlength="9" placeholder="Su Número de Celular" required>
                    </p>
                </div>
                <p id="phone_error" class="help is-danger">&nbsp;</p>
            </div>
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input" id="email" name="email" type="email" placeholder="Correo" onkeyup="checkEmail(this)" required>
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
    </div>

    <div class="field">
        <label class="label has-text-left">Cuentanos brevemente de ti</label>
        <div class="control">
            <textarea id="about_you" name="aboutYou" class="textarea" maxlength="300" placeholder="Máximo de 300 caracteres" required></textarea>
        </div>
    </div>

    <div class="field">
        <label class="label has-text-left">Ya has Trabajado con Nosotros?</label>
        <div class="control ml-3">
            <label class="radio">
                <input id="question" value="1" type="radio" name="question" required>
                Si
            </label>
            <label class="radio">
                <input id="question" value="0" type="radio" name="question">
                No
            </label>
        </div>
    </div>

    <div class="field is-grouped-centered">
        <div class="control center">
            <button id="submit" name="submit" type="submit" class="form_button">Enviar</button>
        </div>
    </div>
</form>