<?php
    session_start();
    require_once ('connect.php');

       if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $psw = $_POST['psw'];
            $phone = $_POST['phone'];
            $name = $_POST['name'];

            $psw = md5($psw);

            //This below line is a code to Send form entries to database
            $sql = "INSERT INTO `client` ( `name`, `phone`, `e-mail`, `password`)  VALUES ('$name','$phone', '$email', '$psw')";

            //fire query to save entries and check it with if statement
            $rs = mysqli_query($con, $sql);
            header('Location: /NEUROBOOTS/signup.php');
       }
?>
