<?php

session_start();
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
?>