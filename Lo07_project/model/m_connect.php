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

?>