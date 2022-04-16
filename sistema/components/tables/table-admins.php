<table class="table" id="table-admins" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM users u INNER JOIN roles r ON u.id_role = r.id_role WHERE u.id_role = 1"); 
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                               
                $default_class_anchors = "button is-dark is-outlined is-size-6-desktop is-size-6 mt--7";
                $default_class_anchors2 = "button is-dark is-outlined is-size-10 mt--7";
                
                $quitar_admin = $data['dni'] != "0952030690" ? "<a class='$default_class_anchors' title='Eliminar Administrador' href='components/tables/update-data.php?who=admins&action=delete&id=" . $data['dni'] . "' ><em class='has-text-danger fas fa-user-times' ></em> Eliminar </a>" : "<button class='$default_class_anchors' title='No Disponible' ><em class='has-text-danger fas fa-user-times' disable></em> Eliminar </button>";                
                
                $salida = $quitar_admin;
                
        ?>
                <tr>
                    <td id="td_path_photo"><img class="modern" src="<?= $data["path_photo"]; ?>" alt="<?= $data["name"]. ' ' . $data["lastname"] ; ?>"></td>
                    <td><?= $data["dni"]; ?></td>
                    <td><?= $data["name"]. ' ' . $data["lastname"] ; ?></td>
                    <td title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>                   
                    
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