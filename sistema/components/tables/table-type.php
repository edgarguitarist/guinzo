<table class="table" id="table-types" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $table = $types[$type]["table"];
        $query = mysqli_query($con, "SELECT * FROM " . $table);
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";

                $editar_menu = "<a class='$default_class_anchors' title='Editar' href='edit-data.php?who=types&type=$type&id=" . $data[0] . "' ><em class='has-text-primary fas fa-edit '></em> Editar</a>";
                $eliminar_menu = $data['status'] == 1 ? "<a class='$default_class_anchors' title='Eliminar' href='components/tables/update-data.php?who=types&type=$type&action=delete&id=" . $data[0] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='$default_class_anchors' title='Restaurar' href='components/tables/update-data.php?who=types&type=$type&action=undelete&id=" . $data[0] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $salida = $editar_menu . " " . $eliminar_menu;
                $estado = $data[3] == 1 ? "<span class='b-bolder has-text-info'>Activo</span>" : "<span class='b-bolder has-text-danger'>Inactivo</span>";
        ?>
                <tr>
                    <td style="width:20%;"> <?= $data[1]; ?></td>
                    <td style="width:50%;"> <?= $data[2]; ?></td>
                    <td style="width:10%;" align="center"> <?= $estado; ?></td>
                    <td style="width:20%;" align="center" class="wd-fit-content"> <?= $salida  ?> </td>
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