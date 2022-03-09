<!-- Modal de team -->
<div class="servicio-modal modal fade" id="changePhoto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content opacity-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr x-modal">
                <div class="rl x-modal">
                </div>
            </div>
        </div>
        <div class="container container-modal modern">
            <div class="row is-place-content-center">
                <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <div class="control">
                        <h1 id="prueba" class="title mb-5">Cambia tu Foto de Perfil</h1>

                        <form enctype="multipart/form-data" method="post" action="sistema/components/update-profile.php">
                            <div class="file-upload">
                                <div class="image-upload-wrap area-img-modal">
                                    <input id="dniPhoto" name="dniPhoto" type="hidden" value="<?= $_SESSION['dni'] ??''; ?>">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <!-- 3MB -->
                                    <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required />
                                    <div class="drag-text">
                                        <em class="far fa-image is-size-1"></em>
                                        <h3 class="subtitle b-600">Selecciona tu foto</h3>
                                    </div>
                                </div>
                                <br>
                                <p class="has-text-danger b-600 hidden error_photo">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
                                <div class="file-upload-content">
                                    <img id="photo-user" class="file-upload-image area-img-modal" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                            <!-- <span class="image-title">Uploaded Image</span> -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button name="submitPhotoModal" type="submit" class="form_button mt-5 submitPhotoModal">Cambiar Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="servicio-modal modal fade" id="changePhotoS" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content opacity-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr x-modal">
                <div class="rl x-modal">
                </div>
            </div>
        </div>
        <div class="container container-modal modern">
            <div class="row is-place-content-center">
                <div class="modal-body">
                    <!-- Project Details Go Here -->
                    <div class="control">
                        <h1 id="prueba" class="title mb-5">Cambia tu Foto de Perfil</h1>

                        <form enctype="multipart/form-data" method="post" action="components/update-profile.php">
                            <div class="file-upload">
                                <div class="image-upload-wrap area-img-modal">
                                    <input id="dniS" name="dniPhoto" type="hidden" value="<?= $_SESSION['dni'] ??''; ?>">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <!-- 3MB -->
                                    <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required />
                                    <div class="drag-text">
                                        <em class="far fa-image is-size-1"></em>
                                        <h3 class="subtitle b-600">Selecciona tu foto</h3>
                                    </div>
                                </div>
                                <br>
                                <p class="has-text-danger b-600 hidden error_photo">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
                                <div class="file-upload-content">
                                    <img id="photo-user" class="file-upload-image area-img-modal" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button name="submitPhotoModal submitPhotoModal" type="submit" class="form_button mt-5">Cambiar Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="servicio-modal modal fade" id="updateProfileS" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content opacity-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr x-modal">
                <div class="rl x-modal">
                </div>
            </div>
        </div>
        <div class="container container-modal modern">
            <div style="text-align: -webkit-center !important;" class="row is-place-content-center">
                <div class="modal-body wd-80">
                    <!-- Project Details Go Here -->
                    <div class="control">
                        <h1 id="titleProfile" class="title mb-5">Editar Perfil</h1>
                        <form method="post" action="components/update-profile.php">
                            <?php include "components/forms/form-profile.php" ?>
                            <button id="submitProfileModalS" name="submitProfileModal" type="submit" class="form_button mt-5">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="servicio-modal modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content opacity-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr x-modal">
                <div class="rl x-modal">
                </div>
            </div>
        </div>
        <div class="container container-modal modern">
            <div style="text-align: -webkit-center !important;" class="row is-place-content-center">
                <div class="modal-body wd-80">
                    <!-- Project Details Go Here -->
                    <div class="control">
                        <h1 id="titleProfile" class="title mb-5">Editar Perfil</h1>
                        <form method="post" action="sistema/components/update-profile.php">
                            <?php include "sistema/components/forms/form-profile.php" ?>
                            <button id="submitProfileModal" name="submitProfileModal" type="submit" class="form_button mt-5">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>