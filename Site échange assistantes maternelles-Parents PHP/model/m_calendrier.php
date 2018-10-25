<?php

function mois($nb)
{
    $key = $nb - 1;

    $ap = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

    return $ap[$key];
}

function select_choix_date()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM contacts_nounou_lo07 WHERE identifiant='".$_SESSION["identifiant"]."'");
    $req -> execute();
    $contact = $req -> fetch();
    return ($contact);
}

function select_reserv()
{
    global $bdd ;
    $req = $bdd ->query (    "SELECT * FROM reservation_lo07 WHERE identifiant_nounou='".$_SESSION["identifiant"]."'");
    $req -> execute();
    $contact = $req -> fetchAll();
    return ($contact);
}



function calendrier($mois,$anne)
{

    $nbjour = cal_days_in_month( CAL_GREGORIAN, $mois, $anne); // nombre de jour dans le mois
    $jour_semaine=array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
    $jour_semaine_dim=array("Lun","Mar","Mer","Jeu","Ven","Sam","Dim");


    $select_choix_date=select_choix_date();
    $select_reserv=select_reserv();


    $liste_choix = explode(" ", $select_choix_date["choix_date"]);
    $lun=0;$mar=0;$mer=0;$jeu=0;$ven=0;$sam=0;$dim=0;
    foreach ($liste_choix as $elm)
    {
        if($elm=="lundi"){
            $lun=1;
        }
        if($elm=="mardi"){
            $mar=1;
        }
        if($elm=="mercredi"){
            $mer=1;
        }
        if($elm=="jeudi"){
            $jeu=1;
        }
        if($elm=="vendredi"){
            $ven=1;
        }
        if($elm=="samedi"){
            $sam=1;
        }
        if($elm=="dimanche"){
            $dim=1;
        }
    }

    echo "<table class='p' >";
    foreach ($jour_semaine as $elm){
        echo "<td class='plein_lar'> $elm </td>";
    }
    echo "<div class='plein_case'>";
    foreach ($jour_semaine_dim as $elm){
        echo "<td class='plein_dim''> $elm </td>";
    }
    echo "</div>";
    $un="deux";
    for($i = 1; $nbjour >= $i; $i++)
    {
        $p = cal_to_jd(CAL_GREGORIAN, $mois, $i, $anne); // formater jour

        $jourweek = jddayofweek($p); // jour de la semaine
        switch($jourweek)
        {
            case "1":
                $jourweek_char="lundi";
                break;
            case "2":
                $jourweek_char="mardi";
                break;
            case "3":
                $jourweek_char="mercredi";
                break;
            case "4":
                $jourweek_char="jeudi";
                break;
            case "5":
                $jourweek_char="vendredi";
                break;
            case "6":
                $jourweek_char="samedi";
                break;
            case "7":
                $jourweek_char="dimanche";
                break;

        }

        if($i == $nbjour)
        {

            if($jourweek == 1)
            {
                echo "<tr>";
            }

            if(($jourweek == 1 && $lun==1) || ($jourweek == 2 && $mar==1) ||($jourweek == 3 && $mer==1) ||($jourweek == 4 && $jeu==1) ||($jourweek == 5 && $ven==1) ||($jourweek == 6 && $sam==1) ||($jourweek == 0 && $dim==1) )
            {
                if( $select_choix_date["Bloquer"]==1 && strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($select_choix_date["date_bloquer"] )){
                    echo "<td class='plein_bloc'>" . $i . "<table>";

                    foreach ($select_reserv as $element) {
                        if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                            if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"])) && ($jourweek_char==$element["jour"]) ) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        } elseif ($element["date_res"] != "") {
                            if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        }
                    }

                    echo "</table></td>";


                }

                else {
                    echo "<td class='plein_work'>" . $i . "<table>";

                    foreach ($select_reserv as $element) {
                        if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                            if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"])) && ($jourweek_char==$element["jour"]) ) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        } elseif ($element["date_res"] != "") {
                            if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        }
                    }
                    echo "</table></td>";
                }


            }
            else{
                echo "<td class='plein'>".$i."</td>";
            }
        }
        else if($i == 1)
        {
            echo "<tr>";


            if($jourweek == 0)
            {
                $jourweek = 7;
            }


            for($b = 1 ;$b != $jourweek; $b++)
            {
                echo "<td></td>";
            }



            if(($jourweek == 1 && $lun==1) || ($jourweek == 2 && $mar==1) ||($jourweek == 3 && $mer==1) ||($jourweek == 4 && $jeu==1) ||($jourweek == 5 && $ven==1) ||($jourweek == 6 && $sam==1) ||($jourweek == 0 && $dim==1) )
            {

                if( $select_choix_date["Bloquer"]==1 && strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($select_choix_date["date_bloquer"] )){
                    echo "<td class='plein_bloc'>" . $i . "<table>";

                    foreach ($select_reserv as $element) {
                        if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                            if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"]))) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        } elseif ($element["date_res"] != "") {
                            if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        }
                    }

                    echo "</table></td>";


                }

                else {
                    echo "<td class='plein_work'>" . $i . "<table>";

                    foreach ($select_reserv as $element) {
                        if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                            if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"])) && ($jourweek_char==$element["jour"]) ) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        } elseif ($element["date_res"] != "") {
                            if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        }
                    }
                    echo "</table></td>";
                }

            }



            else{
                echo "<td class='plein'>".$i."</td>";
            }

            if($jourweek == 7)
            {
                echo "</tr>";
            }


        }
        else
        {
            if($jourweek == 1)
            {
                echo "<tr>";
            }


            if(($jourweek == 1 && $lun==1) || ($jourweek == 2 && $mar==1) ||($jourweek == 3 && $mer==1) ||($jourweek == 4 && $jeu==1) ||($jourweek == 5 && $ven==1) ||($jourweek == 6 && $sam==1) ||($jourweek == 0 && $dim==1) )
            {
                if( $select_choix_date["Bloquer"]==1 && strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($select_choix_date["date_bloquer"] )){
                    echo "<td class='plein_bloc'>" . $i . "<table>";

                    foreach ($select_reserv as $element) {

                        if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                            if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"])) && ($jourweek_char==$element["jour"]) ) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        } elseif ($element["date_res"] != "") {
                            if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";
                            }
                        }
                    }

                    echo "</table></td>";


                }

                else {
                        echo "<td class='plein_work'>" . $i . "<table>";
                        foreach ($select_reserv as $element) {

                            if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "") {
                                if ((strtotime($mois . "/" . $i . "/" . $anne) >= strtotime($element["date_ponct_deb"])) && (strtotime($mois . "/" . $i . "/" . $anne) <= strtotime($element["date_ponct_fin"])) && ($jourweek_char==$element["jour"]) ) {
                                    echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";


                                }
                            } elseif ($element["date_res"] != "") {
                                if (strtotime($mois . "/" . $i . "/" . $anne) == strtotime($element["date_res"])) {
                                   echo "<tr><td class='plein_work_reserv'>" . $element["heure_deb"] . "h - " . $element["heure_fin"] . "h</td></tr>";

                                }
                            }
                        }

                        echo "</table></td>";
                    }

            }

            else{
                echo "<td class='plein'>" . $i . "</td>";
            }

            if($jourweek == 0)
            {
                echo "</tr>";
            }
        }

    }

    echo "</table>";

}

?>