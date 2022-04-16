<div class="servicio-modal modal fade" id="changeCarouselImage" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h1 id="prueba" class="title mb-5">Subir Imagen</h1>

                        <form enctype="multipart/form-data" method="post" action="components/update-carousel.php">
                            <div class="file-upload">
                                <div class="image-upload-wrap area-img-modal">
                                    <input type="hidden" name="type_upload" id="type_upload" value=""> 
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> <!-- 3MB -->
                                    <input id="photo" name="photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required />
                                    <div class="drag-text">
                                        <em class="far fa-image is-size-1"></em>
                                        <h3 class="subtitle b-600">Selecciona tu Imagen</h3>
                                    </div>
                                </div>
                                <br>
                                <p class="has-text-danger b-600 hidden error_photo">El tamaño de la imagen excede los 3MB, elija otra por favor.</p>
                                <div class="file-upload-content">
                                    <img id="photo-user" class="file-upload-image area-img-modal" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remover

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button name="submitPhotoModal submitPhotoModal" type="submit" class="form_button mt-5">Subir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>