<?php
include_once ("../model/m_config.php");
include_once ("../model/m_connect.php");

if (!empty($_POST['connexion'])) {
    $erreur = 0;
    $identifiant = $_POST["identifiant"];
    $password = $_POST ['password'];
    $co=verifuser($identifiant,$password);
    if (count($co)>=1 ) {
        $_SESSION['identifiant'] = $co[0]["identifiant"];
        ob_start();
        header('Location:../controller/c_session.php');
        exit();
    }
    else
        $erreur = 1;
}

else
{
    $identifiant = "";
    $password = "";
}
if (!empty($_POST['creation']))
{
    $user=$_POST["user"];
    if ($user === "parent"){
        ob_start();
        header("Location:c_formparent.php");
        exit();
    }
    elseif ($user === "nounou"){
        ob_start();
        header("Location:c_formnounou.php");
        exit();
    }
}
include_once('../view/v_connect.php');
?>