function readURL(input) {
  if (input.files && input.files[0]) {
    if (input.files[0].size <= 3000000) {
      var reader = new FileReader()

      reader.onload = function (e) {
        $(".image-upload-wrap").hide()

        $(".file-upload-image").attr("src", e.target.result)
        $(".file-upload-content").show()
      }

      reader.readAsDataURL(input.files[0])
      $(".submitPhotoModal").attr("disabled", false)
      $(".error_photo").addClass("hidden")
    } else {
      removeUpload()
      $(".error_photo").removeClass("hidden")
    }
  } else {
    removeUpload()
    $(".error_photo").removeClass("hidden")
  }
}

function readURL2(input) {
  if (input.files && input.files[0]) {
    if (input.files[0].size <= 3000000) {
      var reader = new FileReader()

      reader.onload = function (e) {
        $(".image-upload-wrap2").hide()

        $(".file-upload-image2").attr("src", e.target.result)
        $(".file-upload-content2").show()
      }

      reader.readAsDataURL(input.files[0])
      $(".submitMenuModal").attr("disabled", false)
      $(".error_photo2").addClass("hidden")
    } else {
      removeUpload()
      $(".error_photo2").removeClass("hidden")
    }
  } else {
    removeUpload()
    $(".error_photo2").removeClass("hidden")
  }
}

function removeUpload() {
  $(".file-upload-input").replaceWith($(".file-upload-input").clone())
  $(".file-upload-content").hide()
  $(".image-upload-wrap").show()
  $(".submitPhotoModal").attr("disabled", true)
}

function removeUpload2() {
  $(".file-upload-input2").replaceWith($(".file-upload-input2").clone())
  $(".file-upload-content2").hide()
  $(".image-upload-wrap2").show()
  $(".submitMenuModal").attr("disabled", true)
}

$(".image-upload-wrap").bind("dragover", function () {
  $(".image-upload-wrap").addClass("image-dropping")
})

$(".image-upload-wrap").bind("dragleave", function () {
  $(".image-upload-wrap").removeClass("image-dropping")
})

function checkSizeCurriculum(input) {
  if (input.files && input.files[0]) {
    if (input.files[0].size <= 3000000) {
      $("#submit").attr("disabled", true)
      $("#error_curriculum").addClass("hidden")
    } else {
      $("#submit").attr("disabled", true)
      $("#error_curriculum").removeClass("hidden")
    }
  } else {
    $("#submit").attr("disabled", true)
    $("#error_curriculum").removeClass("hidden")
  }
}
