<?php

$timeStamp = new DateTime();
$name = $timeStamp->getTimestamp();

$today = date("Y-m-d");

$path = "../uploads/";

$ext = pathinfo($_FILES['photo']['name'] ?? "", PATHINFO_EXTENSION);


include "../includes/dbcon.php";
session_start();

if ($_SESSION['dni'] == null) {
    echo "<script> window.location.href = localStorage.getItem('currentPath') + '" . $error . "'</script>";
    exit();
} else {
    if ($ext != "") {
        $id = $_POST['dniPhoto'];
        $uploaded_photo = $path . $name . '.' . $ext;
        $path_photo = "uploads/" . $name . '.' . $ext;

        $success = "?info=update-photo";
        $error = "?info=error";

        $consulta = "UPDATE users SET path_photo = '$path_photo' WHERE dni = '$id'";

        $resultado = mysqli_query($con, $consulta);

        if ($resultado) {
            echo "<script>                     
                    const actualPath = localStorage.getItem('currentPath');
                    window.location.href = actualPath + '" . $success . "' </script>";
            move_uploaded_file($_FILES['photo']['tmp_name'], $uploaded_photo);
            $_SESSION['photo'] = $path_photo;
        } else {
            echo "<script> window.location.href = localStorage.getItem('currentPath') + '" . $error . "'</script>";
            session_destroy();
            exit();
        }
    }
    if (isset($_POST['dni'])) {
        $dni = $_POST['dni'];
        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
        $token = base64_encode($email);
        $ruta = $_POST['ruta'];

        $success = strpos($ruta, '?') === false ? "?info=update-profile" : "&info=update-profile";
        $error = strpos($ruta, '?') === false ? "?info=error" : "&info=error";
       
        $consulta = "UPDATE users SET name = '$name', lastname = '$lastname', phone = '$phone', email = '$email', birthday = '$birthday',  password = '$password', token = '$token' WHERE dni = '$dni'";

        $resultado = mysqli_query($con, $consulta);

        $consulta2 = "SELECT * FROM users WHERE dni = '$dni'";
        $result = mysqli_query($con, $consulta2);
        $row = mysqli_fetch_array($result);

        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['username'] = $row['name'] . ' ' . $row['lastname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['token'] = $row['token'];

        if ($resultado) {
            $ruta .= $success;
            $ruta = "http://" . $ruta;
            echo "<script> location.href ='$ruta' </script>";
        } else {
            $ruta .= $error;
            $ruta = "http://" . $ruta;
            echo "<script> location.href = '$ruta' </script>";
            exit();
        }
    }
}
