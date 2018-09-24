<?php
include("head_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription assistante maternelle - Lo07-project</title>
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
                </p>
                <form action="c_formnounou.php" method="post" enctype="multipart/form-data">
                    <div class="field-wrap">
                        <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" placeholder="Nom de famille" required>
                    </div>

                    <div class="field-wrap">
                        <input type="text" name="prénom" value="<?php if (isset($_POST['prénom'])){echo $_POST['prénom'];} ?>" placeholder="Prénom" required>
                    </div>

                    <div class="field-wrap">
                        <input name="cp" id="cp" type="text" value="<?php if (isset($_POST['cp'])){echo $_POST['cp'];} ?>"placeholder="CP">
                        <input type="text" id="ville" name="ville" value="<?php if (isset($_POST['ville'])){echo $_POST['ville'];} ?>" placeholder="Ville" required>
                    </div>

                    <div class="field-wrap">
                        <input type="email" name="email" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="Email" required>
                    </div>

                    <div class="field-wrap">
                        <input type="text" name="tel" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'];} ?>" placeholder="Portable" required>
                    </div>

                    <div class="title_form_langue">
                        <h2>Quelles langues parlez-vous ?</h2>
                    </div>

                    <div class="form_langue">
                            <select name="langue[]" multiple>
                                <option value="Français">Français</option>
                                <option value="Anglais">Anglais</option>
                                <option value="Espagnol">Espagnol</option>
                                <option value="Allemand">Allemand</option>
                                <option value="Arabe">Arabe</option>
                                <option value="Russe">Russe</option>
                                <option value="Chinois">Chinois</option>
                            </select>
                        </div>

                    <div class="title_form_photo">
                        <h2>Votre photo de profil</h2>
                    </div>

                    <div class="field-wrap">
                        <input type="file" name="photo" id="photo" /><br />
                    </div>

                    <div class="field-wrap">
                        <input type="text" name="age" value="<?php if (isset($_POST['age'])){echo $_POST['age'];} ?>" placeholder="Age" required>
                    </div>

                    <div class="field-wrap">
                        <textarea name="exp" rows="5" cols="20"placeholder="Racontez nous votre expérience du terrain"></textarea>
                    </div>

                    <div class="field-wrap">
                        <textarea name="pres" rows="5" cols="20" placeholder="Présentez vous en une phrase"></textarea>
                    </div>

                    <div class="field-wrap">
                        <input type="text" name="identifiant" value="<?php if (isset($_POST['identifiant'])){echo $_POST['identifiant'];} ?>" placeholder="Identifiant" required>
                    </div>

                    <div class="field-wrap">
                        <input type="password" name="password" value="<?php if (isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Mot de passe" required>
                    </div>

                    <button type="submit" value="envoi" id="envoi" name="envoi" class="button button-block" >Envoyer</button>


                    <!--<p class="forgot"><a href="#forgot">Mot de passe oublié ?</a></p>-->
                    <!-- <button type="submit" value="connexion" id="connexion" name="connexion" class="button button-block" > Envoyer votre demande</button>!-->
                </form>
            </div>
    </div>
</body>
<script type="text/javascript" src="../js/ville.js"></script>
</html>




