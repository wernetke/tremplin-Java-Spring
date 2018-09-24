<?php
function verifuser($login,$pass)
{
    global $bdd ;
    $req = $bdd->query("SELECT * FROM connexion_lo07 c WHERE identifiant='".$login."' AND password='".$pass."' ");
    $req -> execute();
    $co = $req->fetchAll();
    return($co);
}
function affichercontact($code_contact)
{
    global $bdd ;
    $req = $bdd ->query ("SELECT * FROM contacts_lo07 c WHERE identifiant='".$code_contact."' " );
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}
/*function affichercontacts (){
    global $bdd ;
    $req = $bdd ->query ("SELECT * FROM connexion_lo07 c INNER JOIN contact_lo07 p ON a.identifiant=c.identifiant  AND a.code_tier = c.code_tier WHERE c.code_tier = '" . $_SESSION['code_tier'] . "'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}*/
?>