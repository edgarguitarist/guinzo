<table class="table" id="example" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Disponibilidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT *, te.name_type_employee AS tipo FROM users u, employee e, type_employee te WHERE u.id_role BETWEEN 2 AND 5 OR u.id_role = 7 AND e.id_user = u.dni AND te.id_type_employee = e.rank_employee"); // consulta para obtener los empleados
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $status = $data['available'] == 1 && $data['rank_employee'] != 7 ? '<span class="badge has-background-success is-size-6 ph-20 pv-10">Disponible</span>' : '<span class="badge has-background-danger is-size-6 ph-20 pv-10">No Disponible</span>';

                $aceptar_employee  = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Aceptar Empleado' href='components/tables/update-users.php?who=employees&action=accept&id=" . $data['dni'] . "' ><em class='has-text-success fas fa-plus-circle '></em> Aceptar</a>";
                $degradar_employee = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Bajar de Rango' href='components/tables/update-users.php?who=employees&action=downgrade&id=" . $data['dni'] . "' ><em class='has-text-orange fas fa-minus-circle '></em> Bajar</a>";
                $mejorar_employee = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Subir de Rango' href='components/tables/update-users.php?who=employees&action=upgrade&id=" . $data['dni'] . "' ><em class='has-text-success fas fa-plus'></em> Mejorar </a>";
                $eliminar_employee = $data['status_user'] == "Active" ? "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Eliminar Empleado' href='components/tables/update-users.php?who=employees&action=delete&id=" . $data['dni'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Restaurar Empleado' href='components/tables/update-users.php?who=employees&action=undelete&id=" . $data['dni'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                
                if($data['id_type_employee'] == 1){
                    $salida = $mejorar_employee . " " . $eliminar_employee;
                }else if($data['id_type_employee'] > 1 && $data['id_type_employee'] < 6){
                    $salida = $degradar_employee . " " . $mejorar_employee . " " . $eliminar_employee;
                }else if($data['id_type_employee'] == 6){
                    $salida = $degradar_employee . " " . $eliminar_employee;
                }else {
                    $salida = $aceptar_employee . " " . $eliminar_employee;
                }

        ?>
                <tr>
                    <td id="td_path_photo"><img class="modern" src="<?= $data["path_photo"]; ?>" alt="<?= $data["name"]. ' ' . $data["lastname"] ; ?>"></td>
                    <td><?= $data["dni"]; ?></td>
                    <td><?= $data["name"]. ' ' . $data["middleName"] ; ?></td>
                    <td><?= $data["lastname"]. ' ' . $data["secondLastName"]; ?></td>
                    <td title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <!-- No Necesario -->
                    <td title="<?= $data['description_type_employee']?>"><?php echo str_replace('_',' ',$data['tipo']) ?></td>
                    <td><?= $status ?></td>
                    <td class="wd-fit-content"> <?= $salida  ?> </td>
                </tr>
            <?php
            }
            ?>
    </tbody>
</table>
<?php
        } else { ?>
    </tbody>
    </table>
<?php   }
        $foot = $result > 3 ? "" : "footer2";
?>