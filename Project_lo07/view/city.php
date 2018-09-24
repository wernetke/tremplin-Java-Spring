<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=db738300254.db.1and1.com;dbname=db738300254','dbo738300254','$KVN21wntnonet'); // on se connecte a  la base de donnnees
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

$term = utf8_decode($_GET['term']); // J'ai rajouté utf8_decode()

$requete = $bdd->prepare('SELECT * FROM collectivites WHERE nom_collectivite LIKE :term');
$requete->execute(array('term' => htmlentities('%'.$term.'%')));

$array = array();

while($donnee = $requete->fetch())
{
    array_push($array, utf8_encode($donnee['nom_collectivite'])); // J'ai rajouté utf8_encode()
}

echo json_encode($array);

?>