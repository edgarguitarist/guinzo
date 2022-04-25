<?php
$wdcontrol = $type != 'events' ? "wd-4c" : "wd-3c";
$consultas = [
    'events' => [
        'label' => 'Evento',
        'value' => 'table-report-events.php',
    ],
    'customer' => [
        'label' => 'Cliente',
        'value' => 'table-report-customers.php',
    ],
    'provider' => [
        'label' => 'Proveedores',
        'value' => 'table-report-providers.php',
    ],
];
?>

<form class="form wd-100" action="" method="get">
    <input type="hidden" name="type" value="<?= $type ?>">
    <div class="field wd-100">
        <div class="forms_row wd-100">
            <?php
            if ($type != 'events') {
            ?>
                <label class="label has-text-left <?= $wdcontrol; ?>"><?= $consultas[$type]['label'] ?></label>

            <?php
            }
            ?>
            <label class="label has-text-left <?= $wdcontrol; ?>">Fecha Inicial</label>
            <label class="label has-text-left <?= $wdcontrol; ?>">Fecha Final</label>
            <label class="label has-text-left <?= $wdcontrol; ?>"></label>
        </div>
        <div class="field-body forms_row wd-100">
            <?php
            if ($type === 'customer') {
            ?>
                <div class="select <?= $wdcontrol; ?>">
                    <select onmouseover="loadSelects(this, 'users' , '<?= $customer ?>', 'id_role = 6')" onchange="checkSelect(this, false)" id="customer" name="customer" class="input" required autofocus>
                        <option value="">Seleccione una opción</option>
                    </select>
                </div>
            <?php
            }
            if ($type === 'provider') {
            ?>
                <div class="select <?= $wdcontrol; ?>">
                    <select onmouseover="loadSelects(this, 'providers' , '<?= $provider ?>', '')" onchange="checkSelect(this, false)" id="customer" name="customer" class="input" required autofocus>
                        <option value="">Seleccione una opción</option>
                    </select>
                </div>
            <?php
            }
            ?>
            <div class="control <?= $wdcontrol; ?>">
                <input max="<?= $hoy ?>" class="input" type="date" name="initial_date" value="<?= $initial_date ?>" required>
            </div>
            <div class="control <?= $wdcontrol; ?>">
                <input max="" class="input" type="date" name="final_date" value="<?= $final_date ?>" required>
            </div>
            <div class="control has-text-right <?= $wdcontrol; ?>">
                <button class="button is-primary" type="submit">Filtrar por Fecha</button>
            </div>
        </div>
    </div>
</form>