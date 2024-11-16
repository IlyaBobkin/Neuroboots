<?php
require_once ("connect.php");

if ($_SESSION['client']['admin'] == false)
    header("Location: index.php");

if (isset($_GET['id'])) {

    // Исправленный запрос
    $sql = "DELETE FROM `product` WHERE `id` = '{$_GET['id']}'";

    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);

}

header("Location: ../adminpanel.php");

?>