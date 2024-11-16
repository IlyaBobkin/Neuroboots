<?php
require_once ("connect.php");

// Установите кодировку соединения
mysqli_set_charset($con, "utf8mb3_general_ci");

if (isset($_POST['submit'])) {
    // Вывод отладочной информации для проверки значений
    echo "Debug Info:<br>";
    echo "Key: " . htmlspecialchars($_GET['key']) . "<br>";
    echo "Client ID: " . htmlspecialchars($_SESSION['client']['id']) . "<br>";
    echo "Adress Cur: " . htmlspecialchars($_POST['adress_cur']) . "<br>";
    echo "Adress PVZ: " . htmlspecialchars($_POST['adress_pvz']) . "<br>";
    echo "Total: " . htmlspecialchars($_POST['total']) . "<br>";

    if ($_GET['key'] == "courier")
    {
        $sql_cur = "SELECT * FROM `adress` WHERE `adress_name` = '{$_POST['adress_cur']}'";
        $rs = mysqli_query($con, $sql_cur);
        if (mysqli_num_rows($rs) > 0) {
            $_POST['adress_cur'] = mysqli_fetch_assoc($rs)['id'];
        }
        else
        {
            $sql_cur = "insert into `adress` (`store`,`adress_name`) VALUES (0,?)";
            $stmt = $con->prepare($sql_cur);
            $stmt->bind_param("s", $_POST['adress_cur']);
            $stmt->execute();
            $_POST['adress_cur'] = $stmt->insert_id;
            $stmt->close();
        }
    }


    if ($_GET['key'] == "courier") {
        $sql = "INSERT INTO `zakaz` (`client_id`, `adress_id`, `sum`, `date_oformlen`, `staff_id`) VALUES (?, ?, ?,  NOW(), 1)";
    } else {
        $sql = "INSERT INTO `zakaz` (`client_id`, `adress_id`, `sum`, `date_oformlen`) VALUES (?, ?, ?, NOW())";
    }

    $stmt = $con->prepare($sql);

    if (!$stmt) {
        // Отладочная информация, если подготовка запроса не удалась
        echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        exit;
    }

    // Привязка параметров
    if ($_GET['key'] == "courier") {


        $stmt->bind_param("iid", $_SESSION['client']['id'], $_POST['adress_cur'], $_POST['total']);
    } else {
        $stmt->bind_param("iid", $_SESSION['client']['id'], $_POST['adress_pvz'], $_POST['total']);
    }

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "Query executed successfully.";
    } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $order_id = $stmt->insert_id;
    $stmt->close();


    $sql = "INSERT INTO `zakaz_has_product` (`zakaz_id`, `product_id`, `count`) VALUES (?, ?, ?)";

    $stmt = $con->prepare($sql);

    if (!$stmt) {
        // Отладочная информация, если подготовка запроса не удалась
        echo "Prepare failed: (" . $con->errno . ") " . $con->error;
        exit;
    }

    foreach ($_SESSION['cart'] as $product) {
        $stmt->bind_param("iii",$order_id, $product['id'], $product['count']);
        $stmt->execute();
    }

    header("Location: ../generate_pdf.php?order_id=" . $order_id);

    $stmt->close();

    exit;
}

$con->close();
?>