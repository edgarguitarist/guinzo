<table class="table" id="table-providers" aria-describedby="tabla">
    <thead>
        <tr>
            <th>EVENTO</th>
            <th>INVITADOS</th>
            <th>EMPLEADOS</th>
            <th>COSTO</th>
            <th>MENU</th>
            <th>PRODUCTOS</th>
            <th>MATERIALES</th>
            <th>TERCEROS</th>
            <th>OTROS</th>
            <th>FECHA DEL EVENTO</th>
            <th>PRECIO</th>
            <th>GANANCIA</th>
            <!-- <th>SUMA TOTAL</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $events_detail = $initial_date ? "SELECT *, (SELECT SUM(price) FROM events_details ev, eventos e WHERE e.id_event_detail = ev.id_event_detail AND e.status = 'Completado' AND date_event BETWEEN '$initial_date' AND '$final_date') AS Total FROM events_details ev, eventos e WHERE e.id_event_detail = ev.id_event_detail AND e.status = 'Completado' AND date_event BETWEEN '$initial_date' AND '$final_date'" : "SELECT *, (SELECT SUM(price) FROM events_details ev, eventos e WHERE e.id_event_detail = ev.id_event_detail AND e.status = 'Completado') AS Total FROM events_details ev, eventos e WHERE e.id_event_detail = ev.id_event_detail AND e.status = 'Completado'";
        $query = mysqli_query($con, $events_detail);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $precio_others = 0;
                $costo = 0;
                $precio_thirds = 0;
                $precio_products = 0;
                $precio_materials  = 0;
                $precio_menus = 0;

                $id_event = $data['id_event'];
                $employees = "SELECT *, (SELECT SUM(price) FROM events_employee WHERE id_event = $id_event) AS COSTO FROM events_employee WHERE id_event = $id_event";
                $query_employees = mysqli_query($con, $employees);
                if ($query_employees) {
                    $result_employees = mysqli_num_rows($query_employees);
                    $costo = mysqli_fetch_array($query_employees);
                    $costo = $costo['COSTO'];
                }

                $providers = "SELECT *, (SELECT SUM(price_event_third) FROM events_thirds WHERE id_event = $id_event) AS PRECIO FROM events_thirds WHERE id_event = $id_event";
                $query_providers = mysqli_query($con, $providers);
                if ($query_providers) {
                    $result_providers = mysqli_num_rows($query_providers);
                    $precio_thirds = mysqli_fetch_array($query_providers);
                    $precio_thirds = $precio_thirds['PRECIO'];
                }

                $products = "SELECT * FROM events_products WHERE id_event = $id_event";
                $query_products = mysqli_query($con, $products);
                if ($query_products) {
                    $result_products = mysqli_num_rows($query_products);
                    $precio_products = $result_products * 3.5;
                }

                $materials = "SELECT * FROM events_materials WHERE id_event = $id_event";
                $query_materials = mysqli_query($con, $materials);
                if ($query_materials) {
                    $result_materials = mysqli_num_rows($query_materials);
                    $precio_materials = $result_materials * 2;
                }

                $menus = "SELECT SUM(amount) AS totalmenu FROM events_menu WHERE id_event = $id_event";
                $query_menus = mysqli_query($con, $menus);
                if ($query_menus) {
                    $precio_menus = mysqli_fetch_array($query_menus);
                    $precio_menus = $precio_menus['totalmenu'] * 5;
                }

                $others = "SELECT SUM(price_otherconcepts) AS price_others FROM events_otherconcepts WHERE id_event = $id_event";
                $query_others = mysqli_query($con, $others);
                if ($query_others) {
                    $precio_others = mysqli_fetch_array($query_others);
                    $precio_others = $precio_others['price_others'];
                }

                $ganancia = $data['price'] - $costo - $precio_thirds - $precio_products - $precio_materials - $precio_menus - $precio_others;
        ?>
                <tr>
                    <td> <?= $data["name_event"] ?></td>
                    <td align="right"> <?= $data["amount_guest"] ?></td>
                    <td align="right"> <?= $result_employees ?></td>
                    <td align="right"> $ <?= number_format($costo, 2) ?></td>
                    <td align="right"> $ <?= number_format($precio_menus, 2) ?></td>
                    <td align="right"> $ <?= number_format($precio_products, 2) ?></td>
                    <td align="right"> $ <?= number_format($precio_materials, 2) ?></td>
                    <td align="right"> $ <?= number_format($precio_thirds, 2) ?></td>
                    <td align="right"> $ <?= number_format($precio_others, 2) ?></td>
                    <td align="center"> <?= $data["date_event"] ?></td>
                    <td align="right"> $ <?= number_format($data["price"], 2) ?></td>
                    <td align="right"> $ <?= number_format($ganancia, 2) ?></td>
                    <!-- <td align="right" > </td> -->
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