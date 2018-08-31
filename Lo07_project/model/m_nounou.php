<?php
function select_info_nounou($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN contacts_nounou_lo07 B ON A.identifiant = B.identifiant WHERE A.identifiant='$id' ");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}

function insert_data_dispo($id,$jour)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare('INSERT INTO dispo_nounou_lo07(identifiant,jour_dispo,ville)VALUES(:identifiant,:jour_dispo,:ville)');
    $req->execute(array(
        'identifiant' => $id,
        'jour_dispo' => $jour,
        'ville' => $_SESSION['ville']
    ));
}

function uptdate_date_nounou($id,$choix_date)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if(($choix_date!="tous_jours_work_perso") && ($choix_date!="tous_jours_perso")) {
        $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET choix_date=:choix_date, validation_date_nounou='1' WHERE identifiant='$id'");
        $req->execute(array(
            'choix_date' => $choix_date
        ));
    }
    elseif ($choix_date=="tous_jours_work_perso"){
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET choix_date='lundi mardi mercredi jeudi vendredi', validation_date_nounou='1' WHERE identifiant='$id'");
    $req->execute();
    }
     elseif ($choix_date=="tous_jours_perso"){
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET choix_date='lundi mardi mercredi jeudi vendredi samedi dimanche', validation_date_nounou='1' WHERE identifiant='$id'");
    $req->execute();
    }
    switch ($choix_date) {
        case "tous_jours_work_perso":
            insert_data_dispo($id,"lundi");
            insert_data_dispo($id,"mardi");
            insert_data_dispo($id,"mercredi");
            insert_data_dispo($id,"jeudi");
            insert_data_dispo($id,"vendredi");
            break;

        case "tous_jours_perso":
            insert_data_dispo($id,"lundi");
            insert_data_dispo($id,"mardi");
            insert_data_dispo($id,"mercredi");
            insert_data_dispo($id,"jeudi");
            insert_data_dispo($id,"vendredi");
            insert_data_dispo($id,"samedi");
            insert_data_dispo($id,"dimanche");
            break;
    }
    if(($choix_date!="tous_jours_work_perso") && ($choix_date!="tous_jours_perso"))
    {
        $liste_jour = explode(" ", $choix_date);
        for($i=0; $i<=count($liste_jour); $i++)
        {
            if ($liste_jour[$i]!="") {
                insert_data_dispo($id,$liste_jour[$i]);
            }
        }
    }
}
function insert_dispo_nounou($id,$jour,$heure_deb,$heure_fin)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE dispo_nounou_lo07 SET heure_deb=:heure_deb, heure_fin=:heure_fin WHERE identifiant='$id' AND jour_dispo='$jour'");
    $req->execute(array(
        'heure_deb' => $heure_deb,
        'heure_fin' => $heure_fin
    ));

}
function lister_reservation_faite_nounou($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN reservation_lo07 B ON A.identifiant = B.identifiant_parent LEFT JOIN contacts_parent_lo07 C  ON A.identifiant = C.identifiant WHERE  B.identifiant_nounou='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function box($prenom1,$date1,$info1,$prenom2,$date2,$info2,$prenom3,$date3,$info3,$prenom4,$date4,$info4,$prenom5,$date5,$info5,$prenom6,$date6,$info6,$prenom7,$date7,$info7)
{
    if ($prenom1!="" && $info1!="0000-00-00"){

        echo "<h2>Premier enfant:</h2>
                <ul>
              <li><h2>Prénom :</h2><p> $prenom1</p></li>
              <li><h2>Date de naissance:</h2><p> $date1</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info1</p></li>  
              </ul>
                ";
    }
    if ($prenom2!="" && $info2!="0000-00-00"){
        echo "<h2>Deuxième enfant:</h2>
         <ul>
              <li><h2>Prénom :</h2><p> $prenom2</p></li>
              <li><h2>Date de naissance:</h2><p> $date2</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info2</p></li>  
              </ul>
            ";
    }
    if ($prenom3!="" && $info3!="0000-00-00"){
        echo "<h2>Troisième enfant:</h2>
          <ul>
              <li><h2>Prénom :</h2><p> $prenom3</p></li>
              <li><h2>Date de naissance:</h2><p> $date3</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info3</p></li>  
              </ul>
            ";
    }
    if ($prenom4!="" && $info4!="0000-00-00"){
        echo "<h2>Quatrième enfant:</h2>
          <ul>
              <li><h2>Prénom :</h2><p> $prenom4</p></li>
              <li><h2>Date de naissance:</h2><p> $date4</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info4</p></li>  
              </ul>  
            ";
    }
    if ($prenom5!="" && $info5!="0000-00-00"){
        echo "<h2>Cinquième enfant:</h2>
          <ul>
              <li><h2>Prénom :</h2><p> $prenom5</p></li>
              <li><h2>Date de naissance:</h2><p> $date5</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info5</p></li>  
              </ul>
            ";
    }
    if ($prenom6!="" && $info6!="0000-00-00"){
        echo "<h2>Sixième enfant:</h2>
          <ul>
              <li><h2>Prénom :</h2><p> $prenom6</p></li>
              <li><h2>Date de naissance:</h2><p> $date6</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info6</p></li>  
              </ul>
            ";
    }
    if ($prenom7!="" && $info7!="0000-00-00"){
        echo "<h2>Septième enfant:</h2>
          <ul>
              <li><h2>Prénom :</h2><p> $prenom7</p></li>
              <li><h2>Date de naissance:</h2><p> $date7</p></li>  
              <li><h2>Information complémentaires:</h2><p> $info7</p></li>  
              </ul>
            ";
    }
}

function lister_eval_nounou($id)
{
    global $bdd ;
    $reponse = $bdd->query("SELECT AVG(note) AS note_moyen FROM evaluation_lo07 WHERE identifiant_nounou='$id'");

    while ($donnees = $reponse->fetch())
    {
         $liste=$donnees['note_moyen'];
    }
    return ($liste);
}

function lister_star($note)
{

    switch (floor($note))
    {
        case "1":
            echo "<span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span>";
            break;
        case "2":
            echo "<span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span>";
            break;
        case "3":
            echo "<span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star-empty\"></span><span class=\"glyphicon glyphicon-star-empty\"></span>";
            break;
        case "4":
            echo "<span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star-empty\"></span>";
            break;
        case "5":
            echo "<span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span><span class=\"glyphicon glyphicon-star\"></span>";

    }
}
function search_id_demande($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM demande_garde_langue_etrangere_lo07 WHERE id_nounou='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function select_info_nounou_demande($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN contacts_parent_lo07 B  ON A.identifiant = B.identifiant LEFT JOIN demande_garde_langue_etrangere_lo07 C ON A.identifiant = C.id_parent  WHERE A.identifiant='$id' ");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}
function ajout_demande($id_reserv,$jour,$heure_deb,$heure_fin)
{
    global $bdd ;
    $req = $bdd->prepare("UPDATE demande_garde_langue_etrangere_lo07 SET jour='$jour', heure_deb='$heure_deb', heure_fin='$heure_fin' WHERE id_reserv='$id_reserv'");
    $req->execute();
}
function rejette_demande($id_reserv)
{
    global $bdd ;
    $req = $bdd->prepare("DELETE FROM demande_garde_langue_etrangere_lo07 WHERE id_reserv='$id_reserv'");
    $req->execute();
}


?>