<table class="table" id="table-providers" aria-describedby="tabla">
    <thead>
        <tr>
            <th>CLIENTE</th>
            <th>EVENTO</th>
            <th>TIPO DE EVENTO</th>
            <th>INVITADOS</th>
            <th>LUGAR</th>
            <th>FECHA</th>
            <th>COSTO</th>
            <th>ESTADO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $events_detail = $initial_date ?
            "SELECT
            *, e.status AS estado
            FROM
                users us
            INNER JOIN customers cu ON
                cu.id_user = us.dni
            INNER JOIN events_details ed ON
                ed.id_customer = cu.id_customer AND ed.date_event BETWEEN '$initial_date' AND '$final_date'
            INNER JOIN type_event te ON
            te.id_type_event = ed.id_type_event
            INNER JOIN eventos e ON
                e.id_event_detail = ed.id_event_detail
                WHERE us.dni LIKE '%$customer%'
            ORDER BY
            us.dni ASC" :
            "SELECT
            *, e.status AS estado
            FROM
                users us
            INNER JOIN customers cu ON
                cu.id_user = us.dni
            INNER JOIN events_details ed ON
                ed.id_customer = cu.id_customer
            INNER JOIN type_event te ON
                te.id_type_event = ed.id_type_event
            INNER JOIN eventos e ON
                e.id_event_detail = ed.id_event_detail
            ORDER BY
            us.dni ASC";
        $query = mysqli_query($con, $events_detail);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
        ?>
                <tr>
                    <td> <?= $data["name"] . ' ' . $data["lastname"] ?></td>
                    <td align="right"> <?= $data["name_event"] ?></td>
                    <td align="right"> <?= $data["name_type_event"]  ?></td>
                    <td align="right"> <?= $data["amount_guest"] ?></td>
                    <td align="right"> <?= $data["place"] ?></td>
                    <td align="right"> <?= $data["date_event"] ?></td>
                    <td align="right"> $<?= number_format($data["price"], 2) ?></td>
                    <td align="right"> <?= $data["estado"] ?></td>
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