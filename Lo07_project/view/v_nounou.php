<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assistante Maternelle - Lo07-project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="bootstrap-datepicker.fr.min.js"></script>

</head>
<body>
<div class="container">
    <div class="container_deux">

        <?php
        if ($sel_contact_nounou_info["validation_date_nounou"]==0){?>

            <div class="form">
                <div class="choix_date_garde" id="date">
                    <div class="title_form">
                        <h1>Déclaration des disponibilités</h1>
                    </div>
                    <p style="color:#FF0000; text-align: center;">
                        <?php
                        if ($erreur==1)
                            echo $erreur1;

                        ?>
                    </p>
                    <form action="c_nounou.php" method="post">

                        <div class="disp_date">
                            <input type="radio" name="disp_date" value="tous_jours_work_perso" id="work" style="display: inline; width: 10%">Tous les jours travaillés (Lu, Ma, Me, Je, Ve)</br>
                            <input type="radio" name="disp_date" value="tous_jours_perso" id="day" style="display: inline;width: 10%"> Tous les jours (lundi, .., dimanche)</br>
                            <input type="radio" name="disp_date" value="perso" id="perso" style="display: inline;width: 10%"> Personnalisé</br>
                        </div>

                        <div class="disp_date" id="disp_date_perso" style="display: none;">
                            <select name="date_perso[]" multiple>
                                <option value="lundi">Lundi</option>
                                <option value="mardi">Mardi</option>
                                <option value="mercredi">Mercredi</option>
                                <option value="jeudi">Jeudi</option>
                                <option value="vendredi">Vendredi</option>
                                <option value="samedi">Samedi</option>
                                <option value="dimanche">Dimanche</option>
                            </select>
                        </div>

                        <div class="select_jour" style="display: none;">
                            <select name="select_jour" >
                                <option value="lundi">Lundi</option>
                                <option value="mardi">Mardi</option>
                                <option value="mercredi">Mercredi</option>
                                <option value="jeudi">Jeudi</option>
                                <option value="vendredi">Vendredi</option>
                                <option value="samedi">Samedi</option>
                                <option value="dimanche">Dimanche</option>
                            </select>
                        </div>

                        <div class="disp_heure" style="display: none;">
                            <select name="heure[]" multiple>
                                <option value="5-6">5h-6h</option>
                                <option value="6-7">6h-7h</option>
                                <option value="7-8">7h-8h</option>
                                <option value="8-9">8h-9h</option>
                                <option value="9-10">9h-10h</option>
                                <option value="10-11">10h-11h</option>
                                <option value="11-12">11h-12h</option>
                                <option value="12-13">12h-13h</option>
                                <option value="13-14">13h-14h</option>
                                <option value="14-15">14h-15h</option>
                                <option value="15-16">15h-16h</option>
                                <option value="16-17">16h-17h</option>
                                <option value="17-18">17h-18h</option>
                                <option value="18-19">18h-19h</option>
                                <option value="19-20">19h-20h</option>
                                <option value="20-21">20h-21h</option>
                                <option value="21-22">21h-22h</option>
                                <option value="22-23">22h-23h</option>
                                <option value="23-24">23h-24h</option>
                            </select>
                        </div>


                        <button type="submit" value="envoi" id="envoi" name="envoi" class="button button-block" >Suivant</button>


                        <!--<p class="forgot"><a href="#forgot">Mot de passe oublié ?</a></p>-->
                        <!-- <button type="submit" value="connexion" id="connexion" name="connexion" class="button button-block" > Envoyer votre demande</button>!-->
                    </form>
                </div>
            </div>

        <?php }
        else{

            ?>


            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" >Assistant(e) maternel(le) <span><?php echo $sel_contact_nounou_info["nom"]." ".$sel_contact_nounou_info["prenom_nounou"]?></span></a>
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
                                <a id="reser" href="#reservation">Réservation</a>
                            </li>

                            <li>
                                <a id="dispo" href="#disponible">Disponibilité</a>
                            </li>

                            <li>
                                <a id="demand" href="#demande">Demande de garde</a>
                            </li>


                        </ul>

                    </div>
                </div>
            </nav>


            <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
                <div class="profil">
                    <fieldset class="field">
                        <h1>Profil Assistant(e)</br> Maternel(le)</h1>
                        <h2>Coordonnées</h2>
                        <h3>Nom:</h3><p> <?php echo $sel_contact_nounou_info["nom"]?></p>
                        <h3>Prénom:</h3><p> <?php echo $sel_contact_nounou_info["prenom_nounou"]?></p>
                        <h3>Ville:</h3><p> <?php echo $sel_contact_nounou_info["ville"]?></p>
                        <h3>Email:</h3> <p><?php echo $sel_contact_nounou_info["email"]?></p>
                        <h3>Evaluation:</h3><p><?php lister_star($eval); ?></p>

                    </fieldset>
                </div>
            </div>


            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                <div id="notification">

                    <!--<input type="text" class="form-control datepicker" value="<?php  //echo date("m/d/Y"); ?>">-->
                    <?php

                    $mois = date("m");
                    $anne = date("Y");
                    ?>
                    <div style="margin-bottom:5%" >
                        <span id="pre" class="glyphicon glyphicon-backward" style="float:left; cursor: pointer;" height="40px" width="40px"></span>
                        <span id="post" class="glyphicon glyphicon-forward" style="float:right; cursor: pointer;" height="40px" width="40px"></span>
                    </div>

                    <div id="cont" >

                    </div

                </div>
            </div>

            <div id="demande"style="display: none;">
                <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                    <?php
                    for ($i=0; $i<count($liste_id_demande); $i++)
                    {
                    $element=select_info_nounou_demande($liste_id_demande[$i]);
                        ?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <form method="post" action="">
                                    <div class="white-box">
                                        <div class="info-box__close">
                                            <div class="info-box__title">
                                                <h3 class="box-title">Famille <?php echo $element["nom"] ?></br></h3>
                                            </div>
                                            <div class="info-box__content" style="display:none;">
                                                <h2>Ville:</h2><p> <?php echo $element["ville"]?></p>
                                                <h2>Email:</h2> <p><?php echo $element["email"]?></p>
                                                <input type="hidden" name="id_reserv"
                                                       value="<?php echo $element["id_reserv"] ?>">

                                                <?php
                                                box($element["prenom1"],$element["date1"],$element["info1"],$element["prenom2"],$element["date2"],$element["info2"],$element["prenom3"],$element["date3"],$element["info3"],$element["prenom4"],$element["date4"],$element["info4"],$element["prenom5"],$element["date5"],$element["info5"],$element["prenom6"],$element["date6"],$element["info6"],$element["prenom7"],$element["date7"],$element["info7"]);
                                                ?>
                                                <h2>Informations sur la demande de garde:</h2><p><?php echo $element["texte_reponse"]?></p>
                                                <h2>Jour</h2>

                                                <input class="datepicker" name="jour_deb" data-date-format="mm/dd/yyyy">

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


                                                <button type="submit" value="envoi_demande" id="envoi_demande" name="submit" class="btn btn-success">Ajouter</button>
                                                <button type="submit" value="rejette_demande" id="rejette_demande" name="submit" class="btn btn-danger">Rejetter</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        <?php } ?>

                </div>
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
                                            <h3 class="box-title">Famille <?php echo $element["nom"] ?></br></h3>
                                            <h4 class="box-title-plus"> <?php if($element["date_ponct_deb"] != "" && $element["date_ponct_fin"] != "")echo "Réservation allant du ".$element["date_ponct_deb"]." au ".$element["date_ponct_fin"];
                                                elseif ($element["date_res"] != "") echo "Réservation pour le ".$element["date_res"]; ?></h4>
                                            <h4 class="box-title-plus"> <?php echo "Prévue de ".$element["heure_deb"]."h à ".$element["heure_fin"]."h"; ?></h4>
                                        </div>
                                        <div class="info-box__content" style="display:none;">
                                            <h2>Ville:</h2><p> <?php echo $element["ville"]?></p>
                                            <h2>Email:</h2> <p><?php echo $element["email"]?></p>
                                            <?php
                                            box($element["prenom1"],$element["date1"],$element["info1"],$element["prenom2"],$element["date2"],$element["info2"],$element["prenom3"],$element["date3"],$element["info3"],$element["prenom4"],$element["date4"],$element["info4"],$element["prenom5"],$element["date5"],$element["info5"],$element["prenom6"],$element["date6"],$element["info6"],$element["prenom7"],$element["date7"],$element["info7"]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    <?php } ?>
                </div>
            </div>


            <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
                <div id="disponible" style="display: none;">
                    <div class="title_form">
                        <h1>Ajouter des disponibilités(jours/horaires)</h1>
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
                    <form action="c_nounou.php" method="post">

                        <h2>Jour:</br></h2>
                        <div class="disp_jour">
                            <select name="disp_jour">
                                <?php if($sel_contact_nounou_info["choix_date"]=="tous_jours")
                                {?>
                                    <option value="lundi">Lundi</option>
                                    <option value="mardi">Mardi</option>
                                    <option value="mercredi">Mercredi</option>
                                    <option value="jeudi">Jeudi</option>
                                    <option value="vendredi">Vendredi</option>
                                    <option value="samedi">Samedi</option>
                                    <option value="dimanche">Dimanche</option>
                                    <?php
                                }
                                elseif($sel_contact_nounou_info["choix_date"]=="tous_jours_work")
                                {?>
                                    <option value="lundi">Lundi</option>
                                    <option value="mardi">Mardi</option>
                                    <option value="mercredi">Mercredi</option>
                                    <option value="jeudi">Jeudi</option>
                                    <option value="vendredi">Vendredi</option>
                                    <?php
                                }
                                else{
                                    $liste_jour = explode(" ", $sel_contact_nounou_info["choix_date"]);
                                    for ($i=0; $i<count($liste_jour);$i++)
                                    {?>
                                        <option value="<?php echo $liste_jour[$i] ?>"><?php echo $liste_jour[$i] ?></option>

                                    <?php }
                                }?>
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

                        <button type="submit" value="envoi_add_dispo" id="envoi_add_dispo" name="envoi_add_dispo" class="button button-block" >Ajouter</button>


                    </form>
                </div>
            </div>

            <div id="change_dispo" style="display: none;">

                <div class="title_form">
                    <h1>Changer ses disponibilités</h1>
                </div>
                <p style="color:#FF0000; text-align: center;">
                    <?php
                    if ($erreur==1)
                        echo $erreur1;

                    ?>
                </p>
                <form action="c_nounou.php" method="post">

                    <div class="disp_date">
                        <input type="radio" name="disp_date" value="tous_jours_work" id="work" style="display: inline; width: 10%">Tous les jours travaillés (Lu, Ma, Me, Je, Ve)</br>
                        <input type="radio" name="disp_date" value="tous_jours" id="day" style="display: inline;width: 10%"> Tous les jours (lundi, .., dimanche)</br>
                        <input type="radio" name="disp_date" value="perso" id="perso" style="display: inline;width: 10%"> Personnalisé</br>
                    </div>

                    <div class="disp_date" id="disp_date_perso" style="display: none;">
                        <select name="date_perso[]" multiple>
                            <option value="lundi">Lundi</option>
                            <option value="mardi">Mardi</option>
                            <option value="mercredi">Mercredi</option>
                            <option value="jeudi">Jeudi</option>
                            <option value="vendredi">Vendredi</option>
                            <option value="samedi">Samedi</option>
                            <option value="dimanche">Dimanche</option>
                        </select>
                    </div>
                    <button type="submit" value="envoi" id="envoi" name="envoi" class="button button-block" >Ajouter</button>

            </div>




        <?php } ?>


    </div>
