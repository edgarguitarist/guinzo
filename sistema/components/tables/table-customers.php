<table class="table" id="table-customers" aria-describedby="tabla">
    <thead>
        <tr>
            <th id="path_photo">Foto</th>
            <th id="name">Nombre</th>
            <th id="lastname">Apellido</th>
            <th id="phone">Celular</th>
            <th>Correo</th>
            <th>Tipo de Cliente</th>
            <th id="eventos">Eventos</th>
            <th class="wd-fit-content">Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM users us, customers cu, type_customer tc WHERE us.id_role = 6 AND id_user = us.dni AND tc.id_type_customer = cu.type_customer"); //
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                $default_class_anchors2 = "button is-dark is-outlined is-size-10  mt--7";
                $eliminar_customer = $data['status_user'] == "Active" ? "<a class='$default_class_anchors' title='Eliminar Cliente' href='components/tables/update-data.php?who=customers&action=delete&id=" . $data['dni'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='$default_class_anchors' title='Eliminar Cliente' href='components/tables/update-data.php?who=customers&action=undelete&id=" . $data['dni'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $editar_customer = "<a class='$default_class_anchors' title='Editar Cliente' href='edit-data.php?who=customers&id=" . $data['dni'] . "' ><em class='has-text-primary fas fa-edit'></em> Editar </a>";
                $degradar_customer2 = "<a class='$default_class_anchors2' title='Bajar de Rango' href='components/tables/update-data.php?who=customers&action=downgrade&id=" . $data['dni'] . "' ><em class='m-auto has-text-orange fas fa-minus-circle'></em></a>";
                $mejorar_customer2 = "<a class='$default_class_anchors2' title='Subir de Rango' href='components/tables/update-data.php?who=customers&action=upgrade&id=" . $data['dni'] . "' ><em class='m-auto has-text-success fas fa-plus'></em></a>";

                if ($data['id_type_customer'] == 1) {
                    $salida = $editar_customer . " " . $eliminar_customer;
                    $testa = "<b>" . $data["name_type_customer"] . "</b> " . $mejorar_customer2;
                } else if ($data['id_type_customer'] > 1 && $data['id_type_customer'] < 5) {
                    $salida = $editar_customer . " " . $eliminar_customer;
                    $testa = "<b>" . $data["name_type_customer"] . "</b> " . $degradar_customer2 . " " . $mejorar_customer2;
                } else {
                    $salida = $editar_customer . " " . $eliminar_customer;
                    $testa = " <b>" . $data["name_type_customer"] . "</b> " . $degradar_customer2;
                }
                $dni = $data['dni'];
                $query_events = "SELECT name_event FROM users us INNER JOIN customers cu ON us.dni = cu.id_user LEFT JOIN events_details ed ON ed.id_customer = cu.id_customer INNER JOIN eventos e ON e.id_event_detail = ed.id_event_detail AND e.status != 'Completado' WHERE us.dni = '$dni'";
                $result_events = mysqli_query($con, $query_events);
                $events = mysqli_num_rows($result_events);

                $events_customer = [];
                while ($events = mysqli_fetch_array($result_events)) {
                    array_push($events_customer, $events['name_event']);
                }
                $length = count($events_customer);
                $events_customer = $length > 0 ? $events_customer[$length - 1] : "Sin Eventos";
        ?>
                <tr>
                    <td id="td_path_photo"><img class="modern" src="<?= $data["path_photo"]; ?>" alt="<?= $data["name"] . ' ' . $data["lastname"]; ?>"></td>
                    <td id="td_name"><?= $data["name"]; ?></td>
                    <td id="td_lastname"><?= $data["lastname"]; ?></td>
                    <td id="td_phone" title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td id="td_email" title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <td title="<?= $data['description_type_customer'] ?>"> <?= $testa; ?></td>
                    <td id="td_eventos"><?= $events_customer; ?></td>
                    <td align="center" class="wd-fit-content"> <?= $salida; ?> </td>
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