<?php
include_once ("../model/m_config.php");
include_once ("../model/m_parent.php");
include_once ("../model/m_admin.php");


$sel_contact_parent_info=select_info_parent($_SESSION["identifiant"]);
$lister_reservation_faite=lister_reservation_faite($_SESSION["identifiant"]);
$lister_avis_faite=lister_avis_faite($_SESSION["identifiant"]);
$select_demande_langue=select_demande_langue($_SESSION["identifiant"]);

$suivant=0;
$suivant1=0;
$liste=array();
$liste_ponct=array();
$liste_reserv=array();
$liste_ponct_new=array();

//cookie

$tableau_serialize = serialize($_POST["disp_jour"]);

// insertion dans un cookie
setcookie("jour_hebdo", $tableau_serialize, time()+300);

//récupération du tableau
$tab_cookies = unserialize($_COOKIE['jour_hebdo']);


if(isset($_COOKIE["test1"])){

    $test = htmlentities($_COOKIE["disp_jour"]);
}
$newtest1 = $_POST["disp_jour"];
$res1 = setcookie("test1", $newtest1, time() + 300);

if(isset($_COOKIE["test2"])){

    $test2 = htmlentities($_COOKIE["disp_enfant"]);
}
$newtest2 = $_POST["disp_enfant"];
$res2 = setcookie("test2", $newtest2, time() + 300);

if(isset($_COOKIE["test3"])){

    $test3 = htmlentities($_COOKIE["heure_deb"]);
}
$newtest3 = $_POST["heure_deb"];
$res3 = setcookie("test3", $newtest3, time() + 300);

if(isset($_COOKIE["test4"])){

    $test4 = htmlentities($_COOKIE["heure_fin"]);
}
$newtest4 = $_POST["heure_fin"];
$res4 = setcookie("test4", $newtest4, time() + 300);

if(isset($_COOKIE["test5"])){

    $test5 = htmlentities($_COOKIE["jour_deb_ponct"]);
}
$newtest5 = $_POST["jour_deb_ponct"];
$res5 = setcookie("test5", $newtest5, time() + 300);

if(isset($_COOKIE["test6"])){

    $test6 = htmlentities($_COOKIE["jour_deb"]);
}
$newtest6 = $_POST["jour_deb"];
$res6 = setcookie("test6", $newtest6, time() + 300);


if(isset($_COOKIE["test7"])){

    $test7 = htmlentities($_COOKIE["jour_fin"]);
}
$newtest7 = $_POST["jour_fin"];
$res7 = setcookie("test7", $newtest7, time() + 300);

if(isset($_COOKIE["test8"])){

    $test8 = htmlentities($_COOKIE["langue_search"]);
}
$newtest8 = $_POST["langue_search"];
$res8 = setcookie("test8", $newtest8, time() + 300);

$liste_heure = explode("/", $_POST["jour_deb_ponct"]);
$jour_eng_ponct=date("l", mktime(0, 0, 0, $liste_heure[0], $liste_heure[1], $liste_heure[2]));
switch ($jour_eng_ponct){
    case "Monday" :
        $jour_ponct="lundi";
        break;
    case "Tuesday" :
        $jour_ponct="mardi";
        break;
    case "Wednesday" :
        $jour_ponct="mercredi";
        break;
    case "Thursday" :
        $jour_ponct="jeudi";
        break;
    case "Friday" :
        $jour_ponct="vendredi";
        break;
    case "Saturday" :
        $jour_ponct="samedi";
        break;
    case "Sunday" :
        $jour_ponct="dimanche";
        break;
}



if (!empty($_POST['envoi_dispo_parent'])) {
    if (isset($_POST['envoi_dispo_parent'])) {
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
            $suivant=1;
            $suivant1=0;
            $suivant2=0;

            $liste_reservation=reservation($_POST["disp_jour"],$_POST["heure_deb"],$_POST["heure_fin"],$_POST["jour_deb"],$_POST["jour_fin"]);

        }

    }
}


$select_id_nounou_new_dispo_ponct=select_id_nounou_new_dispo($jour_ponct,$_POST["heure_deb"],$_POST["heure_fin"],$_SESSION['ville']);
foreach ($select_id_nounou_new_dispo_ponct as $elm){
    $liste_ponct_new[]=$elm["identifiant"];
}

if (!empty($_POST['envoi_dispo_parent_ponct'])) {
    if (isset($_POST['envoi_dispo_parent_ponct'])) {
        if (empty($_POST["jour_deb_ponct"])) {
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
            $suivant1=1;
            $suivant=0;
            $suivant2=0;
            if($suivant1==1){
                $_POST["jour_fin"]=$_POST["jour_deb"];
            }


            $liste_reservation_ponct=reservation($jour_ponct,$_POST["heure_deb"],$_POST["heure_fin"],$_POST["jour_deb_ponct"],$_POST["jour_deb_ponct"]);


        }

    }
}

if (!empty($_POST['envoi_dispo_parent_langue'])) {
    if (isset($_POST['envoi_dispo_parent_langue'])) {
        if (empty($_POST["langue_search"])) {
            $erreur=1;
            $erreur1 = "Veuillez choisir une langue!";
        }
        else{
            $suivant1=0;
            $suivant=0;
            $suivant2=1;
            $liste_search_langue=search_langue($_POST["langue_search"]);

        }

    }
}



if (!empty($_POST)) {
    switch ($_POST["submit"]) {
        case "retour_one":
            $suivant1=0;
            $suivant=0;
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;
        case "retour_two":
            $suivant1=0;
            $suivant=0;
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;

        case "reserv_nounou":
            reserv_nounou($tab_cookies,$_COOKIE["test6"],$_COOKIE["test7"],$_POST["id_nounou"],$_COOKIE["test2"],$_COOKIE["test3"],$_COOKIE["test4"]);
            $suivant1=0;
            $suivant=0;
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#garde_creche');
            exit();
            break;
        case "reserv_nounou_ponct":
            reserv_nounou_ponct($jour_ponct,$_POST["id_nounou"],$_COOKIE["test2"],$_COOKIE["test3"],$_COOKIE["test4"],$_COOKIE["test5"]);
            $suivant1=0;
            $suivant=0;
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#garde_ponct');
            exit();
            break;
        case "envoi_avis":
            update_avis($_POST["id_nounou"],$_POST["text_avis"],$_POST["note_nounou"],$_POST["id_reservation"]);
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;
        case "demande_nounou_langue":
            demande_garde_langue($_POST["id_nounou"],$_COOKIE["test8"],$_POST["text_avis"]);
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;
        case "insert_demande":
            insert_demande($_POST["id_reservation"]);
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;
        case "rejette_demande":
            rejette_demande($_POST["id_reservation"]);
            ob_start();
            header('Location:../controller/c_parent.php?identifiant='.$_SESSION['identifiant'].'#notification');
            exit();
            break;
    }

}

include_once('../view/v_parent.php');
?>