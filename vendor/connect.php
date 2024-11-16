<?php
        session_start();
        $host = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "mydb";

        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con) {
            die("Connection failed!" . mysqli_connect_error());
        }
        //This below line is a code to Send form entries to database
        
?>