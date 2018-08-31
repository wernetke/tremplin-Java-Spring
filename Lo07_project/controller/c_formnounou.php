<?php
include_once ("../model/m_config.php");
include_once ("../model/m_formnounou.php");
include_once ("../model/m_uploadFile.php");

$liste=array();
$liste_verif=array();
foreach($_POST["langue"] as $elm) {
    $liste[]=$elm;
    $message .="<p>".$elm."</p>";
}
$maxsize=10000000;
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
$photo_nounou_id=$_POST["identifiant"].".".$_FILES["photo"]["name"];

$verif_nounou=verif_id_nounou();
$verif_parent=verif_id_parent();
$verif_contact=verif_id_contacts();
foreach ($verif_contact as $elm)
{
    $liste_verif[]=$elm["identifiant"];
}
foreach ($verif_nounou as $elm)
{
    $liste_verif[]=$elm["identifiant"];
}
foreach ($verif_contact as $elm)
{
    $liste_verif[]=$elm["identifiant"];
}
foreach ($liste_verif as $elm){
    if($_POST["identifiant"]==$elm){
        $erreur_verif = 3;
        break;
    }
}

if (!empty($_POST['envoi']))
{
    if (isset($_POST['envoi'])) {

        if ($_FILES['photo']['size'] > $maxsize)
        {
            $erreur1 = "Le fichier est trop gros";
            $erreure = 1;

        }
        elseif(in_array($extension_upload,$extensions_valides,false) )
        {
            $erreur1 = "Extension incorrect";
            $erreure = 1;

        }
        elseif (empty($_POST["langue"])){

            $erreur1 = "Veuillez sélectionner au minimum une langue";
            $erreure = 1;

        }
        elseif (empty($_FILES['photo'])){

            $erreur1 = "Veuillez ajouter une photo";
            $erreure = 1;

        }
        elseif (empty($_POST["exp"])){

            $erreur1 = "Veuillez ajouter votre expérience";
            $erreure = 1;

        }
        elseif (empty($_POST["pres"])){

            $erreur1 = "Veuillez ajouter une phrase de présentation";
            $erreure = 1;

        }
        elseif (!ctype_digit($_POST["age"]) ){

            $erreur1 = "Veuillez mettre votre age sous forme numérique";
            $erreure = 1;
        }
        elseif ($erreur_verif==3){

            $erreur1 = "Veuillez changer d'identifiant";
            $erreure = 1;

        }

        else
            {

                $erreure = 0;
                $headers = 'From: "Portfolio"<' . $_POST["email"] . '>' . "\n";
                $headers .= 'Reply-To: ' . 'kvn.wernet@gmail.com.' . "\n";
                $headers .= 'Content-Type: text/html; charset="iso-8859-1"' . "\n";
                $headers .= 'Content-Transfer-Encoding: 8bit';
                $body = '<h1>Création de compte parent </h1>
                <h3>Nom : ' . $_POST['nom'] . ' </h3>
                <h3>Prénom : ' . $_POST['prénom'] . ' </h3>
                <h3>Ville : ' . $_POST['ville'] . ' </h3>
                <h3>Tel : ' . $_POST['tel'] . ' </h3>
                <p>Email :' . $_POST['email'] . ' </p>
                <p>Identifiant :' . $_POST['identifiant'] . '</p>
                <p> Mot de passe :' . $_POST['password'] . '</p>
                <p> Age :' . $_POST['age'] . '</p>
                <p> Expérience du terrain :' . $_POST['exp'] . '</p>
                <p> Présentation :' . $_POST['pres'] . '</p>
                <p>Langue parlée(s)' . $message . '</p>
                <img>Photo de profil :' . $photo_nounou_id. '</img>';


                add_form__nounou_db($_POST["nom"],$_POST["prénom"],$_POST["ville"],$_POST["email"],$_POST["identifiant"],$_POST["password"],$_POST["age"],$_POST["exp"],$_POST["pres"],$liste,$photo_nounou_id);
                $mail = mail("kvn.wernet@gmail.com", "Portfolio", $body, $headers);
                uploadFile($_POST["identifiant"]);


            }

    }

}

else {
    $erreure = 1;
}
include_once('../view/v_formnounou.php');
?>