<?php
include "../../includes/dbcon.php";
if (isset($_POST['action']) && isset($_POST['who'])) {
    $action = $_POST['action'];
    $who = $_POST['who'];
    $twoinserts = false;

    if ($who == "customers") {
        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $cedula = $_POST['cedula'] ?? $_POST['dni'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $city = $_POST['residence'];
        $birthday = $_POST['birthday'];
        $token = base64_encode($email);
        $consultas = [
            "add" => "INSERT INTO users (dni, name, lastname, phone, birthday, email, token) VALUES ('$cedula', '$name', '$lastname', '$phone', '$birthday', '$email', '$token')",
            "add2" => "INSERT INTO customers (id_user,city) VALUES ('$cedula','$city')",
            "update" => "UPDATE users SET name = '$name', lastname = '$lastname', phone = '$phone', birthday = '$birthday', email = '$email' WHERE dni = '$cedula'",
            "update2" => "UPDATE customers SET city = '$city' WHERE id_user = '$cedula'",
        ];
        $insert2 = $consultas[$action . "2"];
        $twoinserts = true;
    }

    if ($who == "employees") {
        $middle_name = $_POST['middleName']; //
        $second_lastname = $_POST['secondLastName']; //
        $city = $_POST['residence'];  //
        $type_employee = $_POST['type_employees']; //
        $role_employee = $_POST['role_employees']; //

        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $cedula = $_POST['cedula'] ?? $_POST['dni'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $token = base64_encode($email);

        $consultas = [
            "add" => "INSERT INTO users (dni, name, lastname, phone, birthday, email, token, id_role) VALUES ('$cedula', '$name', '$lastname', '$phone', '$birthday', '$email', '$token', '$role_employee')",
            "add2" => "INSERT INTO employee (id_user, middleName, secondLastName, city, rank_employee) VALUES ('$cedula', '$middle_name', '$second_lastname', '$city', '$type_employee')",
            "update" => "UPDATE users SET name = '$name', lastname = '$lastname', phone = '$phone', birthday = '$birthday', email = '$email', id_role = '$role_employee' WHERE dni = '$cedula'",
            "update2" => "UPDATE employee SET middleName = '$middle_name', secondLastName = '$second_lastname', city = '$city', rank_employee = '$type_employee' WHERE id_user = '$cedula'",
        ];
        $insert2 = $consultas[$action . "2"];
        $twoinserts = true;
    }

    if ($who == "providers") {
        $name = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $cedula = $_POST['cedula'] ?? $_POST['dni'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $ruc = $_POST['ruc'] ?? $_POST['ruc_2'];
        $companyName = $_POST['companyName'];
        $companyPhone = $_POST['companyPhone'];
        $companyEmail = $_POST['companyEmail'];
        $companyAddress = $_POST['companyAddress'];
        $companyType = $_POST['companyType'];

        $consultas = [
            "add" => "INSERT INTO providers (dni_provider, name_provider, lastname_provider, phone, email, ruc, name_company, email_company, tel_company, address_company, type_company) VALUES ('$cedula', '$name', '$lastname', '$phone', '$email', '$ruc', '$companyName', '$companyEmail', '$companyPhone', '$companyAddress', '$companyType')",
            "add2" => "",
            "update" => "UPDATE providers SET name_provider = '$name', lastname_provider = '$lastname', phone = '$phone', email = '$email', ruc = '$ruc', name_company = '$companyName', email_company = '$companyEmail', tel_company = '$companyPhone', address_company = '$companyAddress', type_company = '$companyType' WHERE dni_provider = '$cedula'",
            "update2" => "",
        ];
        $insert2 = $consultas[$action . "2"];
        $twoinserts = false;
    }

    if ($who == "products") {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'];
        $amount = $_POST['peso'];
        $price = $_POST['precio'];
        $type_amount = $_POST['tipo_peso'];
        $type_product = $_POST['tipo_producto'];
        $description = $_POST['description'];
        $expiration = $_POST['expiration'];
        $id_provider = $_POST['providers'];

        $consultas = [
            "add" => "INSERT INTO products (name_product, amount, type_amount, price, type_product, description_product, expiry_date, id_provider) VALUES ('$name', '$amount', '$type_amount', '$price', '$type_product', '$description', '$expiration', '$id_provider')",
            "add2" => "",
            "update" => "UPDATE products SET name_product = '$name', amount = '$amount', type_amount = '$type_amount', price = '$price', type_product = '$type_product', description_product = '$description', expiry_date = '$expiration', id_provider = '$id_provider' WHERE id_product = '$id'",
            "update2" => "",
        ];
        $insert2 = $consultas[$action . "2"];
        $twoinserts = false;
    }

    if ($who == "materials") {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'];
        $amount = $_POST['cantidad'];
        $price = $_POST['precio'];
        $type_material = $_POST['tipo_material'];
        $description = $_POST['description'];
        $expiration = $_POST['expiration'];
        $id_provider = $_POST['providers'];

        $consultas = [
            "add" => "INSERT INTO materials (name_material, amount, price, type_material, description_material, expiry_date_material, id_provider) VALUES ('$name', '$amount', '$price', '$type_material', '$description', '$expiration', '$id_provider')",
            "add2" => "",
            "update" => "UPDATE materials SET name_material = '$name', amount = '$amount', price = '$price' , type_material = '$type_material', description_material = '$description', expiry_date_material = '$expiration', id_provider = '$id_provider' WHERE id_material = '$id'",
            "update2" => "",

        ];
        $insert2 = $consultas[$action . "2"];
        $twoinserts = false;
    }

    if ($who == "menus") {
        $id = $_POST['id_menu'] ?? '';
        $name = $_POST['name_menu'];
        $description = $_POST['description_menu'];
        $price = $_POST['precio_menu'];
        $type_menu = $_POST['tipo_menu'];

        $timeStamp = new DateTime();
        $namePhoto = $timeStamp->getTimestamp();
        $today = date("Y-m-d");
        $path = "../../uploads/";
        $ext = pathinfo($_FILES['photo_menu']['name'] ?? "", PATHINFO_EXTENSION);

        $uploaded_photo = $path . $namePhoto . '.' . $ext;
        $path_photo = "uploads/" . $namePhoto . '.' . $ext;

        move_uploaded_file($_FILES['photo_menu']['tmp_name'], $uploaded_photo);      

        $photo_menu = $path_photo;

        $consultas = [
            "add" => "INSERT INTO menus (name_menu, description_menu, price_menu, type_menu, photo_menu) VALUES ('$name', '$description', '$price', '$type_menu', '$photo_menu')",
            "add2" => "",
            "update" => "UPDATE menus SET name_menu = '$name', description_menu = '$description', price_menu = '$price', type_menu = '$type_menu', photo_menu = '$photo_menu' WHERE id_menu = '$id'",
            "update2" => "",
        ];

        $insert2 = $consultas[$action . "2"];
        $twoinserts = false;
    }

    $query = $consultas[$action];
    $result = mysqli_query($con, $query);
    //echo $result;
    $result2 = $twoinserts ? mysqli_query($con, $insert2) : true;
    if ($result && $result2) {
        header("Location: ../../" . $who . ".php?info=" . $action);
    } else {
        header("Location: ../../" . $who . ".php?info=" . $action . "_error");
    }
} else {
    echo "<script>history.back()</script>";
}
