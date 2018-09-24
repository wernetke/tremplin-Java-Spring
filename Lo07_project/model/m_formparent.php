<?php
function add_child($name1,$name2,$name3)
{
    echo "<div class=\"field-wrap\"> <input type=\"text\" name='$name1' value=\"\" placeholder=\"Prénom de votre enfant\" required> </div>";
    echo "<div class=\"field-wrap\"> <input type=\"date\" name='$name2' value=\"\" placeholder=\"Prénom de votre enfant\" required> </div>";
    echo "<div class=\"field-wrap\"> <textarea name='$name3' rows=\"5\" cols=\"20\"placeholder=\"Information générale( Restriction alimentaire...)\"></textarea> </div>";
}

function afficher_form_enfant($nb_enfant){
    switch ($nb_enfant){
        case "1":
            for($i="1";$i<="1";$i++){
                add_child("prenom[]","date[]","info_enfant[]");
            }
            break;
        case "2":
            for($i="1";$i<="2";$i++){
                add_child("prenom[]","date[]","info_enfant[]");
            }
            break;
        case "3":
            for($i="1";$i<="3";$i++){
                add_child("prenom[]","date[]","info_enfant[]");
            }
            break;
        case "4":
            for($i="1";$i<="4";$i++){
                add_child("prenom[]","date[]","info_enfant[]");
            }
            break;
        case "5":
            for($i="5";$i<="5";$i++){
                add_child("prenom[]","date[]","info_enfant[]");            }
            break;
        case "6":
            for($i="6";$i<="6";$i++){
                add_child("prenom[]","date[]","info_enfant[]");            }
            break;
        case "7":
            for($i="7";$i<="7";$i++){
                add_child("prenom[]","date[]","info_enfant[]");            }
            break;
    }
    echo "<button type=\"submit\" value=\"envoi\" id=\"envoi\" name=\"envoi\" class=\"button button-block\" >Envoyer</button>";


}

function add_form_db($nb_enfant,$nom,$ville,$email,$id,$password,$liste,$liste2,$liste3){
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    switch ($nb_enfant){
        case "1":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0]

            ));
            break;
        case "2":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1]


            ));
            break;

        case "3":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1],
                'prenom3' => $liste[2],
                'date3' => $liste2[2],
                'info3' => $liste3[2]


            ));
            break;

        case "4":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3,prenom4,date4,info4)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3,:prenom4,:date4,:info4)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1],
                'prenom3' => $liste[2],
                'date3' => $liste2[2],
                'info3' => $liste3[2],
                'prenom4' => $liste[3],
                'date4' => $liste2[3],
                'info4' => $liste3[3]


            ));
            break;

        case "5":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3,prenom4,date4,info4,prenom5,date5,info5)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3,:prenom4,:date4,:info4,:prenom5,:date5,:info5)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1],
                'prenom3' => $liste[2],
                'date3' => $liste2[2],
                'info3' => $liste3[2],
                'prenom4' => $liste[3],
                'date4' => $liste2[3],
                'info4' => $liste3[3],
                'prenom5' => $liste[4],
                'date5' => $liste2[4],
                'info5' => $liste3[4]


            ));
            break;

        case "6":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3,prenom4,date4,info4,prenom5,date5,info5,prenom6,date6,info6)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3,:prenom4,:date4,:info4,:prenom5,:date5,:info5,:prenom6,:date6,:info6)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1],
                'prenom3' => $liste[2],
                'date3' => $liste2[2],
                'info3' => $liste3[2],
                'prenom4' => $liste[3],
                'date4' => $liste2[3],
                'info4' => $liste3[3],
                'prenom5' => $liste[4],
                'date5' => $liste2[4],
                'info5' => $liste3[4],
                'prenom6' => $liste[5],
                'date6' => $liste2[5],
                'info6' => $liste3[5]


            ));
            break;

        case "7":
            $req = $bdd->prepare(    'INSERT INTO demande_parent_lo07(nom,ville,email,identifiant,password,prenom1,date1,info1,prenom2,date2,info2,prenom3,date3,info3,prenom4,date4,info4,prenom5,date5,info5,prenom6,date6,info6,prenom7,date7,info7)VALUES(:nom,:ville,:email,:identifiant,:password,:prenom1,:date1,:info1,:prenom2,:date2,:info2,:prenom3,:date3,:info3,:prenom4,:date4,:info4,:prenom5,:date5,:info5,:prenom6,:date6,:info6,:prenom7,:date7,:info7)');
            $req->execute(array(
                'nom' => $nom,
                'ville' => $ville,
                'email' => $email,
                'identifiant' => $id,
                'password' => $password,
                'prenom1' => $liste[0],
                'date1' => $liste2[0],
                'info1' => $liste3[0],
                'prenom2' => $liste[1],
                'date2' => $liste2[1],
                'info2' => $liste3[1],
                'prenom3' => $liste[2],
                'date3' => $liste2[2],
                'info3' => $liste3[2],
                'prenom4' => $liste[3],
                'date4' => $liste2[3],
                'info4' => $liste3[3],
                'prenom5' => $liste[4],
                'date5' => $liste2[4],
                'info5' => $liste3[4],
                'prenom6' => $liste[5],
                'date6' => $liste2[5],
                'info6' => $liste3[5],
                'prenom7' => $liste[6],
                'date7' => $liste2[6],
                'info7' => $liste3[6]


            ));
            break;
    }

}
function verif_id_nounou()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT identifiant FROM demande_nounou_lo07 ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function verif_id_parent()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT identifiant FROM demande_parent_lo07 ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function verif_id_contacts()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT identifiant FROM contacts_lo07 ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
?>