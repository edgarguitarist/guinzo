<table class="table" id="table-employees" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Ciudad</th>
            <th>Curriculum</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT *, te.name_type_employee AS tipo, u.name AS nombre, r.name_role AS rolempleado FROM users u, employee e, type_employee te, roles r WHERE u.id_role = 7 AND e.id_user = u.dni AND te.id_type_employee = e.rank_employee AND u.id_role = r.id_role"); // consulta para obtener los empleados
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $status = $data['available'] == 1 && $data['rank_employee'] != 7 ? '<span class="badge has-background-success is-size-6 ph-20 pv-10">Disponible</span><b hidden>Disponible</b>' : '<span class="badge has-background-danger is-size-6 ph-20 pv-10">No Disponible</span><b hidden>No Disponible</b>';
                
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                $default_class_anchors2 = "button is-dark is-outlined is-size-10 mt--7";

                $aceptar_employee = "<a class='$default_class_anchors' title='Aceptar Empleado' href='components/tables/update-data.php?who=employees&action=accept&id=" . $data['dni'] . "' ><em class='has-text-success fas fa-plus-circle '></em> Aceptar</a>";
                $degradar_employee = "<a class='$default_class_anchors' title='Bajar de Rango' href='components/tables/update-data.php?who=employees&action=downgrade&id=" . $data['dni'] . "' ><em class='has-text-orange fas fa-minus-circle '></em> Bajar </a>";
                $mejorar_employee = "<a class='$default_class_anchors' title='Subir de Rango' href='components/tables/update-data.php?who=employees&action=upgrade&id=" . $data['dni'] . "' ><em class='has-text-success fas fa-plus'></em> Mejorar </a>";
                $editar_employee = "<a class='$default_class_anchors' title='Editar Empleado' href='edit-data.php?who=employees&id=" . $data['dni'] . "' ><em class='has-text-primary fas fa-edit'></em> Editar </a>";
                $eliminar_employee = $data['status_user'] == "Active" ? "<a class='$default_class_anchors' title='Eliminar Empleado' href='components/tables/update-data.php?who=employees&action=delete&id=" . $data['dni'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='$default_class_anchors' title='Restaurar Empleado' href='components/tables/update-data.php?who=employees&action=undelete&id=" . $data['dni'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                
                $degradar_employee2 = "<a class='$default_class_anchors2' title='Bajar de Rango' href='components/tables/update-data.php?who=employees&action=downgrade&id=" . $data['dni'] . "' ><em class='m-auto has-text-orange fas fa-minus-circle '></em></a>";
                $mejorar_employee2 = "<a class='$default_class_anchors2' title='Subir de Rango' href='components/tables/update-data.php?who=employees&action=upgrade&id=" . $data['dni'] . "' ><em class='m-auto has-text-success fas fa-plus'></em></a>";
                
                
                    $testa = "<b>" . $data["city"] . "</b> ";
                    $salida = $aceptar_employee . " " . $eliminar_employee;
                $curri = "<a class='$default_class_anchors' title='Ver Curriculum' href='" . $data['curriculum'] . "' target='_blank' ><em class='has-text-info fas fa-eye'></em> Ver Curriculum </a>";
        ?>
                <tr>
                    <td id="td_path_photo"><img class="modern" src="<?= $data["path_photo"]; ?>" alt="<?= $data["nombre"]. ' ' . $data["lastname"] ; ?>"></td>
                    <td><?= $data["dni"]; ?></td>
                    <td><?= $data["nombre"]. ' ' . $data["lastname"] ; ?></td>
                    <td title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <!-- No Necesario -->
                    <td align="center" title="<?= $data['description_type_employee']?>"><?= $testa; ?></td>
                    <td align="center"><b><?= $curri ?></b></td>
                    <td align="center" class="wd-fit-content"> <?= $salida  ?> </td>
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
        $foot = $result > 8 ? "" : "footer2";
?>