<?php
include_once ("../model/m_config.php");
include_once ("../model/m_connect.php");
$contact = affichercontact($_SESSION['identifiant']);

$_SESSION['user'] = $contact['utilisateur'];
$_SESSION['ville'] = $contact['ville'];

if ($_SESSION["user"]==="1"){
    ob_start();
    header('Location:../controller/c_admin.php?identifiant='.$_SESSION['identifiant'].'');
    exit();
}
elseif ($_SESSION["user"]==="2") {
    ob_start();
    header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'');
    exit();
}
elseif ($_SESSION["user"]==="3") {
    ob_start();
    header('Location:../controller/c_nounou.php?identifiant='.$_SESSION['identifiant'].'');
    exit();
}
?>