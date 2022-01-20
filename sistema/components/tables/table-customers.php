<table class="table" id="example" aria-describedby="tabla">
    <thead>
        <tr>
            <th id="path_photo">Foto</th>
            <th id="name">Nombre</th>
            <th id="lastname">Apellido</th>
            <th id="phone">Celular</th>
            <th id="email">Correo</th>
            <th id="type_customer">Tipo de Cliente</th>
            <th id="eventos">Eventos Activo</th>
            <th id="actions" class="wd-fit-content">Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM users us, customers cu, type_customer tc WHERE us.id_role = 6 AND id_user = us.dni AND tc.id_type_customer = cu.type_customer"); //
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {

                $degradar_customer = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Bajar de Rango' href='components/tables/update-users.php?who=customers&action=downgrade&id=" . $data['dni'] . "' ><em class='has-text-orange fas fa-minus-circle '></em> Bajar</a>";
                $mejorar_customer = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Subir de Rango' href='components/tables/update-users.php?who=customers&action=upgrade&id=" . $data['dni'] . "' ><em class='has-text-success fas fa-plus'></em> Mejorar </a>";
                $eliminar_customer = $data['status_user'] == "Active" ? "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Eliminar Cliente' href='components/tables/update-users.php?who=customers&action=delete&id=" . $data['dni'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Eliminar Cliente' href='components/tables/update-users.php?who=customers&action=undelete&id=" . $data['dni'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";
                
                if($data['id_type_customer'] == 1){
                    $salida = $mejorar_customer . " " . $eliminar_customer;
                }else if($data['id_type_customer'] > 1 && $data['id_type_customer'] < 5){
                    $salida = $degradar_customer . " " . $mejorar_customer . " " . $eliminar_customer;
                }else{
                    $salida = $degradar_customer . " " . $eliminar_customer;
                }

        ?>
                <tr>
                    <td id="td_path_photo"><img class="modern" src="<?= $data["path_photo"]; ?>" alt="<?= $data["name"]. ' ' . $data["lastname"] ; ?>"></td>
                    <td id="td_name" ><?= $data["name"]; ?></td>
                    <td id="td_lastname"><?= $data["lastname"]; ?></td>
                    <td id="td_phone" title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td id="td_email" title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <td id="td_type_customer" title="<?= $data['description_type_customer'] ?>"> <?= $data["name_type_customer"] ?></td>
                    <td id="td_eventos">Ninguno</td>
                    <td id="td_actions" class="wd-fit-content"> <?= $salida;  ?> </td>
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