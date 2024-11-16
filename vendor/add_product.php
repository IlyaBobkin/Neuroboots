<?php
require_once ("connect.php");

if ($_SESSION['client']['admin'] == false)
    header("Location: index.php");


if (isset($_POST['submit'])) {


    $path2 = '../products/' . basename($_FILES['imageref']['name']);
    if (!move_uploaded_file($_FILES['imageref']['tmp_name'], $path2)) {
        echo "File upload failed.";
        exit;
    }
    $path = 'products/' . basename($_FILES['imageref']['name']);

    $datetime = new DateTime();
    $stringdate = $datetime->format('Y-m-d');

    // Исправленный запрос
    $sql = "INSERT INTO `product` (`name`, `description`, `price`, `skidka`, `cat`, `imageref`, `date_added`, `new_collection`) VALUES (?, ?, ?, ?, ?, ?, ?, '0')";

    $stmt = $con->prepare($sql);

    if (!$stmt) {
        // Отладочная информация, если подготовка запроса не удалась
        echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        exit;
    }

    // Привязка параметров
    $stmt->bind_param("sssisss", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['skidka'], $_POST['cat'], $path, $stringdate);

    $stmt->execute();

    $stmt->close();
}

header("Location: ../adminpanel.php");
$con->close();
?>