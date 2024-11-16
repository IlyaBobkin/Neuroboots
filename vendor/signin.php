<?php
session_start();
require_once ('connect.php');


//// Delete Item
//else if (isset($_POST['delete'])) { // a remove button has been clicked
//    unset($_POST['delete']); //
//}

//// Empty Cart
//else if (isset($_POST["delete"])) { // remove item from cart
//    unset($_SESSION['cart']);
//}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $psw = $_POST['psw'];
     
    $psw = md5($psw);

    //This below line is a code to Send form entries to database
    $sql = "SELECT * FROM `client` WHERE `e-mail` = '$email' AND `password` = '$psw'";

    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) > 0) {
        $client = mysqli_fetch_assoc($rs);
        $_SESSION['client'] = [
            "id" => $client['id'],
            'email'=> $client['e-mail'],
            'name'=> $client['name'],
            'phone'=> $client['phone'],
            'admin' => false,
            ];
        
        header('Location: /NEUROBOOTS/profile.php');
    }
    else{
        $_SESSION['message'] = "Неверная почта или пароль!";
        header('Location: /NEUROBOOTS/login.php');
    }
}
?>
