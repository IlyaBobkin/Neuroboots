<?php
session_start();
if ($_SESSION['client']) {

    // Add
    if (isset($_POST["submit"])) {
        $_SESSION['cart'] = [
            "id" => $row['id'],
            "name" => $_POST['name'],
            "price" => $row['price'],
            "skidka" => $row['skidka'],
        ];
    }

} else {
    header('Location: /NEUROBOOTS/login.php');
}

?>
