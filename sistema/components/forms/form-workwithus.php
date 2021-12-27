<form onchange="checkForm()" class="form-new" action="" autocomplete="none" aria-autocomplete="none">
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
            <label class="label has-text-left wd-2c">Cedula</label>
            <label class="label has-text-left wd-2c">Ciudad de Residencia</label>
        </div>
        <div class="field-body forms_row">
            <div class="control wd-2c">
                <input id="cedula" name="cedula" minlength="10" maxlength="10" class="input solo-numeros" onkeyup="checkCedula()" type="text" placeholder="Su Cédula" required>
                <p id="dni_error" class="help is-danger">&nbsp;</p>
            </div>
            <div class="control wd-2c">
                <div class="select">
                    <select id="residence" name="residence" class="" onchange="checkSelect(this)" required>
                        <option value="">Seleccione su Ciudad</option>
                        <?php
                        $cities = [
                            'Daule' => ['name' => 'Daule'], 'Durán' => ['name' => 'Durán'], 'Guayaquil' => ['name' => 'Guayaquil'], 'Samborondón' => ['name' => 'Samborondón'],
                        ];
                        foreach ($cities as $city) {
                            echo "<option value='" . $city['name'] . "'>" . $city['name'] . "</option>";
                        }
                        ?>
                        <option value="Otra">Otra Ciudad</option>
                    </select>
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
                <label class="label has-text-left">
                    <input id="curriculum" name="curriculum" type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf" required />
                </label>
            </div>
            <div class="control wd-2c">
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required />
                        <div class="drag-text">
                            <h3>Selecciona tu foto</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                <!-- <span class="image-title">Uploaded Image</span> -->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label has-text-left">Contacto</label>
        <div class="field-body forms_row">
            <div class="field is-expanded">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static">
                            +593
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input id="phone" onkeyup="checkPhone()" class="input solo-numeros" type="tel" pattern="[0-9]{9}" minlength="9" maxlength="9" placeholder="Su Número de Celular" required>
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
            <textarea id="about_you" name="aboutYou" class="textarea" maxlength="300" placeholder="" required></textarea>
        </div>
    </div>

    <div class="field">
        <label class="label has-text-left">Ya has Trabajado con Nosotros?</label>
        <div class="control ml-3">
            <label class="radio">
                <input id="question" value="yes" type="radio" name="question" required>
                Si
            </label>
            <label class="radio">
                <input id="question" value="no" type="radio" name="question">
                No
            </label>
        </div>
    </div>

    <div class="field is-grouped-centered">
        <div class="control center">
            <button id="submit" name="submit" type="submit" class="form_button">Submit</button>
        </div>
    </div>
</form>