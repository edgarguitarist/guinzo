<?php $who = $who ?? ''; ?>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Cliente *</label>
        <label class="label has-text-left wd-4c">Evento *</label>
        <label class="label has-text-left wd-4c">Tipo *</label>
        <label class="label has-text-left wd-10">Numero de invitados *</label>
        <label class="label has-text-left wd-10">Precio *</label>
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
            <input id="price_total" name="price_total" type="hidden" required>
            <input id="precio" disabled name="precio" class="input solo-precio" type="number" placeholder="0" required>
            <p>&nbsp;</p>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-2c">Descripción *</label>
        <label class="label has-text-left wd-custom">Dirección *</label>
        <label class="label has-text-left wd-10">Lugar*</label>
    </div>
    <div class="field-body forms_row">
        <div class="control wd-2c">
            <input id="description" name="description" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="40" type="text" placeholder="Descripción" value="" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-custom">
            <input id="address" name="address" class="input" onkeyup="checkLength(this, false, 10, false)" minlength="10" maxlength="70" type="text" placeholder="Dirección" value="" required>
            <p>&nbsp;</p>
        </div>
        <div class="control wd-10">
            <div class="is-flex mt-7">
                <input id="place" name="place" class="input" onkeyup="checkLength(this, false, 3, false)" minlength="3" maxlength="50" type="text" placeholder="Lugar" value="" required>
                <p>&nbsp;</p>
            </div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>

