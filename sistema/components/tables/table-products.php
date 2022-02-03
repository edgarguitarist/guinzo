<table class="table" id="table-products" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Peso &nbsp;</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Fecha de Llegada</th>
            <th>Hora de Llegada</th>
            <th>Fecha de Expiración</th>
            <th>Proveedor</th>
            <th>Peso Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT *, p.deleted AS del, (SELECT SUM(pr.amount) FROM products pr WHERE pr.name_product = p.name_product AND pr.deleted = 0 GROUP BY name_product) AS peso FROM products p, type_product tp, providers pro WHERE pro.dni_provider = p.id_provider AND tp.id_type_product = p.type_product ORDER BY arrival_date"); // consulta para obtener los proveedores
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";

                $editar_product = "<a class='$default_class_anchors' title='Editar' href='edit-data.php?who=product&id=" . $data['id_product'] . "' ><em class='has-text-info fas fa-user-edit '></em> Editar</a>";
                $detalle_product = "";
                $eliminar_product = $data['del'] == 0 ? "<a class='".$default_class_anchors."' title='Eliminar' href='components/tables/update-data.php?who=products&action=delete&id=" . $data['id_product'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='".$default_class_anchors."' title='Restaurar' href='components/tables/update-data.php?who=products&action=undelete&id=" . $data['id_product'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                $salida = $editar_product . " " . $eliminar_product;
                $fecha = explode(" " , $data['arrival_date']);
        ?>
                <tr>
                    <td> <?= $data["name_product"]; ?></td>
                    <td align="right"> <?= $data["amount"]; ?> lbs.</td>
                    <td> <?= $data["name_type_product"]; ?></td>
                    <td> <?= $data["description_product"]; ?></td>
                    <td align="center"> <?= $fecha[0]; ?></td>
                    <td align="center"> <?= $fecha[1]; ?></td>
                    <td align="center"> <?= $data["expiry_date"]; ?></td>
                    <!-- No Necesario -->
                    <td> <?= $data['name_company']; ?></td>
                    <td align="center" class="wd-fit-content"> <?= $data["peso"] ?> lbs.</td>
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
        $foot = $result > 4 ? "" : "footer2";
?>