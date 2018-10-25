<?php
include_once ("../model/m_config.php");
include_once ("../model/m_formparent.php");
$liste=array();
$liste2=array();
$liste3=array();
$liste_verif=array();

if(isset($_COOKIE["test"])){

    $test = htmlentities($_COOKIE["nb_enfant"]);
}
$newtest = $_POST["nb_enfant"];
$res = setcookie("test", $newtest, time() + 300);

foreach($_POST["prenom"] as $elm) {
    $liste[]=$elm;
    $message .="<p>".$elm."</p>";
}

foreach($_POST["date"] as $elm) {
    $liste2[]=$elm;
    $message2 .="<p>".$elm."</p>";

}
foreach($_POST["info_enfant"] as $elm) {
    $liste3[]=$elm;
    $message3 .="<p>".$elm."</p>";
}

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
    $erreure=0;
    if (isset($_POST['envoi'])) {
        if ($erreur_verif==3){

        $erreur1 = "Veuillez changer d'identifiant";
        $erreure = 1;

        }
        else
            {

            $headers ='From: "Portfolio"<'.$_POST["email"].'>'."\n";
            $headers .='Reply-To: '.'kvn.wernet@gmail.com.'."\n";
            $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
            $headers .='Content-Transfer-Encoding: 8bit';
            $body = '<h1>Création de compte parent </h1>
        <h3>Nom : '.$_POST['nom'].' </h3>
        <h3>Ville : '.$_POST['ville'].' </h3>
        <p>Email :'.$_POST['email'].' </p>
        <p>Identifiant :'.$_POST['identifiant'].'</p>
        <p> Mot de passe :'.$_POST['password'].'<p>
        <p>Prénom de(s) enfant(s) :'.$message.'</p>
        <p>Date(s) de naissance :'.$message2.'</p>
        <p>Informations de(s) enfant(s) :'.$message3.'</p>';

            $mail = mail("kvn.wernet@gmail.com", "Portfolio", $body, $headers);
            add_form_db($_COOKIE["test"],$_POST["nom"],$_POST["ville"],$_POST["email"],$_POST["identifiant"],$_POST["password"],$liste,$liste2,$liste3);
            ob_start();
            header("Location:c_confirmpage.php");
            exit();

            }

        }
    }

else {
    $erreure = 1;
}
include_once('../view/v_formparent.php');
?>