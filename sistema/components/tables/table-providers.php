<table class="table" id="table-providers" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Empresa</th>
            <th>Correo Empresa</th>
            <th>Tel. Empresa</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM providers p, type_company tc WHERE p.type_company = tc.id_type_company"); // consulta para obtener los proveedores
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
            
                $editar_provider = "<a class='$default_class_anchors' title='Editar' href='edit-data.php?who=providers&id=" . $data['dni_provider'] . "' ><em class='has-text-primary fas fa-edit '></em> Editar</a>";  
                $eliminar_provider = $data['deleted'] == 0 ? "<a class='$default_class_anchors' title='Eliminar' href='components/tables/update-data.php?who=providers&action=delete&id=" . $data['dni_provider'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='$default_class_anchors' title='Restaurar' href='components/tables/update-data.php?who=providers&action=undelete&id=" . $data['dni_provider'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";               
                $salida = $editar_provider . " " . $eliminar_provider;
                $status = $data['status'] == "0" ? 'No Disponible' : ''; 
                $status_styles = $data['status'] == "0" ? 'color: red; text-weigth:bold;' : ''; 
                $status_row_styles = $data['status'] == "0" ? 'background-color: mistyrose;' : '';
        ?>
                <tr style="<?= $status_row_styles ?>">
                    <td> <?= $data["name_provider"]. ' ' . $data["lastname_provider"] ; ?></td>
                    <td align="right" title="Enviar mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Enviar Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <td><b> <?= $data["name_company"]; ?></b></td>
                    <td title="Enviar Correo"> <a href="mailto:<?= $data["email_company"]; ?>"><?= $data["email_company"]; ?></a></td>
                    <td align="right" title="Llamar"> <a href="tel:<?= $data["tel_company"]; ?>"> <?= $data["tel_company"]; ?></a></td>
                    <!-- No Necesario -->
                    <td title="<?= $status ?>" style="<?= $status_styles ?>"><b><?= $data['name_type_company'] ?></b></td>       
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