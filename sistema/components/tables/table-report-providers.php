<table class="table" id="table-providers" aria-describedby="tabla">
    <thead>
        <tr>
            <th>PROVEEDOR</th>
            <th>EMPRESA</th>
            <th>TIPO</th>
            <th>MATERIAL/PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>DESCRIPCIÓN</th>
            <th>FECHA DE ADQUISICIÓN</th>
            <th>FECHA LIMITE DE USO</th>
            <th>PRECIO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $products_detail = $initial_date ?
            "SELECT * FROM providers pro INNER JOIN products p on p.id_provider = pro.dni_provider and p.arrival_date BETWEEN '$initial_date' AND '$final_date' INNER JOIN type_amount ta ON ta.id_type_amount = p.type_amount INNER JOIN type_product tp ON tp.id_type_product = p.type_product
            WHERE pro.dni_provider LIKE '%$provider%'
            ORDER BY pro.dni_provider ASC" :
            "SELECT * FROM providers pro INNER JOIN products p on p.id_provider = pro.dni_provider INNER JOIN type_amount ta ON ta.id_type_amount = p.type_amount INNER JOIN type_product tp ON tp.id_type_product = p.type_product
            ORDER BY pro.dni_provider ASC";
        $query = mysqli_query($con, $products_detail);
        $result = mysqli_num_rows($query);

        $materials_detail = $initial_date ?
            "SELECT * FROM providers pro INNER JOIN materials m on m.id_provider = pro.dni_provider and m.arrival_date_material BETWEEN '$initial_date' AND '$final_date' INNER JOIN type_material tm ON tm.id_type_material = m.type_material
            WHERE pro.dni_provider LIKE '%$provider%'
            ORDER BY pro.dni_provider ASC" :
            "SELECT * FROM providers pro INNER JOIN materials m on m.id_provider = pro.dni_provider INNER JOIN type_material tm ON tm.id_type_material = m.type_material
            ORDER BY pro.dni_provider ASC";
        $query2 = mysqli_query($con, $materials_detail);
        $result2 = mysqli_num_rows($query2);

        if ($result > 0 || $result2 > 0) {
            while ($data = mysqli_fetch_array($query)) {
        ?>
                <tr>
                    <td> <?= $data["name_provider"] . ' ' . $data["lastname_provider"] ?></td>
                    <td align="right"> <?= $data["name_company"] ?></td>
                    <td align="center"> PRODUCTO</td>
                    <td align="right"> <?= $data["name_product"] ?></td>
                    <td align="right"> <?= $data["amount"] ?></td>
                    <td align="right"> <?= $data["description_product"] ?></td>
                    <td align="right"> <?= $data["arrival_date"] ?></td>
                    <td align="right"> <?= $data["expiry_date"] ?></td>
                    <td align="right"> $<?= number_format($data["price"], 2) ?></td>
                </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($query2)) {
            ?>
                <tr>
                    <td> <?= $data["name_provider"] . ' ' . $data["lastname_provider"] ?></td>
                    <td align="right"> <?= $data["name_company"] ?></td>
                    <td align="center"> MATERIAL</td>
                    <td align="right"> <?= $data["name_material"] ?></td>
                    <td align="right"> <?= $data["amount"] ?></td>
                    <td align="right"> <?= $data["description_material"] ?></td>
                    <td align="right"> <?= $data["arrival_date_material"] ?></td>
                    <td align="right"> <?= $data["expiry_date_material"] ?></td>
                    <td align="right"> $<?= number_format($data["price"], 2) ?></td>
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
<br><br><br>
<div class="wd-90">
    <h1 class="title">
        GANANCIA TOTAL:
        <span id="sumatoria"></span>
    </h1>
</div>
<hr><br><br><br>
<script>
    var columnPrecio = 8;
</script>