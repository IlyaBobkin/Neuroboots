<?php
session_start();
require_once ('connect.php');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $psw = $_POST['psw'];
     
   // $psw = md5($psw);

    //This below line is a code to Send form entries to database
    $sql = "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$psw'";

    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) > 0) {
        $client = mysqli_fetch_assoc($rs);
        $_SESSION['client'] = [
            "id" => $client['id'],
            'email'=> $client['e-mail'],
            'name'=> $client['name'],
            'phone'=> $client['phone'],
            'admin' => true
            ];
        header('Location: /NEUROBOOTS/adminpanel.php');
    }
    else{
        $_SESSION['message'] = "Неверный логин или пароль!";
        header('Location: /NEUROBOOTS/adminavt.php');
    }
}
?>
