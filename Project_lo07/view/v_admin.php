<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrateur - Lo07-project</title>

</head>
<body>
<div class="container">
    <div class="container_deux">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" >Administrateur <span><?php echo $sel_admin["nom"]?></span></a>
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
                            <a id="noun" href="#nounou">Demande de garde</a>
                        </li>

                        <li>
                            <a id="par" href="#parent">Demande de parents</a>
                        </li>

                        <li>
                            <a id="doss_nounou" href="#dossier_nounou">Dossier de garde</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
            <div class="profil">
                <fieldset class="field">
                    <h1>Profil Administrateur</h1>
                    <h2>Coordonnées</h2>
                    <h3>Nom:</h3><p> <?php echo $sel_admin["nom"]?></p>
                    <h3>Ville:</h3><p> <?php echo $sel_admin["ville"]?></p>
                    <h3>Email:</h3> <p><?php echo $sel_admin["email"]?></p>
                </fieldset>
            </div>
        </div>

        <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7">
            <div id="notification">
                <h1><span class="glyphicon glyphicon-bell"></span> Notifiactions<?php echo "(".$nb_infonou_par.")" ?></h1>
                <h2>Il y a <?php echo $sel_contact_nounou ?> assistants(es) maternels(les) inscrits(es)</h2>
                <h1>Liste décroissantes des revenus par nounou:</h1>
                <?php $liste_nounou_revenu=liste_nounou_revenu();
                foreach($liste_nounou_revenu as $elm)
                    {
                     echo "<h2 style='color: #67716a;'>".$elm["identifiant"].": ".$elm["gain_total"]." euros";
                    } ?>
            </div>

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="dossier_nounou" style="display: none;">
                <?php
                foreach($sel_contact_nounou_info as $elm ){
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <form method="post" action="">
                            <div class="white-box">
                                <div class="info-box__close">
                                    <div class="info-box__title">
                                        <h3 class="box-title">Dossier de l'assistant(e) maternel(le) <?php echo $elm["nom"]." ".$elm["prenom_nounou"]?></h3>
                                    </div>
                                    <div class="info-box__content" style="display:none;" >
                                        <img src="../avatar/<?php echo $elm["photo"] ?>" width="300"/>
                                        <h2>Ville:</h2><p> <?php echo $elm["ville"]?></p>
                                        <h2>Email:</h2> <p><?php echo $elm["email"]?></p>
                                        <h2>Identifiant:</h2><p > <?php echo $elm["identifiant"]?></p>
                                        <h2>Age:</h2><p > <?php echo $elm["age"]?></p>
                                        <h2>Expérience:</h2><p > <?php echo $elm["experience"]?></p>
                                        <h2>Présentation:</h2><p > <?php echo $elm["presentation"]?></p>
                                        <input type="hidden" name="id_parent" value="<?php echo $elm["identifiant"]?>">
                                        <?php
                                        box_nounou($elm["langue1"],$elm["langue2"],$elm["langue3"],$elm["langue4"],$elm["langue5"],$elm["langue6"],$elm["langue7"])
                                        ?>
                                        <h2>Etat "bloquer":</h2><p > <?php if($elm["Bloquer"]==1)echo "Bloquer"; else{ echo "Débloquer"; } ?></p>
                                        <button type="submit" value="block_nounou" id="block_nounou" name="submit" class="btn btn-success" >Bloquer son dossier</button>

                                        <button type="submit" value="deblock_nounou" id="deblock_nounou" name="submit" class="btn btn-danger" >Débloquer son dossier</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                }
                ?>
            </div>


            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="parent" style="display: none;">
                <?php
                foreach($info as $elm ){
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <form method="post" action="">
                            <div class="white-box">
                                <div class="info-box__close">
                                    <div class="info-box__title">
                                        <h3 class="box-title">Demande de garde de la famille <?php echo $elm["nom"]?></h3>
                                    </div>
                                    <div class="info-box__content" style="display:none;" >
                                        <h2>Ville:</h2><p> <?php echo $elm["ville"]?></p>
                                        <h2>Email:</h2> <p><?php echo $elm["email"]?></p>
                                        <h2>Identifiant:</h2><p > <?php echo $elm["identifiant"]?></p>
                                        <input type="hidden" name="id_parent" value="<?php echo $elm["identifiant"]?>">
                                        <?php
                                        box($elm["prenom1"],$elm["date1"],$elm["info1"],$elm["prenom2"],$elm["date2"],$elm["info2"],$elm["prenom3"],$elm["date3"],$elm["info3"],$elm["prenom4"],$elm["date4"],$elm["info4"],$elm["prenom5"],$elm["date5"],$elm["info5"],$elm["prenom6"],$elm["date6"],$elm["info6"],$elm["prenom7"],$elm["date7"],$elm["info7"]);
                                        ?>
                                        <button type="submit" value="add" id="add" name="submit" class="btn btn-success" >Ajouter</button>

                                        <button type="submit" value="supp" id="supp" name="submit" class="btn btn-danger" >Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                }
                ?>

            </div>

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="nounou" style="display: none;">
                <?php
                foreach($info_nounou as $elm ){
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <form method="post" action="">
                            <div class="white-box">
                                <div class="info-box__close">
                                    <div class="info-box__title">
                                        <h3 class="box-title">Demande assistante maternelle <?php echo $elm["nom"]?></h3>
                                    </div>
                                    <div class="info-box__content" style="display:none;" >
                                        <img src="../avatar/<?php echo $elm["photo"] ?>" width="300"/>
                                        <h2>Ville:</h2><p> <?php echo $elm["ville"]?></p>
                                        <h2>Email:</h2> <p><?php echo $elm["email"]?></p>
                                        <h2>Identifiant:</h2><p > <?php echo $elm["identifiant"]?></p>
                                        <h2>Age:</h2><p > <?php echo $elm["age"]?></p>
                                        <h2>Expérience:</h2><p > <?php echo $elm["experience"]?></p>
                                        <h2>Présentation:</h2><p > <?php echo $elm["presentation"]?></p>
                                        <input type="hidden" name="id_parent" value="<?php echo $elm["identifiant"]?>">
                                        <?php
                                        box_nounou($elm["langue1"],$elm["langue2"],$elm["langue3"],$elm["langue4"],$elm["langue5"],$elm["langue6"],$elm["langue7"])                                        ?>
                                        <button type="submit" value="add_nounou" id="add_nounou" name="submit" class="btn btn-success" >Ajouter</button>

                                        <button type="submit" value="supp_nounou" id="supp_nounou" name="submit" class="btn btn-danger" >Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                }
                ?>            </div>
        </div>

    </div>

</div>
</body>
<script>
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

    $("#par").click(function() {
        $("#parent").css("display","block")
        $("#nounou").css("display","none")
        $("#notification").css("display","none")
        $("#profil").css("display","none")
        $("#dossier_nounou").css("display","none")
    });
    $("#noun").click(function() {
        $("#parent").css("display","none")
        $("#nounou").css("display","block")
        $("#notification").css("display","none")
        $("#profil").css("display","none")
        $("#dossier_nounou").css("display","none")
    });
    $("#notif").click(function() {
        $("#parent").css("display","none")
        $("#nounou").css("display","none")
        $("#notification").css("display","block")
        $("#profil").css("display","none")
        $("#dossier_nounou").css("display","none")
    });
    $("#doss_nounou").click(function() {
        $("#dossier_nounou").css("display","block")
        $("#parent").css("display","none")
        $("#nounou").css("display","none")
        $("#notification").css("display","none")
        $("#profil").css("display","none")
    });

</script>