<?php
function add_form__nounou_db($nom,$prenom,$ville,$email,$id,$password,$age,$exp,$pre,$liste,$photo)
{

    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
        $nb = count($liste);
        switch ($nb) {
            case "1":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'photo' => $photo

                ));

                break;
            case "2":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'photo' => $photo

                ));
                break;

            case "3":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,langue3,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:langue3,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'langue3' => $liste[2],
                    'photo' => $photo

                ));
                break;

            case "4":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,langue3,langue4,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:langue3,:langue4,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'langue3' => $liste[2],
                    'langue4' => $liste[3],
                    'photo' => $photo

                ));
                break;

            case "5":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,langue3,langue4,langue5,photo)VALUES(:nom,:prenom::ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:langue3,:langue4,:langue5,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'langue3' => $liste[2],
                    'langue4' => $liste[3],
                    'langue5' => $liste[4],
                    'photo' => $photo

                ));
                break;

            case "6":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,langue3,langue4,langue5,langue6,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:langue3,:langue4,:langue5,:langue6,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'langue3' => $liste[2],
                    'langue4' => $liste[3],
                    'langue5' => $liste[4],
                    'langue6' => $liste[5],
                    'photo' => $photo

                ));
                break;

            case "7":
                $req = $bdd->prepare('INSERT INTO demande_nounou_lo07(nom,prenom,ville,email,identifiant,password,age,experience,presentation,langue1,langue2,langue3,langue4,langue5,langue6,langue7,photo)VALUES(:nom,:prenom,:ville,:email,:identifiant,:password,:age,:experience,:presentation,:langue1,:langue2,:langue3,:langue4,:langue5,:langue6,:langue7,:photo)');
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'ville' => $ville,
                    'email' => $email,
                    'identifiant' => $id,
                    'password' => $password,
                    'age' => $age,
                    'experience' => $exp,
                    'presentation' => $pre,
                    'langue1' => $liste[0],
                    'langue2' => $liste[1],
                    'langue3' => $liste[2],
                    'langue4' => $liste[3],
                    'langue5' => $liste[4],
                    'langue6' => $liste[5],
                    'langue7' => $liste[6],
                    'photo' => $photo

                ));
                break;
        }

        // tes instructions ici
    /*catch (Exception $e) {
        var_export([
            'Error' => $e->getMessage(),
            'File' => $e->getFile(),
            'Line' => $e->getLine(),
            'Trace' => $e->getTraceAsString()
        ]);
    } catch (Error $e) {
        var_export([
            'Error' => $e->getMessage(),
            'File' => $e->getFile(),
            'Line' => $e->getLine(),
            'Trace' => $e->getTraceAsString()
        ]);
    }

    exit;*/
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