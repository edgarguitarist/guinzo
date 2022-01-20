<table class="table" id="example" aria-describedby="tabla">
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
        $query = mysqli_query($con, "SELECT * FROM providerss p, type_company tc WHERE p.type_company = tc.id_type_company and p.deleted = 0"); // consulta para obtener los proveedores
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                
                $editar_provider = "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Editar' href='edit-users.php?who=provider&id=" . $data['dni_provider'] . "' ><em class='has-text-info fas fa-user-edit '></em> Editar</a>";  
                $eliminar_provider = $data['deleted'] == 0 ? "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Eliminar' href='components/tables/update-users.php?who=providers&action=delete&id=" . $data['dni_provider'] . "' ><em class='has-text-danger fas fa-user-times'></em> Eliminar </a>" : "<a class='button is-dark is-outlined is-size-6-desktop is-size-6' title='Restaurar' href='components/tables/update-users.php?who=employees&action=undelete&id=" . $data['dni_provider'] . "' ><em class='has-text-info fas fa-trash-restore'></em> Restaurar </a>";               
                $salida = $editar_provider . " " . $eliminar_provider;
        ?>
                <tr>
                    <td> <?= $data["name"]. ' ' . $data["lastname"] ; ?></td>
                    <td title="Enviar mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Enviar Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <td> <?= $data["name_company"]; ?></td>
                    <td title="Enviar Correo"> <a href="mailto:<?= $data["email_company"]; ?>"><?= $data["email_company"]; ?></a></td>
                    <td title="Llamar"> <a href="tel:<?= $data["tel_company"]; ?>"> <?= $data["tel_company"]; ?></a></td>
                    <!-- No Necesario -->
                    <td title="<?= $data['description_type_company']?>"><?= $data['name_type_company'] ?></td>
                    
                    <td class="wd-fit-content"> <?= $salida  ?> </td>
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