</div>
</body>
<script>
    var mois= <?php  echo json_encode($mois,JSON_NUMERIC_CHECK)?>;
    var anne = <?php  echo json_encode($anne,JSON_NUMERIC_CHECK)?>;


    $('#perso').click(function(){
        $('#disp_date_perso').css('display', 'block');
        // $('.select_jour').css('display', 'none');
        // $('.disp_heure').css('display', 'none');
    });

    $('#work').click(function(){
        $('#disp_date_perso').css('display', 'none');
        // $('.select_jour').css('display', 'block');
        // $('.disp_heure').css('display', 'block');

    });
    $('#day').click(function(){
        $('#disp_date_perso').css('display', 'none');
        // $('.select_jour').css('display', 'block');
        // $('.disp_heure').css('display', 'block');

    });

    $("#dispo").click(function() {
        $("#notification").css("display","none")
        $("#disponible").css("display","block")
        $('#reservation').css('display', 'none');
        $('#demande').css('display', 'none');

    });
    $("#notif").click(function() {
        $("#notification").css("display","block")
        $("#disponible").css("display","none")
        $('#reservation').css('display', 'none');
        $('#demande').css('display', 'none');
    });
    $('#reser').click(function(){
        $('#demande').css('display', 'none');
        $('#reservation').css('display', 'block');
        $("#notification").css("display","none")
        $("#disponible").css("display","none")

    });
    $('#demand').click(function(){
        $('#demande').css('display', 'block');
        $('#reservation').css('display', 'none');
        $("#notification").css("display","none")
        $("#disponible").css("display","none")

    });
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

    $('.datepicker').datepicker({
        language: 'fr'
    })
    $(document).ready(function(){




        $("#cont").load("../view/v_calendrier.php?mois="+mois+"&anne="+anne,function(){});


        $("#pre").click(function(){

            mois--;

            if(mois < 1)
            {
                anne--;
                mois = 12;
            }



            $("#cont").load("../view/v_calendrier.php?mois="+mois+"&anne="+anne,function(){});

        });

        $("#post").click(function(){

            mois++;

            if(mois > 12)
            {
                anne++;
                mois = 1;
            }

            $("#cont").load("../view/v_calendrier.php?mois="+mois+"&anne="+anne,function(){});

        });

    });

</script>

</html>