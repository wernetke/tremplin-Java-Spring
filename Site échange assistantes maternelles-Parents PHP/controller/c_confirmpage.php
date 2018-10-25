<?php

if (!empty($_POST['envoi']))
{
    ob_start();
    header("Location:c_connect.php");
    exit();
}
include_once('../view/v_confirmpage.php');
?>