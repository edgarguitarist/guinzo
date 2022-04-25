<form class="form" action="" method="get">
    <input type="hidden" name="type" value="<?= $type ?>">
    <div class="field">
        <div class="forms_row">
            <label class="label has-text-left wd-3c">Fecha Inicial</label>
            <label class="label has-text-left wd-3c">Fecha Final</label>
            <label class="label has-text-left wd-3c"></label>
        </div>
        <div class="field-body forms_row">
            <div class="control wd-3c">
                <input max="<?= $hoy ?>" class="input" type="date" name="initial_date" value="<?= $initial_date ?>"  required>
            </div>
            <div class="control wd-3c">
                <input max="<?= $hoy ?>" class="input" type="date" name="final_date" value="<?= $final_date ?>"  required>
            </div>
            <div class="control wd-3c">
                <button class="button is-primary" type="submit">Filtrar por Fecha</button>
            </div>
        </div>
    </div>
</form>