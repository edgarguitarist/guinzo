<table class="table" id="example" aria-describedby="tabla">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Ranking</th>
            <th>Disponible</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM users WHERE id_role BETWEEN 2 AND 5 AND status_user = 'Active'"); // consulta para obtener los empleados
        mysqli_close($con);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
        ?>
                <tr>
                    <td><img src="<?= $data["path_photo"]; ?>" alt="photo-custumer"></td>
                    <td><?= $data["dni"]; ?></td>
                    <td><?= $data["name"]; ?></td>
                    <td><?= $data["lastname"]; ?></td>
                    <td title="Escribir Mensaje por Whatsapp"> <a target="_blank" href="https://api.whatsapp.com/send?phone=593<?= substr($data['phone'], 1); ?>"> <?= $data["phone"]; ?></a></td>
                    <td title="Escribir un Correo"> <a href="mailto:<?= $data["email"]; ?>"><?= $data["email"]; ?></a></td>
                    <!-- <td><?= $data["birthday"]; ?></td> -->
                    <!-- No Necesario -->
                    <td></td>
                    <td></td>
                    <td></td>
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