<?php
session_start();
if($_SESSION['client'])
{
    header('Location: /NEUROBOOTS/profile.php');
}
else
{
    header('Location: /NEUROBOOTS/login.php');
}

?>
