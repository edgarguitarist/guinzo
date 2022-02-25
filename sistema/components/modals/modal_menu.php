<div class="servicio-modal modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h1 id="prueba" class="title mb-5">Añadir nuevo Menú</h1>

                        <form enctype="multipart/form-data" onchange="checkForm()" onclick="checkForm()" onkeyup="checkForm()" method="post" action="components/forms/update-data.php">
                            <input type="hidden" id="who" name="who" value="menus">
                            <input type="hidden" id="action" name="action" value="add">
                            <?php include "components/forms/form-menu.php" ?>
                            <button id="submitMenuModal" name="submitMenuModal" type="submit" class="form_button mt-5">Guardar Menú</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>