<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-30">Fecha de Solicitud *</label>
        <label class="label has-text-left wd-30">Fecha del Evento *</label>
        <label class="label has-text-left wd-30">Fecha de Clausura *</label>
    </div>

    <div class="field-body forms_row">
        <div class="control wd-30">
            <div class="wd-100 ">
                <input title="Fecha de Solicitud" type="datetime-local" id="date_request" name="date_request" class="input wd-100" value="<?= $hoy_extended ?>" required />
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
        <label class="label has-text-left wd-5c">Capitanes Disponibles *</label>
        <label class="label has-text-left wd-5c">Cocineros Disponibles *</label>
        <label class="label has-text-left wd-5c">Saloneros Disponibles *</label>
        <label class="label has-text-left wd-5c">Stewards *</label>
        <label class="label has-text-left wd-5c">Otros *</label>

    </div>
    <div class="field-body forms_row2">
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="capitanes" id="capitanes" onchange="addCheckfromSelect(this, 'captains')">
                    <option value="">Seleccione un Capitán</option>
                    <?php
                    #TODO: cargar capitanes disponibles según la fecha y hora seleccionada del evento
                    #capitanes
                    $consultaCapitan = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role = 2 AND u.status_user = 'Active' AND e.rank_employee != 7";
                    $resultado = mysqli_query($con, $consultaCapitan);

                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['name'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="captains" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->
                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Capitanes Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="cocineros" id="cocineros" onchange="addCheckfromSelect(this, 'chefs')">
                    <option value="">Seleccione un Chef</option>
                    <?php
                    #cocineros
                    $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user  AND (u.id_role = 3 OR u.id_role = 9) AND u.status_user = 'Active' AND e.rank_employee != 7";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['name'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="chefs" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="wd-100 has-text-left b-bolder has-text-danger is-size-6">No hay Chefs Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="saloneros" id="saloneros" onchange="addCheckfromSelect(this, 'waitress')">
                    <option value="">Seleccione un Salonero</option>
                    <?php
                    #saloneros
                    $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND (u.id_role = 4 OR u.id_role = 5) AND u.status_user = 'Active' AND e.rank_employee != 7";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['name'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="waitress" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Saloneros Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="stiward" id="stiward" onchange="addCheckfromSelect(this, 'stewards')">
                    <option value="">Seleccione un Stewards</option>
                    <?php
                    #stewards
                    $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role = 8 AND u.status_user = 'Active' AND e.rank_employee != 7";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['name'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="stewards" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Stewards Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="otros" id="otros" onchange="addCheckfromSelect(this, 'others')">
                    <option value="">Seleccione un Empleado</option>
                    <?php
                    #otros
                    $consulta = "SELECT * FROM users u, employee e WHERE u.dni = e.id_user AND u.id_role >= 10 AND u.status_user = 'Active' AND e.rank_employee != 7";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['id_user']; ?>"><?php echo $row['name'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">

                <div id="others" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay otros Empleados Disponibles</p>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Menús</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Entrada *</label>
        <label class="label has-text-left wd-4c">Plato Fuerte *</label>
        <label class="label has-text-left wd-4c">Postre *</label>
        <label class="label has-text-left wd-4c">Otros *</label>
    </div>
    <div class="field-body forms_row2">
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="entradas" id="entradas" onchange="addCheckfromSelect(this, 'entrances', true)">
                    <option value="">Seleccione la Entrada</option>
                    <?php
                    #entradas
                    $consultaEntradas = "SELECT * FROM menus m, type_menu tm WHERE m.type_menu = tm.id_type_menu AND m.type_menu = 1 AND m.deleted = 0";
                    $resultado = mysqli_query($con, $consultaEntradas);

                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_menu']; ?>"><?php echo $row['name_menu']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="entrances" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Entradas Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="fuertes" id="fuertes" onchange="addCheckfromSelect(this, 'principals', true)">
                    <option value="">Seleccione el Plato Fuerte</option>
                    <?php
                    #plato fuerte
                    $consulta = "SELECT * FROM menus m, type_menu tm WHERE m.type_menu = tm.id_type_menu AND m.type_menu = 2 AND m.deleted = 0";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_menu']; ?>"><?php echo $row['name_menu']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="principals" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="wd-100 has-text-left b-bolder has-text-danger is-size-6">No hay Platos Fuertes Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="postres" id="postres" onchange="addCheckfromSelect(this, 'desserts', true)">
                    <option value="">Seleccione el Postre</option>
                    <?php
                    #bebidas
                    $consulta = "SELECT * FROM menus m, type_menu tm WHERE m.type_menu = tm.id_type_menu AND m.type_menu = 3 AND m.deleted = 0";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_menu']; ?>"><?php echo $row['name_menu']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="desserts" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Postres Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="otrosMenus" id="otrosMenus" onchange="addCheckfromSelect(this, 'othermenus', true)">
                    <option value="">Seleccione otro Menú</option>
                    <?php
                    #otherMenu
                    $consulta = "SELECT * FROM menus m, type_menu tm WHERE m.type_menu = tm.id_type_menu AND m.type_menu > 3 AND m.deleted = 0";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_menu']; ?>"><?php echo $row['name_menu']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="othermenus" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay otros Menús Disponibles</p>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Productos</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-4c">Carnes *</label>
        <label class="label has-text-left wd-4c">Frutas y Verduras *</label>
        <label class="label has-text-left wd-4c">Bebidas *</label>
        <label class="label has-text-left wd-4c">Otros *</label>
    </div>
    <div class="field-body forms_row2">
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="carnes" id="carnes" onchange="addCheckfromSelect(this, 'meats', true)">
                    <option value="">Seleccione las Carnes</option>
                    <?php
                    #carnes
                    #tomar el total y hacer un check de las cantidades totales disponibles
                    $consultaCarnes = "SELECT *, SUM(amount) AS total FROM products WHERE type_product = 1 GROUP BY name_product";
                    $resultado = mysqli_query($con, $consultaCarnes);

                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_product']; ?>"><?php echo $row['name_product']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="meats" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Carnes Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="frutaveges" id="frutaveges" onchange="addCheckfromSelect(this, 'fruitsveges', true)">
                    <option value="">Seleccione las Frutas o Verduras</option>
                    <?php
                    #frutas y verduras
                    $consulta = "SELECT *, SUM(amount) AS total FROM products WHERE (type_product = 2 OR type_product = 5) GROUP BY name_product";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_product']; ?>"><?php echo $row['name_product']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="fruitsveges" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="wd-100 has-text-left b-bolder has-text-danger is-size-6">No hay Frutas o Vegetales Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="bebidas" id="bebidas" onchange="addCheckfromSelect(this, 'drinks', true)">
                    <option value="">Seleccione las bebidas</option>
                    <?php
                    #bebidas
                    $consulta = "SELECT *, SUM(amount) AS total FROM products WHERE (type_product = 3 OR type_product = 4) GROUP BY name_product";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_product']; ?>"><?php echo $row['name_product']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="drinks" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Bebidas Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-4c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="otrosProductos" id="otrosProductos" onchange="addCheckfromSelect(this, 'otherproducts', true)">
                    <option value="">Seleccione un Producto</option>
                    <?php
                    #otherProducts
                    $consulta = "SELECT *, SUM(amount) AS total FROM products WHERE (type_product = 3 OR type_product = 4) GROUP BY name_product";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_product']; ?>"><?php echo $row['name_product']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="otherproducts" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay otros Productos Disponibles</p>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Materiales</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-5c">Cocina *</label>
        <label class="label has-text-left wd-5c">Cubertería *</label>
        <label class="label has-text-left wd-5c">Bar *</label>
        <label class="label has-text-left wd-5c">Decoración *</label>
        <label class="label has-text-left wd-5c">Otros *</label>
    </div>
    <div class="field-body forms_row2">
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="cocinas" id="cocinas" onchange="addCheckfromSelect(this, 'kitchen', true)">
                    <option value="">Seleccione el mat. de Cocina</option>
                    <?php
                    #cocina
                    $consultaCarnes = "SELECT *, SUM(amount) AS total FROM materials WHERE type_material = 1 GROUP BY name_material";
                    $resultado = mysqli_query($con, $consultaCarnes);

                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_material']; ?>"><?php echo $row['name_material']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="kitchen" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Material Disponible</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="cuberterias" id="cuberterias" onchange="addCheckfromSelect(this, 'cuberteria', true)">
                    <option value="">Seleccione el mat. de Cubertería</option>
                    <?php
                    #cuberteria
                    $consulta = "SELECT *, SUM(amount) AS total FROM materials WHERE (type_material = 4) GROUP BY name_material";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_material']; ?>"><?php echo $row['name_material']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="cuberteria" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Material Disponible</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="bares" id="bares" onchange="addCheckfromSelect(this, 'bar', true)">
                    <option value="">Seleccione el mat. de Bar</option>
                    <?php
                    #bar
                    $consulta = "SELECT *, SUM(amount) AS total FROM materials WHERE (type_material = 2) GROUP BY name_material";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_material']; ?>"><?php echo $row['name_material']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="bar" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="wd-100 has-text-left b-bolder has-text-danger is-size-6">No hay Material Disponible</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="decoracion" id="decoracion" onchange="addCheckfromSelect(this, 'decoration', true)">
                    <option value="">Seleccione el mat. de Decoración</option>
                    <?php
                    #bebidas
                    $consulta = "SELECT *, SUM(amount) AS total FROM materials WHERE (type_material = 3) GROUP BY name_material";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_material']; ?>"><?php echo $row['name_material']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="decoration" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Material Disponible</p>
                <?php  } ?>
            </div>
        </div>

        <div class="control wd-5c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="otrosMateriales" id="otrosMateriales" onchange="addCheckfromSelect(this, 'othermaterials', true)">
                    <option value="">Seleccione un Material</option>
                    <?php
                    #otherProducts
                    $consulta = "SELECT *, SUM(amount) AS total FROM materials WHERE (type_material >= 5) GROUP BY name_material";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['name_material']; ?>"><?php echo $row['name_material']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="othermaterials" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay otros Materiales Disponible</p>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Proveedores</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-3c">Transporte *</label>
        <label class="label has-text-left wd-3c">Buffet *</label>
        <label class="label has-text-left wd-3c">Otros *</label>
    </div>
    <div class="field-body forms_row2">
        <div class="control wd-3c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="transportes" id="transportes" onchange="addCheckfromSelect(this, 'transporte', true, true, 'Precio')">
                    <option value="">Seleccione Proveedor</option>
                    <?php
                    #transporte
                    $consultaCarnes = "SELECT * FROM providers WHERE type_company = 5 ORDER BY lastname_provider";
                    $resultado = mysqli_query($con, $consultaCarnes);

                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['dni_provider']; ?>"><?php echo $row['lastname_provider'] . ' ' . $row['name_provider'] . ' - ' . $row['name_company']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="transporte" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Proveedor Disponible</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-3c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="buffets" id="buffets" onchange="addCheckfromSelect(this, 'buffet', true)">
                    <option value="">Seleccione Proveedor</option>
                    <?php
                    #buffet
                    $consulta = "SELECT * FROM providers WHERE type_company = 4 ORDER BY lastname_provider";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['dni_provider']; ?>"><?php echo $row['lastname_provider'] . ' ' . $row['name_provider'] . ' - ' . $row['name_company']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="buffet" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay Bebidas Disponibles</p>
                <?php  } ?>
            </div>
        </div>
        <div class="control wd-3c">
            <div class="select is-fullwidth">
                <select class="wd-100 input" name="otrosProveedores" id="otrosProveedores" onchange="addCheckfromSelect(this, 'otherproviders', true)">
                    <option value="">Seleccione un Proveedor</option>
                    <?php
                    #otherProducts
                    $consulta = "SELECT * FROM providers WHERE type_company = 4 ORDER BY lastname_provider";
                    $resultado = mysqli_query($con, $consulta);
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $row['dni_provider']; ?>"><?php echo $row['lastname_provider'] . ' ' . $row['name_provider'] . ' - ' . $row['name_company']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-20">
                <div id="otherproviders" class="mt-5 wd-100 is-size-5 has-text-left">
                    <!-- Aquí se muestra lo seleccionado -->
                </div>
                <?php if ($resultado->num_rows == 0) { ?>
                    <p class="has-text-left b-bolder has-text-danger is-size-6">No hay otros Productos Disponibles</p>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>
<hr>
<h1 class="title">Otros Conceptos</h1>
<br>
<div class="field">
    <div class="forms_row">
        <label class="label has-text-left wd-100"><a class=" button is-dark is-outlined is-size-6-desktop is-size-4" onclick="addOtherConcepts()">Agregar OTROS CONCEPTOS</a></label>
    </div>
    <div class="field-body forms_row2">
        <div class="control wd-100">
            <div class="mt-20">
                <div id="otherConcepts" class="mt-5 wd-100 columns is-multiline">
                    <!-- Aquí se muestra lo seleccionado -->

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>