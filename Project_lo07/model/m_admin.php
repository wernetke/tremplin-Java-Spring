<?php

function select_info_admin($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 WHERE identifiant='".$id."'");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}

function infos_parents($liste_infos)
{
    global $bdd ;
    $requete = 'SELECT * FROM demande_parent_lo07';
    $resultat = $bdd->query($requete);

    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $liste_infos[$ligne["nom"]]=array(
            'nom' => $ligne['nom'],
            'ville' => $ligne['ville'],
            'email' => $ligne['email'],
            'identifiant' => $ligne['identifiant'],
            'password' => $ligne['password'],
            'prenom1' => $ligne['prenom1'],
            'date1' => $ligne['date1'],
            'info1' => $ligne['info1'],
            'prenom2' => $ligne['prenom2'],
            'date2' => $ligne['date2'],
            'info2' => $ligne['info2'],
            'prenom3' => $ligne['prenom3'],
            'date3' => $ligne['date3'],
            'info3' => $ligne['info3'],
            'prenom4' => $ligne['prenom4'],
            'date4' => $ligne['date4'],
            'info4' => $ligne['info4'],
            'prenom5' => $ligne['prenom5'],
            'date5' => $ligne['date5'],
            'info5' => $ligne['info5'],
            'prenom6' => $ligne['prenom6'],
            'date6' => $ligne['date6'],
            'info6' => $ligne['info6'],
            'prenom7' => $ligne['prenom7'],
            'date7' => $ligne['date7'],
            'info7' => $ligne['info7']);
    }
    return $liste_infos;
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

function select_info($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM demande_parent_lo07 WHERE identifiant='".$id."'");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}

function add_info($id)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $elm=select_info($id);

        $req = $bdd->prepare(    'INSERT INTO contacts_lo07(utilisateur,nom,ville,email,identifiant,password)VALUES("2",:nom,:ville,:email,:identifiant,:password)');
        $req->execute(array(
            'nom' => $elm["nom"],
            'ville' => $elm["ville"],
            'email' => $elm["email"],
            'identifiant' => $elm["identifiant"],
            'password' => $elm["password"]

        ));
    $req = $bdd->prepare(    'INSERT INTO contacts_parent_lo07(identifiant,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3,prenom4,date4,info4,prenom5,date5,info5,prenom6,date6,info6,prenom7,date7,info7)VALUES(:identifiant,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3,:prenom4,:date4,:info4,:prenom5,:date5,:info5,:prenom6,:date6,:info6,:prenom7,:date7,:info7)');
    $req->execute(array(
        'identifiant' => $elm["identifiant"],
        'prenom1' => $elm["prenom1"],
        'date1' => $elm["date1"],
        'info1' => $elm["info1"],
        'prenom2' => $elm["prenom2"],
        'date2' => $elm["date2"],
        'info2' => $elm["info2"],
        'prenom3' => $elm["prenom3"],
        'date3' => $elm["date3"],
        'info3' => $elm["info3"],
        'prenom4' => $elm["prenom4"],
        'date4' => $elm["date4"],
        'info4' => $elm["info4"],
        'prenom5' => $elm["prenom5"],
        'date5' => $elm["date5"],
        'info5' => $elm["info5"],
        'prenom6' => $elm["prenom6"],
        'date6' => $elm["date6"],
        'info6' => $elm["info6"],
        'prenom7' => $elm["prenom7"],
        'date7' => $elm["date7"],
        'info7' => $elm["info7"]
    ));
        $req = $bdd->prepare(    'INSERT INTO connexion_lo07(identifiant,password,utilisateur)VALUES(:identifiant,:password,"2")');
        $req->execute(array(
            'identifiant' => $elm["identifiant"],
            'password' => $elm["password"]
        ));

        $req = $bdd ->query (    "DELETE FROM `demande_parent_lo07` WHERE identifiant='".$id."'");
        $req -> execute();

}
function delete_info($id)
{
    global $bdd ;
    $req = $bdd ->query (    "DELETE FROM `demande_parent_lo07` WHERE identifiant='".$id."'");
    $req -> execute();
}
function delete_info_nounou($id)
{
    global $bdd ;
    $req = $bdd ->query (    "DELETE FROM `demande_nounou_lo07` WHERE identifiant='".$id."'");
    $req -> execute();
}



function infos_nounou($liste_infos)
{
    global $bdd ;
    $requete = 'SELECT * FROM demande_nounou_lo07';
    $resultat = $bdd->query($requete);

    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $liste_infos[$ligne["nom"]]=array(
            'nom' => $ligne['nom'],
            'ville' => $ligne['ville'],
            'email' => $ligne['email'],
            'identifiant' => $ligne['identifiant'],
            'password' => $ligne['password'],
            'age' => $ligne["age"],
            'experience' => $ligne["experience"],
            'presentation' => $ligne["presentation"],
            'langue1' => $ligne["langue1"],
            'langue2' => $ligne["langue2"],
            'langue3' => $ligne["langue3"],
            'langue4' => $ligne["langue4"],
            'langue5' => $ligne["langue5"],
            'langue6' => $ligne["langue6"],
            'langue7' => $ligne["langue7"],
            'photo' => $ligne["photo"]);
    }
    return $liste_infos;
}

