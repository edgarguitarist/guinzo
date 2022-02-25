<table class="table" id="table-menus" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM menus m, type_menu tm WHERE m.type_menu = tm.id_type_menu");
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                
                $editar_menu = "<a class='$default_class_anchors' title='Editar' href='edit-data.php?who=menus&id=" . $data['id_menu'] . "' ><em class='has-text-primary fas fa-edit '></em> Editar</a>";
                $eliminar_menu = $data['deleted'] == 0 ? "<a class='".$default_class_anchors."' title='Eliminar' href='components/tables/update-data.php?who=menus&action=delete&id=" . $data['id_menu'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='".$default_class_anchors."' title='Restaurar' href='components/tables/update-data.php?who=menus&action=undelete&id=" . $data['id_menu'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $salida = $editar_menu . " " . $eliminar_menu;
        ?>
                <tr>
                    <td> <img class="modern" src="<?= $data["photo_menu"]; ?>" alt="<?= $data["name_menu"] ; ?>"></td>
                    <td> <?= $data["name_menu"]; ?></td>
                    <td> <?= $data["description_menu"]; ?></td>
                    <td> <?= $data["name_type_menu"]; ?></td>
                    <td align="right">$ <?= $data["price_menu"]; ?></td>
                   
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