<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Cliente</label>
        <label class="label has-text-left wd-4c">Evento</label>
        <label class="label has-text-left wd-4c">Tipo</label>
        <label class="label has-text-left wd-10">Numero de invitados</label>
        <label class="label has-text-left wd-10">Precio</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'users' , '', 'id_role = 6')" onchange="checkSelect(this, false)" id="customer" name="customer" class="input" required autofocus>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <input id="name" name="name" class="input" onkeyup="checkLength(this, false)" minlength="3" maxlength="30" type="text" placeholder="Nombre del Evento" value="" required autocapitalize autofocus autocomplete="FALSE">
            <p>&nbsp;</p>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select onmouseover="loadSelects(this, 'type_event')" onchange="checkSelect(this, false)" id="tipo_evento" name="tipo_evento" class="input" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <input id="cantidad" name="cantidad" class="input solo-numeros" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Cantidad" value="" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <input id="precio" name="precio" class="input solo-precio" onkeyup="checkLength(this, false, 1, true)" minlength="1" maxlength="10" type="text" placeholder="Precio" value="" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Descripción</label>
        <label class="label has-text-left wd-custom">Dirección</label>
        <label class="label has-text-left wd-10">Lugar Propio</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <input id="description" name="description" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="40" type="text" placeholder="Descripción" value="" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-custom">
            <input id="address" name="address" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="40" type="text" placeholder="Dirección" value="" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <div class="is-flex mt-7">
                <input class="" type="radio" name="ownsite" id="ownsiteYes" value="1" required>
                <label class="mr-20 is-size-5 mt--7">SI</label>
                <input type="radio" name="ownsite" id="ownsiteNo" value="0">
                <label class="is-size-5 mt--7">NO</label>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-30">Fecha de Solicitud</label>
        <label class="label has-text-left wd-30">Fecha del Evento</label>
        <label class="label has-text-left wd-30">Fecha de Clausura</label>
    </div>

    <div class="field-body forms_row">
        <div class="control wd-30">
            <div class="wd-100 ">
                <input title="Fecha de Solicitud" type="datetime-local" id="date_request" name="date_request" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>

        <div class="control wd-30">
            <div class="wd-100 ">
                <input title="Fecha del Evento" type="datetime-local" id="date_event" name="date_event" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>

        <div class="control wd-30">
            <div class="wd-100 ">
                <input title="Fecha de Clausura" type="datetime-local" id="date_clausure" name="date_clausure" class="input wd-100" required />
            </div>
            <p id="" class="help is-danger">&nbsp;</p>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Empleados</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-5c">Capitanes Disponibles</label>
        <label class="label has-text-left wd-5c">Cocineros Disponibles</label>
        <label class="label has-text-left wd-5c">Saloneros Disponibles</label>
        <label class="label has-text-left wd-5c">Stewards</label>
        <label class="label has-text-left wd-5c">Otros</label>

    </div>
    <div class="field-body forms_row">
        <div class="control wd-5c">
            <?php
            #capitanes
            $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role = 2 AND u.status_user = 'Active' AND e.rank_employee != 7";
            $resultado = mysqli_query($con, $consulta);

            while ($row = mysqli_fetch_array($resultado)) { ?>
                <div class="wd-100 is-flex is-flex-direction-row is-size-5">
                    <input type="checkbox" name="captains[]" id="<?= $row['id_user'] ?>" value="<?= $row['id_user'] ?>" class="is-size-4" required>
                    <label for="<?= $row['id_user'] ?>" class="ml-20 is-size-5 mt--5"><?= $row['name'] . ' ' . $row['lastname'] ?></label>
                </div>
            <?php }
            if ($resultado->num_rows == 0) { ?>
                <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Capitanes Disponibles</p>

            <?php  } ?>
            <div class="mt-5 wd-100 is-flex is-flex-direction-row is-size-5">
                <input type="checkbox" name="captains[]" id="noneCaptain" value="noneCaptain" class="is-size-4" required>
                <label for="noneCaptain" class="ml-20 is-size-5 mt--5">No requerido</label>
            </div>
        </div>
        <div class="control wd-5c">
            <?php
            #cocineros
            $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user  AND (u.id_role = 3 OR u.id_role = 9) AND u.status_user = 'Active'";
            $resultado = mysqli_query($con, $consulta);
            while ($row = mysqli_fetch_array($resultado)) { ?>
                <div class="wd-100 is-flex is-flex-direction-row is-size-5">
                    <input type="checkbox" name="chefs[]" id="<?= $row['id_user'] ?>" value="<?= $row['id_user'] ?>" class="is-size-4" required>
                    <label class="ml-20 is-size-5 mt--5"><?= $row['name'] . ' ' . $row['lastname'] ?></label>
                </div>
            <?php }
            if ($resultado->num_rows == 0) { ?>
                <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Cocineros Disponibles</p>

            <?php  } ?>
            <div class="mt-5 wd-100 is-flex is-flex-direction-row is-size-5">
                <input type="checkbox" name="chefs[]" id="noneChef" value="noneChef" class="is-size-4" required>
                <label for="noneChef" class="ml-20 is-size-5 mt--5">No requerido</label>
            </div>

        </div>
        <div class="control wd-5c">
            <div class="">
                <?php
                #saloneros
                $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND (u.id_role = 4 OR u.id_role = 5) AND u.status_user = 'Active'";
                $resultado = mysqli_query($con, $consulta);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="wd-100 is-flex is-flex-direction-row is-size-5">
                        <input type="checkbox" name="waitress[]" id="<?= $row['id_user'] ?>" value="<?= $row['id_user'] ?>" class="is-size-4" required>
                        <label class="ml-20 is-size-5 mt--5"><?= $row['name'] . ' ' . $row['lastname'] ?></label>
                    </div>
                <?php }
                if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Saloneros Disponibles</p>
    
                <?php  } ?>
                <div class="mt-5 wd-100 is-flex is-flex-direction-row is-size-5">
                    <input type="checkbox" name="waitress[]" id="noneWaitress" value="noneWaitress" class="is-size-4" required>
                    <label for="noneWaitress" class="ml-20 is-size-5 mt--5">No requerido</label>
                </div>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="">
                <?php
                #stewards
                $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role = 8 AND u.status_user = 'Active'";
                $resultado = mysqli_query($con, $consulta);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="wd-100 is-flex is-flex-direction-row is-size-5">
                        <input type="checkbox" name="stewards[]" id="<?= $row['id_user'] ?>" value="<?= $row['id_user'] ?>" class="is-size-4" required>
                        <label class="ml-20 is-size-5 mt--5"><?= $row['name'] . ' ' . $row['lastname'] ?></label>
                    </div>
                <?php }
                if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Stewards Disponibles</p>
    
                <?php  } ?>
                <div class="mt-5 wd-100 is-flex is-flex-direction-row is-size-5">
                    <input type="checkbox" name="stewards[]" id="noneStewards" value="noneStewards" class="is-size-4" required>
                    <label for="noneStewards" class="ml-20 is-size-5 mt--5">No requerido</label>
                </div>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="">
                <?php
                #otros
                $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role >= 10 AND u.status_user = 'Active'";
                $resultado = mysqli_query($con, $consulta);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="wd-100 is-flex is-flex-direction-row is-size-5">
                        <input type="checkbox" name="others[]" id="<?= $row['id_user'] ?>" value="<?= $row['id_user'] ?>" class="is-size-4" required>
                        <label class="ml-20 is-size-5 mt--5"><?= $row['name'] . ' ' . $row['lastname'] ?></label>
                    </div>
                <?php }
                if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay más Empleados Disponibles</p>
    
                <?php  } ?>
                <div class="mt-5 wd-100 is-flex is-flex-direction-row is-size-5">
                    <input type="checkbox" name="others[]" id="noneOthers" value="noneOthers" class="is-size-4" required>
                    <label for="noneOthers" class="ml-20 is-size-5 mt--5">No requerido</label>
                </div>
            </div>
        </div>

    </div>
</div>
<hr>
<h1 class="title">Productos</h1>
<br>