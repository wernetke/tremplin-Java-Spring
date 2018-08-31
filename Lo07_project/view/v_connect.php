<?php
include("head_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion - Lo07-project</title>
</head>
<body>
<div class="container">
            <div class="form">

                    <ul  class="tab-group ">
                        <li class="active"><a  href="#login" data-toggle="tab">Connexion</a></li>
                        <li><a href="#signup" data-toggle="tab">Demande de création</a></li>
                        <li><a href="#sup" data-toggle="tab" style="display:none;"></a></li>
                    </ul>
                    <div class="tab-content clearfix">
                            <div class="tab-pane active" id="login">
                                <p style="color:#FF0000; text-align: center;">
                                    <?php
                                    if ($erreur==1)
                                        echo "Les informations entrées ici sont incorrectes ! Veuillez réesayer !";
                                    ?>
                                </p>
                                <form action="c_connect.php" method="post">
                                <div class="field-wrap">
                                    <input type="text" name="identifiant" value="" placeholder="Identifiant" required>
                                </div>

                                <div class="field-wrap">
                                    <input type="password" name="password" value="" placeholder="Mot de passe" required>

                                </div>

                                <!--<p class="forgot"><a href="#forgot">Mot de passe oublié ?</a></p>-->
                                <button type="submit" value="connexion" id="connexion" name="connexion" class="button button-block" > Connexion</button>
                                </form>
                            </div>
                        <div class="tab-pane" id="signup">
                            <form action="" method="post">
                            <div class="choix">
                                <input type="radio" name="user" value="parent"style="display: inline; width: 10%"> Parent</br>
                                <input type="radio" name="user" value="nounou"style="display: inline; width: 10%"> Assistante maternelle</br>
                            </div>

                            <button type="submit" value="creation" id="creation" name="creation" class="button button-block" >Suivant</button>

                            </form>
                        </div>
                        <div class="tab-pane" id="sup"></div>
                    </div>
            </div>
        </div>
</body>