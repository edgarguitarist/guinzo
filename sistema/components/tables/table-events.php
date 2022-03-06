<table class="table" id="table-materials" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Nombre Evento</th>
            <th>Tipo</th>
            <th>Descripción &nbsp;</th>
            <th style="width: 300px;">Dirección</th>
            <th>Precio&nbsp;</th>
            <th>N° Invitados</th>
            <!-- <th>Fecha de Solicitud</th> -->
            <th>Fecha del Evento</th>
            <th>Estado &nbsp;</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $consulta = "SELECT * FROM eventos e, events_details ed, type_event te, customers c, users u WHERE e.id_event_detail = ed.id_event_detail AND ed.id_type_event = te.id_type_event AND ed.id_customer = c.id_customer AND c.id_user = u.dni";
        $query = mysqli_query($con, $consulta); // consulta para obtener los proveedores
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                $ver_evento = "<a class='$default_class_anchors' title='Ver' href='view-event.php?id=" . $data['id_event'] . "' ><em class='has-text-primary fas fa-eye '></em> Ver detalles</a>";
                $detalle_material = "";
                $eliminar_material = $data['deleted'] == 0 ? "<a class='" . $default_class_anchors . "' title='Eliminar' href='components/tables/update-data.php?who=events&action=delete&id=" . $data['id_event'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='" . $default_class_anchors . "' title='Restaurar' href='components/tables/update-data.php?who=events&action=undelete&id=" . $data['id_event'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $salida = $ver_evento . " " . $eliminar_material;
                $date_event = $data["date_event"] ? $data["date_event"] : "Por Definir";
                $completed = $data["status"] != 'Completado' ? "<a href='components/tables/update-data.php?who=events&action=completed&id=" . $data['id_event'] . "' class='has-text-success'><em class='fas fa-check'></em> </a>" : "<a href='components/tables/update-data.php?who=events&action=nocompleted&id=" . $data['id_event'] . "' class='has-text-danger'><em class='fas fa-times'></em> </a>";
        ?>
                <tr>
                    <td> <?= $data["name"].' '. $data["lastname"]; ?></td>
                    <td> <?= $data["name_event"]; ?></td>
                    <td> <?= $data["name_type_event"]; ?></td>
                    <td> <?= $data["description_event"]; ?></td>
                    <td> <?= $data['address_event']; ?></td>
                    <td align="right">$ <?= number_format($data["price"],2); ?></td>
                    <td align="right"> <?= $data["amount_guest"]; ?></td>
                    <!-- No Necesario -->
                    <!-- <td> <?= $data['date_request']; ?></td> -->
                    <td align="center" class="wd-fit-content"> <?= $date_event ?></td>
                    <td align="center" class="wd-fit-content"> <?= $data["status"] .' '. $completed ?></td>
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
        $foot = $result > 7 ? "" : "footer2";
?>