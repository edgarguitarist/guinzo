<!-- MODAL -->
<?php
$modales = [
    "addCustomerModal" => [
        "index" => "Cliente",
        "name" => "addCustomerModal",
        "title" => "Nuevo Cliente",
        "who" => "customers",
        "form" => "form-customers.php",
    ],
    "addEmployeeModal" => [
        "index" => "Empleado",
        "name" => "addEmployeeModal",
        "title" => "Nuevo Empleado",
        "who" => "employees",
        "form" => "form-employees.php"
    ],
    "addProviderModal" => [
        "index" => "Proveedor",
        "name" => "addProviderModal",
        "title" => "Nuevo Proveedor",
        "who" => "providers",
        "form" => "form-providers.php"
    ],
    "addProductModal" => [
        "index" => "Producto",
        "name" => "addProductModal",
        "title" => "Nuevo Producto",
        "who" => "products",
        "form" => "form-products.php"
    ],
    "addMaterialModal" => [
        "index" => "Material",
        "name" => "addMaterialModal",
        "title" => "Nuevo Material",
        "who" => "materials",
        "form" => "form-materials.php"
    ]
];
$conterstine = 0;
$ssite = $ssite ?? "";
foreach ($modales as $modal => $data) {
    if (strpos($modales[$modal]["index"], $ssite) !== false) {
        $conterstine++;
?>
        <div class="servicio-modal modal fade" id="<?= $modales[$modal]["name"] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content opacity-modal">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr x-modal">
                        <div class="rl x-modal">
                        </div>
                    </div>
                </div>
                <div class="container container-modal modern">
                    <div class="row is-place-content-center">
                        <div class="modal-body wd-80">
                            <!-- Project Details Go Here -->
                            <div class="control">
                                <h1 id="titleAddCustomer" class="title mb-5"><?= $modales[$modal]["title"] ?></h1>
                                <form onchange="checkForm()" onclick="checkForm()" onkeyup="checkForm()" method="post" action="components/forms/update-data.php">
                                    <input type="hidden" id="who" name="who" value="<?= $modales[$modal]["who"] ?>">
                                    <input type="hidden" id="action" name="action" value="add">
                                    <?php include "components/forms/" . $modales[$modal]["form"] ?>
                                    <button onmouseover="checkForm()" id="submit" name="submit" type="submit" class="form_button mt-5">Añadir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }  
} 
if ($conterstine == 0) {
    echo "<script>//console.log('No se ha encontrado ningún modal que coincida con este sitio')</script>";
}
?>