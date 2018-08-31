<?php
function select_info_parent($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN contacts_parent_lo07 B ON A.identifiant = B.identifiant WHERE A.identifiant='$id' ");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}
function select_id_nounou_new_dispo($jour,$heure_deb,$heure_fin,$ville)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM dispo_nounou_lo07 WHERE jour_dispo = '$jour' AND heure_deb <= '$heure_deb' AND heure_fin >= '$heure_fin' AND etat_dispo='0' AND ville='$ville'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function select_id_nounou_dispo($jour,$heure_deb,$heure_fin,$ville)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM dispo_nounou_lo07 WHERE jour_dispo = '$jour' AND heure_deb <= '$heure_deb' AND heure_fin >= '$heure_fin' AND etat_dispo='1'AND ville='$ville' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function select_info_nounou_dispo_res($id,$jour)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM reservation_lo07 WHERE identifiant_nounou='$id' AND jour='$jour'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function select_info_nounou_dispo($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN dispo_nounou_lo07 B ON A.identifiant = B.identifiant LEFT JOIN contacts_nounou_lo07 C  ON A.identifiant = C.identifiant  WHERE A.identifiant='$id' ");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}
function select_info_tarif_nounou($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT gain_total FROM contacts_nounou_lo07 WHERE identifiant='$id' ");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}


function reserv_nounou($jour,$jour_deb,$jour_fin,$id,$nb_enfant,$heure_deb,$heure_fin)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // On transforme les 2 dates en timestamp
    $date1 = strtotime($jour_deb);
    $date2 = strtotime($jour_fin);

// On récupère la différence de timestamp entre les 2 précédents
    $nbJoursTimestamp = $date2 - $date1;

// ** Pour convertir le timestamp (exprimé en secondes) en jours **
// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
    $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24

    //$tarif = ($heure_fin - $heure_deb) * (15) * ($nb_enfant)*$nbJours;
    $tarif=($heure_fin-$heure_deb)*(10 + ($nb_enfant-1)*(count($jour))*($nbJours/7));

    $sel_tar = select_info_tarif_nounou($id);
    $tar_contact = $tarif + $sel_tar["gain_total"];

    foreach ($jour as $elm) {
        $req = $bdd->prepare('INSERT INTO reservation_lo07(identifiant_nounou,identifiant_parent,jour,heure_deb,heure_fin,date_ponct_deb,date_ponct_fin,tarif,id_reserv)VALUES(:identifiant_nounou,:identifiant_parent,:jour,:heure_deb,:heure_fin,:date_ponct_deb,:date_ponct_fin,:tarif,:id_reserv)');
        $req->execute(array(
            'identifiant_nounou' => $id,
            'identifiant_parent' => $_SESSION["identifiant"],
            'jour' => $elm,
            'heure_deb' => $heure_deb,
            'heure_fin' => $heure_fin,
            'date_ponct_deb' => $jour_deb,
            'date_ponct_fin' => $jour_fin,
            'tarif' => $tarif,
            'id_reserv' => uniqid()


        ));
        $req = $bdd->prepare("UPDATE dispo_nounou_lo07 SET etat_dispo='1' WHERE jour_dispo = '$elm' AND identifiant='$id'");
        $req->execute();
    }
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET gain_total='$tar_contact' WHERE identifiant='$id'");
    $req->execute();



}

function reserv_nounou_ponct($jour,$id,$nb_enfant,$heure_deb,$heure_fin,$date)
{
    try {
        global $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $tarif=($heure_fin-$heure_deb)*(7 + ($nb_enfant-1)*4);
    $sel_tar=select_info_tarif_nounou($id);
    $tar_contact=$tarif+$sel_tar["gain_total"];
        $req = $bdd->prepare('INSERT INTO reservation_lo07(identifiant_nounou,identifiant_parent,jour,heure_deb,heure_fin,tarif,date_res,id_reserv)VALUES(:identifiant_nounou,:identifiant_parent,:jour,:heure_deb,:heure_fin,:tarif,:date_res,:id_reserv)');
    $req->execute(array(
        'identifiant_nounou' => $id,
        'identifiant_parent' => $_SESSION["identifiant"],
        'jour' => $jour,
        'heure_deb' => $heure_deb,
        'heure_fin' => $heure_fin,
        'tarif' => $tarif,
        'date_res'=> $date,
        'id_reserv' => uniqid()

    ));
    $req = $bdd->prepare("UPDATE dispo_nounou_lo07 SET etat_dispo='1' WHERE jour_dispo = '$jour' AND identifiant='$id'");
    $req->execute();

    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET gain_total='$tar_contact' WHERE identifiant='$id'");
    $req->execute();

}



function select_id_hebdo()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_nounou_lo07 WHERE choix_date='tous_jours' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function select_id_hebdo_work()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_nounou_lo07 WHERE choix_date='tous_jours_work' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function select_id_hebdo_perso()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_nounou_lo07 WHERE choix_date!='tous_jours_work' AND choix_date!='tous_jours' AND Bloquer!='1' ");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function select_id_hebdo_ville($ville,$id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN dispo_nounou_lo07 B ON A.identifiant = B.identifiant WHERE  A.ville='$ville' AND A.identifiant='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function select_jour_hebdo_ville($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM dispo_nounou_lo07 WHERE  identifiant='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}


function reservation($disp_jour,$post_heure_deb,$post_heure_fin,$post_jour_deb,$post_jour_fin)
{

    $liste_jour=array();
    $liste_id_good=array();
    $liste_id_good_real=array();
    $select_id_hebdo_perso=select_id_hebdo_perso();
    $cpt_id_perso=0;
    $cpt_id=0;
    $cpt_jour_bis=0;
    $cpt_jour=0;

    foreach ($disp_jour as $elm){
        $liste_jour[]=$elm;
    }

    foreach ($select_id_hebdo_perso as $elm)
    {
        $liste_jour_perso[$elm["identifiant"]]=$elm["choix_date"];

    }
    foreach ($liste_jour_perso as $key=>$value){

        for($i=0; $i<count($liste_jour);$i++){
            if(preg_match("/".$liste_jour[$i]."/", $value)==true) {
                $cpt_id_perso = $cpt_id_perso + 1;
            }
        }

        if($cpt_id_perso==count($liste_jour)){
            $liste_id_good_perso[]=$key;
        }
        $cpt_id_perso=0;
    }
    foreach ($liste_id_good_perso as $elm)
    {
        if(select_id_hebdo_ville($_SESSION['ville'],$elm)==true)
        {
            $select_jour_hebdo_ville=select_jour_hebdo_ville($elm);
            foreach ($select_jour_hebdo_ville as $element)
            {

                if(count($disp_jour) == 1){
                    if($post_heure_deb >= $element["heure_deb"]  AND $post_heure_fin <= $element["heure_fin"] AND stristr($element["jour_dispo"], $disp_jour))
                    {

                        $cpt_id=$cpt_id+1;
                    }
                }
                if($post_heure_deb >= $element["heure_deb"]  AND $post_heure_fin <= $element["heure_fin"] AND in_array($element["jour_dispo"],$liste_jour))
                {
                    $cpt_id=$cpt_id+1;
                }

            }
            if($cpt_id==count($liste_jour) AND count($liste_jour) > 1 )
            {
                $liste_id_good[]=$elm;
            }
            if($cpt_id==1 AND count($disp_jour) == 1 )
            {
                $liste_id_good[]=$elm;
            }
            $cpt_id=0;
        }

    }

    foreach($liste_id_good as $elm) {
        if (count($liste_jour) > 1) {


            for ($i = 0; $i < count($liste_jour); $i++) {

                if (select_info_nounou_dispo_res($elm, $liste_jour[$i]) == false) {
                    $cpt_jour_bis = $cpt_jour_bis + 1;

                } elseif (select_info_nounou_dispo_res($elm, $liste_jour[$i]) == true) {
                    $sel_res = select_info_nounou_dispo_res($elm, $liste_jour[$i]);
                    foreach ($sel_res as $element) {

                        if((($post_heure_deb >= $element["heure_fin"])&&($post_heure_fin > $element["heure_fin"])) || (($post_heure_fin <= $element["heure_deb"])&&($post_heure_deb < $element["heure_deb"]))) {
                            $cpt_jour = $cpt_jour + 1;

                        }
                       else{

                           if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                               if ((($post_jour_deb > $element["date_ponct_fin"]) && ($post_jour_fin > $element["date_ponct_fin"])) || (($post_jour_fin < $element["date_ponct_deb"]) && ($post_jour_deb < $element["date_ponct_deb"]))) {
                                   $cpt_jour = $cpt_jour + 1;

                               }
                           }

                           if ($element["date_res"] != "") {
                               if ((($element["date_res"] < $post_jour_deb && $element["date_res"] < $post_jour_fin))  ||   (($element["date_res"] > $post_jour_deb && $element["date_res"] > $post_jour_fin))){
                               $cpt_jour = $cpt_jour + 1;


                               }
                           }
                       }

                    }
                    if ($cpt_jour == count($sel_res)) {
                        $cpt_jour_bis = $cpt_jour_bis + 1;
                    }
                    $cpt_jour = 0;
                }

            }

            if ($cpt_jour_bis == count($liste_jour)) {
                $liste_id_good_real[] = $elm;
            }
            $cpt_jour_bis = 0;
        }
        else{

            $sel_res=select_info_nounou_dispo_res($elm, $disp_jour);
            foreach ($sel_res as $element){
                if((($post_heure_deb >= $element["heure_fin"])&&($post_heure_fin > $element["heure_fin"])) || (($post_heure_fin <= $element["heure_deb"])&&($post_heure_deb < $element["heure_deb"]))) {
                    $cpt_jour = $cpt_jour + 1;
                }
                else{

                    if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {

                        if ((($post_jour_deb > $element["date_ponct_fin"]) && ($post_jour_fin > $element["date_ponct_fin"])) || (($post_jour_fin < $element["date_ponct_deb"]) && ($post_jour_deb < $element["date_ponct_deb"]))) {

                            $cpt_jour = $cpt_jour + 1;

                        }
                    }

                    if ($element["date_res"] != "") {
                        if ((($element["date_res"] < $post_jour_deb && $element["date_res"] < $post_jour_fin))  ||   (($element["date_res"] > $post_jour_deb && $element["date_res"] > $post_jour_fin))){

                            $cpt_jour = $cpt_jour + 1;


                        }
                    }
                }


            }
            if ($cpt_jour == count($sel_res)) {
                $liste_id_good_real[] = $elm;
            }
            $cpt_jour=0;

        }
    }
    return($liste_id_good_real);


}

function lister_reservation_faite($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_lo07 A INNER JOIN reservation_lo07 B ON A.identifiant = B.identifiant_nounou LEFT JOIN contacts_nounou_lo07 C  ON A.identifiant = C.identifiant WHERE  B.identifiant_parent='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function lister_avis_faite($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT DISTINCT id_reserv,heure_deb,heure_fin,date_ponct_deb,date_ponct_fin,date_res,etat_avis,identifiant_nounou FROM reservation_lo07  WHERE  identifiant_parent='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function update_avis($id_nounou,$avis_parent,$note,$id_reserv)
{
    global $bdd ;
    $req = $bdd->prepare('INSERT INTO evaluation_lo07(identifiant_nounou,identifiant_parent,avis_parent,note,id_reserv)VALUES(:identifiant_nounou,:identifiant_parent,:avis_parent,:note,:id_reserv)');
    $req->execute(array(
        'identifiant_nounou' => $id_nounou,
        'identifiant_parent' => $_SESSION["identifiant"],
        'avis_parent' => $avis_parent,
        'note' => $note,
        'id_reserv' => $id_reserv

    ));
    $req = $bdd->prepare("UPDATE reservation_lo07 SET etat_avis='1' WHERE id_reserv='$id_reserv'");
    $req->execute();
}

function lister_avis_reservation($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM evaluation_lo07 WHERE  identifiant_nounou='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
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

function search_langue($langue)
{
    $sel=select_id_hebdo_perso();
    $liste_langue=array();
    $liste_id=array();
    foreach ($sel as $elm)
    {
        $liste_langue[]=$elm["langue1"];
        $liste_langue[]=$elm["langue2"];
        $liste_langue[]=$elm["langue3"];
        $liste_langue[]=$elm["langue4"];
        $liste_langue[]=$elm["langue5"];
        $liste_langue[]=$elm["langue6"];
        $liste_langue[]=$elm["langue7"];
        if (in_array($langue,$liste_langue))
        {
            $liste_id[]=$elm["identifiant"];
        }

    }
    return ($liste_id);

}

function liste_langue_dispo($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM dispo_nounou_lo07 WHERE  identifiant='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}

function demande_garde_langue($id_nounou,$langue,$texte_reponse)
{
    global $bdd ;
    $req = $bdd->prepare('INSERT INTO demande_garde_langue_etrangere_lo07(id_nounou,id_parent,langue,id_reserv,texte_reponse)VALUES(:identifiant_nounou,:identifiant_parent,:langue,:id_reserv,:texte_reponse)');
    $req->execute(array(
        'identifiant_nounou' => $id_nounou,
        'identifiant_parent' => $_SESSION["identifiant"],
        'langue' => $langue,
        'id_reserv' => uniqid(),
        'texte_reponse' => $texte_reponse

    ));

}
function select_demande_langue($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM demande_garde_langue_etrangere_lo07 WHERE id_parent='$id'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}
function select_demande_langue_fin($id)
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM demande_garde_langue_etrangere_lo07 WHERE  id_reserv='$id'");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}
function insert_demande($id_reserv)
{
    global $bdd ;
    $sel=select_demande_langue_fin($id_reserv);
    $liste_heure = explode("/", $sel["jour"]);
    $jour_eng_ponct=date("l", mktime(0, 0, 0, $liste_heure[0], $liste_heure[1]-1, $liste_heure[2]));
    switch ($jour_eng_ponct){
        case "Monday" :
            $jour_ponct="lundi";
            break;
        case "Tuesday" :
            $jour_ponct="mardi";
            break;
        case "Wednesday" :
            $jour_ponct="mercredi";
            break;
        case "Thursday" :
            $jour_ponct="jeudi";
            break;
        case "Friday" :
            $jour_ponct="vendredi";
            break;
        case "Saturday" :
            $jour_ponct="samedi";
            break;
        case "Sunday" :
            $jour_ponct="dimanche";
            break;
    }
    $sell=select_info_parent($_SESSION["identifiant"]);
    $liste_enfant=0;
    if($sell["prenom1"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom2"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom3"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom4"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom5"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom6"]!=""){
        $liste_enfant=$liste_enfant+1;
    }
    if($sell["prenom7"]!=""){
        $liste_enfant=$liste_enfant+1;
    }

    $tarif = ($sel["heure_fin"] - $sel["heure_deb"]) * (15) * ($liste_enfant);

    $req = $bdd->prepare('INSERT INTO reservation_lo07(identifiant_nounou,identifiant_parent,langue,jour,heure_deb,heure_fin,date_res,id_reserv,tarif)VALUES(:identifiant_nounou,:identifiant_parent,:langue,:jour,:heure_deb,:heure_fin,:date_res,:id_reserv,:tarif)');
    $req->execute(array(
        'identifiant_nounou' => $sel["id_nounou"],
        'identifiant_parent' => $_SESSION["identifiant"],
        'langue' => $sel["langue"],
        'jour' => $jour_ponct,
        'heure_deb' => $sel["heure_deb"],
        'heure_fin' => $sel["heure_fin"],
        'date_res' => $sel["jour"],
        'id_reserv' => $sel["id_reserv"],
        'tarif' => $tarif

    ));
    $id=$sel["id_nounou"];
    $sel_tar = select_info_tarif_nounou($id);

    $tar_contact=$tarif+$sel_tar["gain_total"];
    $req = $bdd->prepare("UPDATE contacts_nounou_lo07 SET gain_total='$tar_contact' WHERE identifiant='$id'");
    $req->execute();

    $req = $bdd->prepare("DELETE FROM demande_garde_langue_etrangere_lo07 WHERE id_reserv='$id_reserv'");
    $req->execute();


}

function rejette_demande($id_reserv)
{
    global $bdd ;
    $req = $bdd->prepare("DELETE FROM demande_garde_langue_etrangere_lo07 WHERE id_reserv='$id_reserv'");
    $req->execute();
}


?>