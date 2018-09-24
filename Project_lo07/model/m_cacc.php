<?php
include_once ("m_config.php");

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);

        global $bdd;

        // Requête SQL
        $requete = "SELECT ville_nom_simple FROM villes_france_free WHERE ville_nom_simple LIKE '". $q ."%' LIMIT 0, 10";

        // Exécution de la requête SQL
        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

        // On parcourt les résultats de la requête SQL
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $donnees['ville_nom_simple'];
        }

        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
?>