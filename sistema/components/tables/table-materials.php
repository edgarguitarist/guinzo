<table class="table" id="table-materials" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad &nbsp;</th>
            <th>Precio &nbsp;</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Fecha de Llegada</th>
            <th>Fecha de Expiración</th>
            <th>Proveedor</th>
            <th>Total &nbsp;</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT *, p.deleted AS del, (SELECT SUM(pr.amount) FROM materials pr WHERE pr.name_material = p.name_material AND pr.deleted = 0 GROUP BY name_material) AS peso FROM materials p, type_material tp, providers pro WHERE pro.dni_provider = p.id_provider AND tp.id_type_material = p.type_material ORDER BY arrival_date_material"); // consulta para obtener los proveedores
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                $editar_material = "<a class='$default_class_anchors' title='Editar' href='edit-data.php?who=materials&id=" . $data['id_material'] . "' ><em class='has-text-primary fas fa-edit '></em> Editar</a>";
                $detalle_material = "";
                $eliminar_material = $data['del'] == 0 ? "<a class='".$default_class_anchors."' title='Eliminar' href='components/tables/update-data.php?who=materials&action=delete&id=" . $data['id_material'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='".$default_class_anchors."' title='Restaurar' href='components/tables/update-data.php?who=materials&action=undelete&id=" . $data['id_material'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $salida = $editar_material . " " . $eliminar_material;
                $fecha = explode(" " , $data['arrival_date_material']);
        ?>
                <tr>
                    <td> <?= $data["name_material"]; ?></td>
                    <td align="right"> <?= $data["amount"]; ?></td>
                    <td align="right">$ <?= number_format($data["price"],2); ?></td>
                    <td> <?= $data["name_type_material"]; ?></td>
                    <td> <?= $data["description_material"]; ?></td>
                    <td align="center"> <?= $data['arrival_date_material']; ?></td>
                    <td align="center"> <?= $data["expiry_date_material"]; ?></td>
                    <!-- No Necesario -->
                    <td> <?= $data['name_company']; ?></td>
                    <td align="center" class="wd-fit-content"> <?= $data["peso"] ?></td>
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