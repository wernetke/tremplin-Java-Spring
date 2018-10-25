<?php
include("head_connect.php");
?>
<!DOCTYPE html>
<>
<head>
    <title>Formulaire d'inscription parent - Lo07-project</title>
</head>
<body>
<div class="container">
            <div class="form">
                <div class="title_form">
                    <h1>Formulaire d'inscription</h1>
                </div>
                <p style="color:#FF0000; text-align: center;">
                <?php
                if ($erreur==1)
                    echo "Les informations entrées ici sont incorrectes! Veuillez réesayer!";
                    echo $erreur1;


                ?>
                </p>
                <p style="color:#cad200; text-align: center;">
                    <?php
                    if ($erreure==0)
                        echo "Les informations entrées ici ont bien été prises en compte";

                    ?>
                        <form action="c_formparent.php" method="post">
                            <div class="field-wrap">
                                <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" placeholder="Nom de famille" required>
                            </div>

                            <div class="field-wrap">
                                <input name="cp" id="cp" type="text" value="<?php if (isset($_POST['cp'])){echo $_POST['cp'];} ?>"placeholder="CP">
                                <input type="text" id="ville" name="ville" value="<?php if (isset($_POST['ville'])){echo $_POST['ville'];} ?>" placeholder="Ville" required>

                            </div>

                            <div class="field-wrap">
                                <input type="email" name="email" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="Email" required>
                            </div>

                            <div class="field-wrap">
                                <input type="text" name="identifiant" value="<?php if (isset($_POST['identifiant'])){echo $_POST['identifiant'];} ?>" placeholder="Identifiant" required>
                            </div>

                            <div class="field-wrap">
                                <input type="password" name="password" value="<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Mot de passe" required>
                            </div>

                            <div class="title_form_enfant">
                                <h2>Information de votre/vos enfant(s):</h2>
                            </div>

                           <?php if($_POST["add_child"]){
                            $cpt=1;
                            afficher_form_enfant($_POST["nb_enfant"]);
                            }
                            if($cpt!=1){
                               ?>
                            <div class="title_nb_enfant">
                                <h3>Combien avez-vous d'enfant ?</h3>
                            </div>


                            <div id="enfant">
                                <div class="nombre_enfant">
                                    <select name="nb_enfant">
                                        <option value="1">Un enfant</option>
                                        <option value="2">Deux enfants</option>
                                        <option value="3">Trois enfants</option>
                                        <option value="4">Quatre enfants</option>
                                        <option value="5">Cinq enfants</option>
                                        <option value="6">Six enfants</option>
                                        <option value="7">Sept enfants</option>
                                    </select>
                                </div>
                            </div>




                            <button type="submit" value="add_child" id="add_child" name="add_child" class="button button-block" >+ Ajouter un enfant</button>

                            <?php }?>

                            <!--<p class="forgot"><a href="#forgot">Mot de passe oublié ?</a></p>-->
                           <!-- <button type="submit" value="connexion" id="connexion" name="connexion" class="button button-block" > Envoyer votre demande</button>!-->
                        </form>
            </div>
    </div>
</body>
<script type="text/javascript" src="../js/ville.js"></script>
</html>




