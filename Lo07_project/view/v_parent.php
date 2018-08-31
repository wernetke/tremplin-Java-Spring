<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Parent - Lo07-project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="bootstrap-datepicker.fr.min.js"></script>
    <script type="text/javascript" src="../js/ListeEtoile.js"></script>


</head>
<body>
<div class="container">
    <div class="container_deux">


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" >Famille <span><?php echo $sel_contact_parent_info["nom"]?></span></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-custom">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a id="notif" href="#notification">Tableau de bord</a>
                        </li>

                        <li>
                            <a id="ponct" href="#garde_ponct">Garde ponctuelle</a>
                        </li>

                        <li>
                            <a id="creche" href="#garde_creche">Garde hebdomadaire</a>
                        </li>

                        <li>
                            <a id="search" href="#search_langue">Garde langue étrangère</a>
                        </li>

                        <li>
                            <a id="reser" href="#reservation">Réservation</a>
                        </li>


                    </ul>

                </div>
            </div>
        </nav>


        <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
            <div class="profil">
                <fieldset class="field">
                    <h1>Profil Famille</h1>
                    <h2>Coordonnées</h2>
                    <h3>Nom:</h3><p> <?php echo $sel_contact_parent_info["nom"]?></p>
                    <h3>Ville:</h3><p> <?php echo $sel_contact_parent_info["ville"]?></p>
                    <h3>Email:</h3> <p><?php echo $sel_contact_parent_info["email"]?></p>
                </fieldset>
            </div>
        </div>

        <div id="notification">
            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">

                <?php foreach($select_demande_langue as $element)
                    {?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <form method="post" action="">
                        <div class="white-box">
                            <div class="info-box__close">
                                <div class="info-box__title">
                                    <h3 class="box-title">Demande de garde</h3>
                                    <h4 class="box-title-plus">Langue <?php echo $element["langue"] ?> </h4>
                                </div>
                                <div class="info-box__content" style="display:none;">

                                    <h2>Jour:</h2>
                                    <p> <?php echo $element["jour"] ?></p>
                                    <h2>Heure de début:</h2>
                                    <p><?php echo $element["heure_deb"] ?></p>
                                    <h2>Heure de fin:</h2>
                                    <p> <?php echo $element["heure_fin"] ?></p>

                                    <input type="hidden" name="id_reservation" value="<?php echo $element["id_reserv"]?>">

                                    <button type="submit" value="insert_demande" id="insert_demande" name="submit"
                                            class="btn btn-success">Ajouter
                                    </button>
                                    <button type="submit" value="rejette_demande" id="rejette_demande" name="submit"
                                            class="btn btn-danger">Rejetter
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                    <?php }

                foreach($lister_avis_faite as $element)
                {
                    if ($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "" && $element["etat_avis"]!=1) {
                        if(strtotime($element["date_ponct_fin"]) < strtotime("now"))
                        { ?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <form method="post" action="">
                                    <div class="white-box">
                                        <div class="info-box__close">
                                            <div class="info-box__title">
                                                <h3 class="box-title">Laisser un avis pour la réservation du <?php echo $element["date_ponct_deb"]." au ".$element["date_ponct_fin"] ?></h3>
                                                <h4 class="box-title-plus">De <?php echo $element["heure_deb"]."h à ".$element["heure_fin"]."h" ?> </h4>
                                            </div>
                                            <div class="info-box__content" style="display:none;">
                                                <h4 class="box-title-plus">Evaluer sur 5 l'assistant(e) maternel(le):</h4>
                                                <!--<div id='<?php//echo $element["id_reserv"]; ?>'><script type='text/javascript'>CreateListeEtoile('<?php// echo $element["id_reserv"]; ?>',5);</script></div>!-->
                                                <input type="radio" name="note_nounou" value="1" class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>1/5
                                                <input type="radio" name="note_nounou" value="2"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>2/5
                                                <input type="radio" name="note_nounou" value="3"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>3/5
                                                <input type="radio" name="note_nounou" value="4"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>4/5
                                                <input type="radio" name="note_nounou" value="5"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>5/5

                                                </br><textarea name="text_avis" rows="5" cols="20"placeholder="Laisser un avis"></textarea></br>
                                                <input type="hidden" name="id_nounou" value="<?php echo $element["identifiant_nounou"]?>">
                                                <input type="hidden" name="id_reservation" value="<?php echo $element["id_reserv"]?>">

                                                <button type="submit" value="envoi_avis" id="envoi_avis" name="submit"
                                                        class="btn btn-success">Envoyer
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        <?php }

                    }
                    elseif ($element["date_res"] != ""&& $element["etat_avis"]!=1) {
                        if(strtotime($element["date_res"]) < strtotime("now"))
                        {?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <form method="post" action="">
                                    <div class="white-box">
                                        <div class="info-box__close">
                                            <div class="info-box__title">
                                                <h3 class="box-title">Laisser un avis pour la réservation du <?php echo $element["date_res"]?></h3>
                                                <h4 class="box-title-plus">De <?php echo $element["heure_deb"]."h à ".$element["heure_fin"]."h" ?> </h4>
                                            </div>
                                            <div class="info-box__content" style="display:none;">
                                                <h4 class="box-title-plus">Evaluer sur 5 l'assistant(e) maternel(le):</h4>
                                                <!--<div id='<?php//echo $element["id_reserv"]; ?>'><script type='text/javascript'>CreateListeEtoile('<?php// echo $element["id_reserv"]; ?>',5);</script></div>!-->
                                                <input type="radio" name="note_nounou" value="1" class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>1/5
                                                <input type="radio" name="note_nounou" value="2"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>2/5
                                                <input type="radio" name="note_nounou" value="3"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>3/5
                                                <input type="radio" name="note_nounou" value="4"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>4/5
                                                <input type="radio" name="note_nounou" value="5"  class="glyphicon glyphicon-star-empty" style="display: inline; width: 3%"/>5/5

                                                </br><textarea name="text_avis" rows="5" cols="20"placeholder="Laisser un avis"></textarea></br>
                                                <input type="hidden" name="id_nounou" value="<?php echo $element["identifiant_nounou"]?>">
                                                <input type="hidden" name="id_reservation" value="<?php echo $element["id_reserv"]?>">

                                                <button type="submit" value="envoi_avis" id="envoi_avis" name="submit"
                                                        class="btn btn-success">Envoyer
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        <?php }

                    }

                }
                ?>
            </div>
        </div>

        <div id="search_langue" style="display:none;">
            <?php if($suivant2==0){?>
            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                <div id="dispo_parent_garde">
                    <div class="title_form_ponct">
                        <h1>Demande de garde avec langue étrangère</h1>
                    </div>
                    <p style="color:#FF0000; text-align: center;">
                        <?php
                        if ($erreur==1)
                            echo $erreur1;

                        ?>
                    </p>
                    <p style="color:#cad200; text-align: center;">
                        <?php
                        if ($erreur==2)
                            echo "Les informations entrées ici ont bien été prises en compte";

                        ?>
                    </p>
                    <form action="c_parent.php" method="post">



                        <h2>Langue:</br></h2>
                        <div class="langue">
                            <select name="langue_search" >
                                <option value="Français">Français</option>
                                <option value="Anglais">Anglais</option>
                                <option value="Espagnol">Espagnol</option>
                                <option value="Allemand">Allemand</option>
                                <option value="Arabe">Arabe</option>
                                <option value="Russe">Russe</option>
                                <option value="Chinois">Chinois</option>
                            </select>
                        </div>

                        <button type="submit" value="envoi_dispo_parent_langue" id="envoi_dispo_parent_langue" name="envoi_dispo_parent_langue" class="button button-block" >Suivant</button>
                    </form>
                </div>
            </div>
            <?php }
            else{?>
            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
            <?php
                for ($i=0; $i<count($liste_search_langue); $i++)
                {
                    $element=select_info_nounou_dispo($liste_search_langue[$i]);
                    if ($element["nom"]!="") {

                        ?>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <form method="post" action="">
                                <div class="white-box">
                                    <div class="info-box__close">
                                        <div class="info-box__title">
                                            <h3 class="box-title">Assistant(e)
                                                maternel(le) <?php echo $element["nom"] ?></h3>
                                        </div>
                                        <div class="info-box__content" style="display:none;">
                                            <img src="../avatar/<?php echo $element["photo"] ?>" width="300"/>
                                            <h2>Ville:</h2>
                                            <p> <?php echo $element["ville"] ?></p>
                                            <h2>Email:</h2>
                                            <p><?php echo $element["email"] ?></p>
                                            <h2>Age:</h2>
                                            <p> <?php echo $element["age"] ?></p>
                                            <h2>Expérience:</h2>
                                            <p> <?php echo $element["experience"] ?></p>
                                            <h2>Présentation:</h2>
                                            <p> <?php echo $element["presentation"] ?></p>
                                            <input type="hidden" name="id_nounou"
                                                   value="<?php echo $element["identifiant"] ?>">
                                            <?php
                                           // box_nounou($element["langue1"], $element["langue2"], $element["langue3"], $element["langue4"], $element["langue5"], $element["langue6"], $element["langue7"]) ?>
                                            <h2>Disponibilité:</h2>
                                            <?php $liste_langue_dispo=liste_langue_dispo($element["identifiant"]);
                                            foreach($liste_langue_dispo as $elem){?>
                                                   <p> <?php echo $elem["jour_dispo"].": ".$elem["heure_deb"]."h à ".$elem["heure_fin"]."h </br>";   ?></p>
                                            <?php } ?>
                                            <h2>Evaluation</h2>
                                            <p>
                                                <?php
                                                $eval = lister_eval_nounou($element["identifiant"]);
                                                lister_star($eval); ?>
                                            </p>
                                            <h2>Liste des avis:</h2>
                                            <p><?php $lister_avis_reservation = lister_avis_reservation($element["identifiant"]);
                                                foreach ($lister_avis_reservation as $elm) {
                                                    echo "Famille " . $elm["identifiant_parent"] . " :</br>";
                                                    echo $elm["avis_parent"] . "</br>";

                                                } ?></p>

                                            </br><textarea name="text_avis" rows="5" cols="20"placeholder="Informations supplémentaires"></textarea></br>

                                            <button type="submit" value="demande_nounou_langue" id="demande_nounou_langue"
                                                    name="submit"
                                                    class="btn btn-success">Faire une demande
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php
                    } }?>
            </div>
            <?php } ?>
        </div>

        <div id="garde_ponct" style="display:none;">
            <?php if($suivant1==0){?>
                <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                    <div id="dispo_parent_garde">
                        <div class="title_form_ponct">
                            <h1>Demande de garde ponctuelle</h1>
                        </div>
                        <p style="color:#FF0000; text-align: center;">
                            <?php
                            if ($erreur==1)
                                echo $erreur1;

                            ?>
                        </p>
                        <p style="color:#cad200; text-align: center;">
                            <?php
                            if ($erreur==2)
                                echo "Les informations entrées ici ont bien été prises en compte";

                            ?>
                        </p>
                        <form action="c_parent.php" method="post">

                            <h2>Jour</h2>

                            <input class="datepicker" name="jour_deb_ponct" data-date-format="mm/dd/yyyy">

                            <h2>Nombre d'enfant à garder:</br></h2>
                            <div class="disp_nb_enfant">
                                <select name="disp_enfant">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>

                            <h2>Heure de début:</br></h2>
                            <div class="disp_heure">
                                <select name="heure_deb">
                                    <option value="1">1h</option>
                                    <option value="2">2h</option>
                                    <option value="3">3h</option>
                                    <option value="4">4h</option>
                                    <option value="5">5h</option>
                                    <option value="6">6h</option>
                                    <option value="7">7h</option>
                                    <option value="8">8h</option>
                                    <option value="9">9h</option>
                                    <option value="10">10h</option>
                                    <option value="11">11h</option>
                                    <option value="12">12h</option>
                                    <option value="13">13h</option>
                                    <option value="14">14h</option>
                                    <option value="15">15h</option>
                                    <option value="16">16h</option>
                                    <option value="17">17h</option>
                                    <option value="18">18h</option>
                                    <option value="19">19h</option>
                                    <option value="20">20h</option>
                                    <option value="21">21h</option>
                                    <option value="22">22h</option>
                                    <option value="23">23h</option>
                                    <option value="24">24h</option>

                                </select>
                            </div>

                            <h2>Heure de fin:</br></h2>
                            <div class="disp_heure">
                                <select name="heure_fin">
                                    option value="1">1h</option>
                                    <option value="2">2h</option>
                                    <option value="3">3h</option>
                                    <option value="4">4h</option>
                                    <option value="5">5h</option>
                                    <option value="6">6h</option>
                                    <option value="7">7h</option>
                                    <option value="8">8h</option>
                                    <option value="9">9h</option>
                                    <option value="10">10h</option>
                                    <option value="11">11h</option>
                                    <option value="12">12h</option>
                                    <option value="13">13h</option>
                                    <option value="14">14h</option>
                                    <option value="15">15h</option>
                                    <option value="16">16h</option>
                                    <option value="17">17h</option>
                                    <option value="18">18h</option>
                                    <option value="19">19h</option>
                                    <option value="20">20h</option>
                                    <option value="21">21h</option>
                                    <option value="22">22h</option>
                                    <option value="23">23h</option>
                                    <option value="24">24h</option>
                                </select>
                            </div>

                            <button type="submit" value="envoi_dispo_parent_ponct" id="envoi_dispo_parent_ponct" name="envoi_dispo_parent_ponct" class="button button-block" >Suivant</button>
                        </form>
                    </div>
                </div>
            <?php } else {
            ?>
            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7"id="info_garde_nounou_ponct">

                <form method="post" action="">
                    <button type="submit" value="retour_two" id="retour_two" name="submit" class="btn btn-success">Retour</button>
                </form>

                <?php
                for ($i=0; $i<count($liste_ponct_new); $i++)
                {
                    $element=select_info_nounou_dispo($liste_ponct_new[$i]);

                    ?>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <form method="post" action="">
                            <div class="white-box">
                                <div class="info-box__close">
                                    <div class="info-box__title">
                                        <h3 class="box-title">Assistant(e)
                                            maternel(le) <?php echo $element["nom"] ?></h3>
                                    </div>
                                    <div class="info-box__content" style="display:none;">
                                        <img src="../avatar/<?php echo $element["photo"] ?>" width="300"/>
                                        <h2>Ville:</h2>
                                        <p> <?php echo $element["ville"] ?></p>
                                        <h2>Email:</h2>
                                        <p><?php echo $element["email"] ?></p>
                                        <h2>Age:</h2>
                                        <p> <?php echo $element["age"] ?></p>
                                        <h2>Expérience:</h2>
                                        <p> <?php echo $element["experience"] ?></p>
                                        <h2>Présentation:</h2>
                                        <p> <?php echo $element["presentation"] ?></p>
                                        <input type="hidden" name="id_nounou" value="<?php echo $element["identifiant"] ?>">
                                        <?php
                                        box_nounou($element["langue1"], $element["langue2"], $element["langue3"], $element["langue4"], $element["langue5"], $element["langue6"], $element["langue7"]) ?>
                                        <h2>Evaluation</h2>
                                        <p>
                                        <?php
                                        $eval=lister_eval_nounou($element["identifiant"]);
                                        lister_star($eval); ?>
                                        </p>
                                        <h2>Liste des avis:</h2>
                                        <p><?php $lister_avis_reservation=lister_avis_reservation($element["identifiant"]);
                                            foreach ($lister_avis_reservation as $elm)
                                            {
                                                echo "Famille ".$elm["identifiant_parent"]." :</br>";
                                                echo $elm["avis_parent"]."</br>";

                                            }?></p>
                                        <button type="submit" value="reserv_nounou_ponct" id="reserv_nounou_ponct" name="submit"
                                                class="btn btn-success">Réserver
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                }

                for ($k=0; $k<count($liste_reservation_ponct); $k++)
                {
                    $element=select_info_nounou_dispo($liste_reservation_ponct[$k]);

                    ?>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <form method="post" action="">
                            <div class="white-box">
                                <div class="info-box__close">
                                    <div class="info-box__title">
                                        <h3 class="box-title">Assistant(e)
                                            maternel(le) <?php echo $element["nom"] ?></h3>
                                    </div>
                                    <div class="info-box__content" style="display:none;">
                                        <img src="../avatar/<?php echo $element["photo"] ?>" width="300"/>
                                        <h2>Ville:</h2>
                                        <p> <?php echo $element["ville"] ?></p>
                                        <h2>Email:</h2>
                                        <p><?php echo $element["email"] ?></p>
                                        <h2>Age:</h2>
                                        <p> <?php echo $element["age"] ?></p>
                                        <h2>Expérience:</h2>
                                        <p> <?php echo $element["experience"] ?></p>
                                        <h2>Présentation:</h2>
                                        <p> <?php echo $element["presentation"] ?></p>
                                        <input type="hidden" name="id_nounou" value="<?php echo $element["identifiant"] ?>">
                                        <?php
                                        box_nounou($element["langue1"], $element["langue2"], $element["langue3"], $element["langue4"], $element["langue5"], $element["langue6"], $element["langue7"]) ?>
                                        <h2>Evaluation</h2>
                                        <p>
                                            <?php
                                            $eval=lister_eval_nounou($element["identifiant"]);
                                            lister_star($eval); ?>
                                        </p>
                                        <h2>Liste des avis:</h2>
                                        <p><?php $lister_avis_reservation=lister_avis_reservation($element["identifiant"]);
                                            foreach ($lister_avis_reservation as $elm)
                                            {
                                                echo "Famille ".$elm["identifiant_parent"]." :</br>";
                                                echo $elm["avis_parent"]."</br>";

                                            }?></p>
                                        <button type="submit" value="reserv_nounou_ponct" id="reserv_nounou_ponct" name="submit"
                                                class="btn btn-success">Réserver
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                }
                }?>

            </div>






            <div id="reservation"style="display: none;">
                <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                    <?php foreach($lister_reservation_faite as $element)
                    { ?>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <form method="post" action="">
                                <div class="white-box">
                                    <div class="info-box__close">
                                        <div class="info-box__title">
                                            <h3 class="box-title">Assistant(e) maternel(le) <?php echo $element["prenom_nounou"]." ".$element["nom"] ?></br></h3>
                                            <h4 class="box-title-plus"> <?php if($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "")echo "Réservation allant du ".$element["date_ponct_deb"]." au ".$element["date_ponct_fin"];
                                                elseif ($element["date_res"] != "") echo "Réservation pour le ".$element["date_res"]; ?></h4>
                                            <h4 class="box-title-plus"> <?php echo "Prévue de ".$element["heure_deb"]."h à ".$element["heure_fin"]."h"; ?></h4>
                                        </div>
                                        <div class="info-box__content" style="display:none;">
                                            <img src="../avatar/<?php echo $element["photo"] ?>" width="300"/>
                                            <h2>Ville:</h2>
                                            <p> <?php echo $element["ville"] ?></p>
                                            <h2>Email:</h2>
                                            <p><?php echo $element["email"] ?></p>
                                            <h2>Age:</h2>
                                            <p> <?php echo $element["age"] ?></p>
                                            <h2>Expérience:</h2>
                                            <p> <?php echo $element["experience"] ?></p>
                                            <h2>Présentation:</h2>
                                            <p> <?php echo $element["presentation"] ?></p>
                                            <?php
                                            box_nounou($element["langue1"], $element["langue2"], $element["langue3"], $element["langue4"], $element["langue5"], $element["langue6"], $element["langue7"])
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    <?php } ?>
                </div>
            </div>






            <div id="garde_creche" style="display: none;">
                <?php
                if($suivant==0){?>
                    <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                        <div id="dispo_parent_garde_ponct">
                            <div class="title_form_ponct">
                                <h1>Demande de garde hebdomadaire</h1>
                            </div>

                            <form action="c_parent.php" method="post">

                                <h2>Période entre le:</h2>

                                <input class="datepicker" name="jour_deb" data-date-format="mm/dd/yyyy">

                                <h2>Et le:</h2>

                                <input class="datepicker" name="jour_fin" data-date-format="mm/dd/yyyy">

                                <h2>Nombre d'enfant à garder:</br></h2>
                                <div class="disp_nb_enfant">
                                    <select name="disp_enfant">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>

                                <h2>Jour de garde:</br></h2>
                                <div class="disp_jour">
                                    <select name="disp_jour[]" multiple>
                                        <option value="lundi">Lundi</option>
                                        <option value="mardi">Mardi</option>
                                        <option value="mercredi">Mercredi</option>
                                        <option value="jeudi">Jeudi</option>
                                        <option value="vendredi">Vendredi</option>
                                        <option value="samedi">Samedi</option>
                                        <option value="dimanche">Dimanche</option>
                                    </select>
                                </div>

                                <h2>Heure de début:</br></h2>
                                <div class="disp_heure">
                                    <select name="heure_deb">
                                        <option value="1">1h</option>
                                        <option value="2">2h</option>
                                        <option value="3">3h</option>
                                        <option value="4">4h</option>
                                        <option value="5">5h</option>
                                        <option value="6">6h</option>
                                        <option value="7">7h</option>
                                        <option value="8">8h</option>
                                        <option value="9">9h</option>
                                        <option value="10">10h</option>
                                        <option value="11">11h</option>
                                        <option value="12">12h</option>
                                        <option value="13">13h</option>
                                        <option value="14">14h</option>
                                        <option value="15">15h</option>
                                        <option value="16">16h</option>
                                        <option value="17">17h</option>
                                        <option value="18">18h</option>
                                        <option value="19">19h</option>
                                        <option value="20">20h</option>
                                        <option value="21">21h</option>
                                        <option value="22">22h</option>
                                        <option value="23">23h</option>
                                        <option value="24">24h</option>

                                    </select>
                                </div>

                                <h2>Heure de fin:</br></h2>
                                <div class="disp_heure">
                                    <select name="heure_fin">
                                        <option value="1">1h</option>
                                        <option value="2">2h</option>
                                        <option value="3">3h</option>
                                        <option value="4">4h</option>
                                        <option value="5">5h</option>
                                        <option value="6">6h</option>
                                        <option value="7">7h</option>
                                        <option value="8">8h</option>
                                        <option value="9">9h</option>
                                        <option value="10">10h</option>
                                        <option value="11">11h</option>
                                        <option value="12">12h</option>
                                        <option value="13">13h</option>
                                        <option value="14">14h</option>
                                        <option value="15">15h</option>
                                        <option value="16">16h</option>
                                        <option value="17">17h</option>
                                        <option value="18">18h</option>
                                        <option value="19">19h</option>
                                        <option value="20">20h</option>
                                        <option value="21">21h</option>
                                        <option value="22">22h</option>
                                        <option value="23">23h</option>
                                        <option value="24">24h</option>
                                    </select>
                                </div>

                                <button type="submit" value="envoi_dispo_parent" id="envoi_dispo_parent" name="envoi_dispo_parent" class="button button-block" >Suivant</button>
                            </form>
                        </div>
                    </div>
                <?php } else{
                    ?>
                    <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7"id="info_garde_nounou">
                        <form method="post" action="">
                            <button type="submit" value="retour_one" id="retour_one" name="submit" class="btn btn-success">Retour</button>
                        </form>
                        <?php

                        for ($i=0; $i<count($liste_reservation); $i++)
                        {
                            $element=select_info_nounou_dispo($liste_reservation[$i]);

                            ?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <form method="post" action="">
                                    <div class="white-box">
                                        <div class="info-box__close">
                                            <div class="info-box__title">
                                                <h3 class="box-title">Assistant(e)
                                                    maternel(le) <?php echo $element["nom"] ?></h3>
                                            </div>
                                            <div class="info-box__content" style="display:none;">
                                                <img src="../avatar/<?php echo $element["photo"] ?>" width="300"/>
                                                <h2>Ville:</h2>
                                                <p> <?php echo $element["ville"] ?></p>
                                                <h2>Email:</h2>
                                                <p><?php echo $element["email"] ?></p>
                                                <h2>Age:</h2>
                                                <p> <?php echo $element["age"] ?></p>
                                                <h2>Expérience:</h2>
                                                <p> <?php echo $element["experience"] ?></p>
                                                <h2>Présentation:</h2>
                                                <p> <?php echo $element["presentation"] ?></p>
                                                <input type="hidden" name="id_nounou" value="<?php echo $element["identifiant"] ?>">
                                                <?php
                                                box_nounou($element["langue1"], $element["langue2"], $element["langue3"], $element["langue4"], $element["langue5"], $element["langue6"], $element["langue7"]) ?>
                                                <h2>Evaluation</h2>
                                                <p>
                                                    <?php
                                                    $eval=lister_eval_nounou($element["identifiant"]);
                                                    lister_star($eval); ?>
                                                </p>
                                                <h2>Liste des avis:</h2>
                                                <p><?php $lister_avis_reservation=lister_avis_reservation($element["identifiant"]);
                                                    foreach ($lister_avis_reservation as $elm)
                                                    {
                                                        echo "Famille ".$elm["identifiant_parent"]." :</br>";
                                                        echo $elm["avis_parent"]."</br>";

                                                    }?></p>
                                                <button type="submit" value="reserv_nounou" id="reserv_nounou" name="submit"
                                                        class="btn btn-success">Réserver
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <?php
                        }
                        ?>

                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</body>
<script>

    $('#creche').click(function(){
        $('#garde_creche').css('display', 'block');
        $('#notification').css('display', 'none');
        $('#reservation').css('display', 'none');
        $('#garde_ponct').css('display', 'none');
        $('#search_langue').css('display', 'none');

    });

    $('#reser').click(function(){
        $('#reservation').css('display', 'block');
        $('#notification').css('display', 'none');
        $('#garde_creche').css('display', 'none');
        $('#garde_ponct').css('display', 'none');
        $('#search_langue').css('display', 'none');

    });
    $('#ponct').click(function(){
        $('#garde_ponct').css('display', 'block');
        $('#reservation').css('display', 'none');
        $('#garde_creche').css('display', 'none');
        $('#notification').css('display', 'none');
        $('#search_langue').css('display', 'none');

    });
    $('#notif').click(function(){
        $('#garde_ponct').css('display', 'none');
        $('#search_langue').css('display', 'none');
        $('#reservation').css('display', 'none');
        $('#garde_creche').css('display', 'none');
        $('#notification').css('display', 'block');

    });
    $('#search').click(function(){
        $('#search_langue').css('display', 'block');
        $('#garde_ponct').css('display', 'none');
        $('#reservation').css('display', 'none');
        $('#garde_creche').css('display', 'none');
        $('#notification').css('display', 'none');

    });


    $('.datepicker').datepicker({
        language: 'fr'
    })

    var titles = $(".info-box__title");
    var content = $(".info-box__content");

    titles.on("click touchstart", function(e) {
        if ($(this).next(".info-box__content")
                .is(":visible")) {
            $(this).next(".info-box__content")
                .slideUp()
        } else {
            content.slideUp()
                .eq($(this).index(".info-box__title"))
                .slideDown()
        }
    });

</script>

</html>