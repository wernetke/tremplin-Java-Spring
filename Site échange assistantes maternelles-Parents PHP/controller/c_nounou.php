<?php
include_once ("../model/m_config.php");
include_once ("../model/m_nounou.php");


$sel_contact_nounou_info=select_info_nounou($_SESSION["identifiant"]);
$lister_reservation_faite=lister_reservation_faite_nounou($_SESSION["identifiant"]);
$eval=lister_eval_nounou($_SESSION["identifiant"]);
$demande=search_id_demande($_SESSION["identifiant"]);
$liste_id_demande=array();
foreach ($demande as $elm)
{
    $liste_id_demande[]=$elm["id_parent"];
}

$liste=array();
foreach($_POST["date_perso"] as $elm) {
    $message .=$elm." ";
}

if (!empty($_POST['envoi'])) {
    if (isset($_POST['envoi'])) {

        if (empty($_POST["disp_date"])) {
            $erreur = 1;
            $erreur1 = "Veuillez choisir une des disponibilités ci-dessous !";
        }
        else {
            if ($_POST["disp_date"]=="perso"){
                if (empty($_POST["date_perso"])) {
                    $erreur=1;
                    $erreur1 = "Veuillez choisir une des disponibilités ci-dessous !";
                }
                else{
                    uptdate_date_nounou($_SESSION["identifiant"],$message);
                    ob_start();
                    header('Location:../controller/c_nounou.php?identifiant='.$_SESSION['identifiant'].'');
                    exit();

                }
            }
            else{
                uptdate_date_nounou($_SESSION["identifiant"],$_POST["disp_date"]);
                ob_start();
                header('Location:../controller/c_nounou.php?identifiant='.$_SESSION['identifiant'].'');
                exit();

            }
        }
    }

}
if (!empty($_POST['envoi_add_dispo'])) {
    if (isset($_POST['envoi_add_dispo'])) {
        if (empty($_POST["disp_jour"])) {
            $erreur=1;
            $erreur1 = "Veuillez choisir un jour!";
        }
        elseif (empty($_POST["heure_deb"])) {
            $erreur=1;
            $erreur1 = "Veuillez choisir une heure de début!";
        }
        elseif (empty($_POST["heure_fin"])) {
            $erreur=1;
            $erreur1 = "Veuillez choisir une heure de fin!";
        }
        else{
            $erreur=2;
            insert_dispo_nounou($_SESSION["identifiant"],$_POST["disp_jour"],$_POST["heure_deb"],$_POST["heure_fin"]);
        }

    }
}
if (!empty($_POST)) {
    switch ($_POST["submit"]) {
        case "envoi_demande":
            ajout_demande($_POST["id_reserv"],$_POST["jour_deb"],$_POST["heure_deb"],$_POST["heure_fin"]);
            ob_start();
            header('Location:../controller/c_nounou.php?identifiant=' . $_SESSION['identifiant'] . '');
            exit();
            break;
        case "rejette_demande":
            rejette_demande($_POST["id_reserv"]);
            ob_start();
            header('Location:../controller/c_nounou.php?identifiant=' . $_SESSION['identifiant'] . '');
            exit();
            break;
    }
}


include_once('../view/v_nounou.php');
?>