function box_nounou($langue1,$langue2,$langue3,$langue4,$langue5,$langue6,$langue7)
{
    if ($langue1!="" ){
        echo "<h2>Langue:</h2><p> $langue1</p>";
    }
    if ($langue2!="" ){
        echo "<h2>Langue:</h2><p> $langue2</p>";
    }
    if ($langue3!="" ){
        echo "<h2>Langue:</h2><p> $langue3</p>";
    }
    if ($langue4!="" ){
        echo "<h2>Langue:</h2><p> $langue4</p>";
    }
    if ($langue5!="" ){
        echo "<h2>Langue:</h2><p> $langue5</p>";
    }
    if ($langue6!="" ){
        echo "<h2>Langue:</h2><p> $langue6</p>";
    }
    if ($langue7!="" ){
        echo "<h2>Langue:</h2><p> $langue7</p>";
    }
}

function select_info_nounou($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM demande_nounou_lo07 WHERE identifiant='".$id."'");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}

function add_info_nounou($id)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $ligne=select_info_nounou($id);

    $req = $bdd->prepare('INSERT INTO contacts_lo07(utilisateur,nom,ville,email,identifiant,password)VALUES("3",:nom,:ville,:email,:identifiant,:password)');
    $req->execute(array(
        'nom' => $ligne["nom"],
        'ville' => $ligne["ville"],
        'email' => $ligne["email"],
        'identifiant' => $ligne["identifiant"],
        'password' => $ligne["password"]
    ));
    $req = $bdd->prepare('INSERT INTO contacts_nounou_lo07(prenom_nounou,identifiant,age,experience,presentation,langue1,langue2,langue3,langue4,langue5,langue6,langue7,photo,choix_date)VALUES(:prenom,:identifiant,:age,:experience,:presentation,:langue1,:langue2,:langue3,:langue4,:langue5,:langue6,:langue7,:photo,"0")');
    $req->execute(array(
        'prenom' => $ligne["prenom"],
        'identifiant' => $ligne["identifiant"],
        'age' => $ligne["age"],
        'experience' => $ligne["experience"],
        'presentation' => $ligne["presentation"],
        'langue1' => $ligne["langue1"],
        'langue2' => $ligne["langue2"],
        'langue3' => $ligne["langue3"],
        'langue4' => $ligne["langue4"],
        'langue5' => $ligne["langue5"],
        'langue6' => $ligne["langue6"],
        'langue7' => $ligne["langue7"],
        'photo' => $ligne["photo"]
    ));
    $req = $bdd->prepare(    'INSERT INTO connexion_lo07(identifiant,password,utilisateur)VALUES(:identifiant,:password,"3")');
    $req->execute(array(
        'identifiant' => $ligne["identifiant"],
        'password' => $ligne["password"]
    ));
    $req = $bdd ->prepare(    "DELETE FROM `demande_nounou_lo07` WHERE identifiant='".$id."'");
    $req -> execute();

}

function select_cont_nounou()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN contacts_nounou_lo07 B ON A.identifiant = B.identifiant WHERE A.utilisateur='3' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function select_cont_parent()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN contacts_parent_lo07 B ON A.identifiant = B.identifiant WHERE A.utilisateur='2' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function bloc_nounou($id)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $date=date("m.d.y");
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET Bloquer='1',date_bloquer='$date' WHERE  identifiant='$id'");
    $req->execute();
}
function deblock_nounou($id)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $date=date("m.d.y");
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET Bloquer='0',date_bloquer='$date' WHERE  identifiant='$id'");
    $req->execute();
}
function liste_nounou_revenu()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_nounou_lo07 ORDER BY gain_total DESC");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

?>