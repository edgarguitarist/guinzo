<?php
include "includes/dbcon.php";
?>
<div class="field">
    <div class="">
        <label class="label has-text-centered wd-100">USUARIO</label>
    </div>
    <div class="field-body forms_row">
        <div class="wd-3c control"></div>
        <div class="control wd-3c">
            <div class="select wd-100">
                <select onmousemove="checkForm()" onchange="getAdmin(this)" class="wd-100 is-success" name="users" id="users" required>
                    <option value="">Seleccione una opción</option>
                    <?php
                    $query = "SELECT * FROM users u INNER JOIN roles r ON u.id_role = r.id_role WHERE u.id_role BETWEEN 2 AND 3 OR u.id_role = 7";
                    $result = mysqli_query($con, $query);
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?= $row['dni'] ?>"><?= $row['name'] . " " . $row['lastname'] . " - " . $row['name_role'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="wd-3c control"></div>
    </div>
</div>
<div class="field">
    <div class="">
        <label onmousemove="checkForm()" class="label has-text-centered wd-100">FOTO</label>
    </div>
    <div class="field-body forms_row">
        <div class="wd-3c control"></div>
        <div class="control wd-3c">
            <img onmousemove="checkForm()" id="foto_admin" class="photo-rounded" src="images/logos/logo-bockcao-black.png" alt="">
        </div>
        <div class="wd-3c control"></div>
    </div>
</div>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-15">Cedula</label>
        <label class="label has-text-left wd-5c">Nombres</label>
        <label class="label has-text-left wd-15">Celular</label>
        <label class="label has-text-left wd-4c">Correo</label>
        <label class="label has-text-left wd-15">Rol</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-6c">
            <input class="input" type="text" id="dni" disabled>
        </div>
        <div class="control wd-4c">
            <input class="input" type="text" id="names" disabled>
        </div>
        <div class="control wd-6c">
            <input class="input" type="text" id="phone" disabled>
        </div>
        <div class="control wd-3c">
            <input class="input" type="text" id="email" disabled>
        </div>
        <div class="control wd-5c">
            <input class="input" type="text" id="role" disabled>
        </div>
    </div>
</div>

<script>
    function getAdmin(sel) {
        var id = sel.value;
        if (id != '') {
            $.ajax({
                type: "GET",
                url: "components/forms/get-data.php",
                data: "id=" + id + "&who=admins",
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#dni').val(json.dni);
                    $('#names').val(json.name + " " + json.lastname);
                    $('#phone').val(json.phone);
                    $('#email').val(json.email);
                    $('#role').val(json.name_role);
                    document.getElementById("foto_admin").src = "" + json.foto;
                }
            });
        }else{
            $('#dni').val('');
            $('#names').val('');
            $('#phone').val('');
            $('#email').val('');
            $('#role').val('');
            document.getElementById("foto_admin").src = "images/logos/logo-bockcao-black.png";
        }
    }
</script>