 <!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
     <title>Kévin WERNET-Etudiant ingénieur </title>

  <link href="boot/bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
  	<link rel="stylesheet" href="style_final.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script type = "text/javascript" 
  src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="boot/bootstrap-3.3.7/dist/js/jquery.js"></script>
  <script src="boot/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="boot/bootstrap-3.3.7/js/dropdown.js"></script>
	<script src = ' https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js ' ></script>
	<script src = " https://cdn.rawgit.com/vinayakjadhav/jR3DCarousel/v1.0.0/dist/jR3DCarousel.min.js " ></script>
	<script src="js/jquery.sticky.js"></script>
	<script type = "text/javascript" 
	src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<script src="js/script.js"></script> 
</head>
<?php
if(file_exists('compteur_pages_vues.txt'))
{
        $compteur_f = fopen('compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f);
?>
<body>
	<div id="loader">
        <div class="loader">
        <div id="szlider">
        <div id="szliderbar">
        </div>
         <div id="szazalek">
        </div>
        <div class="loader-quart">
        </div>
        </div>   
        </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="image_presentation" >
				<div class="content">
					<div class="cont">
						<h1><span>Kévin </span><span>WERNET</span><span> - Portfolio</span></h1>
					</div>
				</div>
			</div>
			<header>
				<nav class="navbar navbar-inverse" style="background-color:white !important; border-color:white !important;" >
				  <div class="container-fluid" style="background:#eee">
				    
				    <div class="navbar-header" style="display:none;" align="center" >
						      <a class="navbar-brand" href="#bloc_page">Web <span class="glyphicon glyphicon-globe"></span> Site <span style="display:none"class="glyphicon glyphicon-globe"></span></a>
						       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"style="background-color:#FF6C6C"></span>
				        <span class="icon-bar"style="background-color:#FF6C6C"></span>
				        <span class="icon-bar"style="background-color:#FF6C6C"></span>                        
				      </button>
					</div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="dropdown" id="text_nav_trois">
				          <a href="#bloc_description"class="scroll">A propos... <span class="caret"></span></a>          
				        </li>
				         <li class="dropdown"id="text_nav_deux">
				          <a  href="#bloc_skill"class="scroll">Compétences<span class="caret"></span></a>          
				        </li>
						<div class="navbar-header" id="text_nav">
						      <a class="navbar-brand" href="#">Web <span class="glyphicon glyphicon-globe"></span> Site</a>
						    </div>
						<li class="dropdown"id="text_nav_cinq">
				          <a  href="#bloc_work"class="scroll">Travaux <span class="caret"></span></a>          
				        </li>
				         <li class="dropdown"id="text_nav_quatre">
				          <a  href="#bloc_contact"class="scroll">Contact <span class="caret"></span></a>          
				        </li>
				      </ul>
				      
				    </div>
				  </div>
				</nav>
			</header>

		<div id="bloc_description" >
			<div class="target">
				<div class="col-md-12">
					<div class="text_description_profil">
                        <h3>Qui Suis-Je ?</br></h3>
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="apropos" style="text-align:center">
						<h2>Etudiant ingénieur</h2></br>
						<img  src="images/rond3.jpeg"/>

					</div>
				</div>
				<div class=" col-md-4  col-xs-12">
					<div class="apropos" style="text-align:center">
						<h2>Formé à l'Université</br>de Technologie de Troyes</h2>
						<img  src="images/rond2.jpg" />

					</div>
				</div>
				<div class="col-md-4  col-xs-12">
					<div class="apropos" style="text-align:center">
						<h2>Travailleur / Curieux </h2></br>
						<img  src="images/rond1.jpg"/>

					</div>
				</div>
			</div>
		</div>
			<div class="col-md-12 col-xs-12">
				<div id="profil" style="display:none;">
					<div class="text_description_profil">
						<h3>A Propos...</h3>

						<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
							<div id="photo_pad" style="text-align:center">
								<img width="80%"src="images/photo_profil.jpg">
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
							<div id="text_profil">
								</br>
								
								<p>Je m'appelle Kévin WERNET, je suis un apprenti <span>ingénieur</span> se spécialisant dans les systèmes, réseaux et télécommunications. Je suis actuellement en formation à Troyes dans le but d'obtenir mon diplôme d'ingénieur.</br>
								Je suis un étudiant motivé à acquérir des connaissances et de l'expérience dans le milieu de l'informatique, et plus particulièrement dans le domaine du <span>système embarqué</span>, l'analyse et le <span>traitement du signal, image</span> et le <span>développement web</span>.</br>
								Pour entrer un peu plus dans ma vie, je me décrirais en quelques mots, <span>sportif</span>, <span>dynamique</span>, <span>curieux</span>, <span>créatif</span>.</br> N'hésitez pas à venir me contacter. </br></p>
								<p>Bonne visite et à bientôt.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="text-align:center">
				</br></br>
                <button id="show" type="button" class="btn btn-primary">Show</button>
                <button id="hide" type="button" class="btn btn-primary">Hide</button>

			</div>

			<div class="col-md-12 col-xs-12 col-sm-12" style="padding-left:none">
				</br></br>
				<div class="description_profil_deux">
					</br>
					<p>Vous êtes intéréssés par mon <span>profil</span> ?</br>
					Vous recherchez un apprenti ingénieur se spécialisant dans les <span>systèmes embarqués</span>, dans le <span>traitement du signal</span> et <span>d'image</span>, ou bien dans le <span>développement web</span> ?</br>
					Pour venir me découvrir un peu plus, voici quelques liens venant décrire mon profil, mes activités, mes projets, mes loisirs.</p></br>
				<div id="photo_descritption_deux"style="text-align:center;">
					<a onclick="return btntest_onclick_cv_ligne()"  title="CV en ligne"><img width="27" src="https://cdn4.iconfinder.com/data/icons/file-extensions-1/64/pdfs-512.png" /></a>
					<a onclick="return btntest_onclick_cv()"  title="Télécharger le CV"><img width="35" src="http://canafrica.com/wp-content/uploads/2015/08/pdf-icon-copy.png"/></a>
					<a onclick="return btntest_onclick_link()" title="Linkedin"><img width="35" src="images/linkedin.png" /></a>
				</div>
			</div>
            </div>


		<div id="bloc_skill" >
			<div class="col-md-12 col-xs-12">
				<div class="content_quatre">
					<div class="text_description_profil_span">
						<h3>Mes Compétences</br>
						<span>sont à votre service</span></h3>
					</div>
					<div class="skillbar clearfix " data-percent="75%">
					<div class="skillbar-title" style="background: black;"><span>HTML5/CSS3</span></div>
					<div class="skillbar-bar" style="background: red;"></div>
					<div class="skill-bar-percent">75%</div>
				</div> <!-- End Skill Bar -->

				<div class="skillbar clearfix " data-percent="70%">
					<div class="skillbar-title" style="background: #0F0F0F;"><span>PHP/SQL</span></div>
					<div class="skillbar-bar" style="background: #BF0000;"></div>
					<div class="skill-bar-percent">70%</div>
				</div> <!-- End Skill Bar -->

				<div class="skillbar clearfix " data-percent="70%">
					<div class="skillbar-title" style="background: #191919;"><span>MATLAB</span></div>
					<div class="skillbar-bar" style="background: #BF0000;"></div>
					
					<div class="skill-bar-percent">70%</div>
				</div> <!-- End Skill Bar -->

				<div class="skillbar clearfix " data-percent="65%">
					<div class="skillbar-title" style="background: #242424;"><span>C++</span></div>
					<div class="skillbar-bar" style="background: #920000;"></div>
					<div class="skill-bar-percent">65%</div>
				</div> <!-- End Skill Bar -->

				<div class="skillbar clearfix " data-percent="65%">
					<div class="skillbar-title" style="background: #303030;"><span>Google API</span></div>
					<div class="skillbar-bar" style="background: #920000;"></div>
					<div class="skill-bar-percent">65%</div>
				</div> <!-- End Skill Bar -->

				<div class="skillbar clearfix " data-percent="50%">
					<div class="skillbar-title" style="background: #333333;"><span>jQuery/JS</span></div>
					<div class="skillbar-bar" style="background: #7E0000;"></div>
					<div class="skill-bar-percent">50%</div>
				</div> <!-- End Skill Bar -->


				<div class="skillbar clearfix " data-percent="30%">
					<div class="skillbar-title" style="background: #454545;"><span>VHDL/C</span></div>
					<div class="skillbar-bar" style="background: #520000;"></div>
					<div class="skill-bar-percent">30%</div>
				</div> 
				</div>
			</div>
		</div>
		
				<div class="content_deux">
					<div class="text_description_profil_span_resp">
						<h3>Support Responsive</br>
						<span>Cross browser/Multi-supports</br>Responsive design</span></h3>
					</div>
					<img src="images/responsive.png">
				</div>

				<div class="description_profil_trois">
					</br>
					<p>Vous avez un projet à <span>réaliser</span> ?</br>
					Venez jeter un coup d'oeil à mes travaux effectués pour diverses occasions.</br></p>
					</br>
				</div>
		

		<div id="bloc_work">
				<div class="content_trois">
							<div class="text_description_profil_span">
								<h3>Mes Travaux</br>
									<span>en un clic </span></h3>
								</div>
					</br>

			    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" align="center">
			    <div class=" col-lg-4  col-md-4  col-xs-12 col-sm-6">
			    	<div class="hvrbox">
			      			<img  src="https://cdn.iconscout.com/public/images/icon/free/png-512/google-maps-logo-3ba0b4d72274524f-512x512.png" />
	                        <div class="hvrbox-layer_top">
	                            <div class="hvrbox-text">
	                            	<h1 class="title-box">Distrame</h1>
								<h2>Mise en place d'une cellule de tracking permettant de faire de la géolocalisation de module. 
							Intégration de demande d'ajout sur plusieurs types de capteurs et sur plusieurs types de services, 
							gestion d'une base de données, intégration de la 
							cellule sur le site de l'agence</h2>
							<a data-toggle="modal" onclick="return btntest_onclick_interface()" id="openBtn">Interface</a><a data-toggle="modal" onclick="return btntest_onclick_rapport()" id="openBtn">Rapport</a></div>
            			</div>
			         </div>
			    	</div>
			    <div class=" col-lg-4  col-md-4  col-xs-12 col-sm-6">
			    		<div class="hvrbox">
			      			<img  src="https://www.supinfo.com/articles/resources/217545/5577/3.png"  />
	                        <div class="hvrbox-layer_top">
	                            <div class="hvrbox-text">
	                            	<h1 class="title-box">Systèmes embarqués intelligent</h1>
								<h2>Projet sur la reconnaissance de forme à partir d’un signal vidéo
								 et sur le choix de la solution utilisée pour l’apprentissage (Python)</h2>
							</div>
            			</div>
			         </div>
			    </div>
				<div class=" col-lg-4  col-md-4  col-xs-12 col-sm-6">
			    		<div class="hvrbox">
			      			<img  src="images/face_detect.png" width="300" height="300"/>
	                        <div class="hvrbox-layer_top">
	                            <div class="hvrbox-text">
	                            	<h1 class="title-box">Reconnaissance faciale</h1>
								<h2>Projet sur la détection de visage et sur le 
									suivie de visage par caméra (C++, Arduino)</h2>
							</div>
            			</div>
			         </div>
			    </div>
			    <div class=" col-lg-4  col-md-4  col-xs-12 col-sm-6">
			    		<div class="hvrbox">
			      			<img  src="images/utt.png" width="300" height="300"/>
	                        <div class="hvrbox-layer_top">
	                            <div class="hvrbox-text">
	                          		<h1 class="title-box-signaux">Interpolation et analyse spectrale de signaux échantillonnés irrégulièrement</h1>
								<h2>Etude des techniques d'interpolation permettant de reco
									nstituer un signal en temps continu à partir d'un signal échantillonné irrégulièrement, en 
									limitant les erreurs sur la reconstruction (Matlab)</h2>
							</div>
            			</div>
			         </div>
			    </div>
				</div>
			    <br/>
				</div>
		</div>
		
		<div class="description_profil_trois">
					</br>
					<p>Contactez-moi, je répondrai à vos <span>questions</span>.</br></p>
					</br>
				</div>

		<div id="bloc_contact">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#f2f2f2">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				</br>
				 <div class="form-style-6" style="font-family: 'Raleway', sans-serif;">
				    <h1>Formulaire de contact</h1>
				    	<form method ="POST" action="index.php"> 
				      <input style="font-family: 'Raleway', sans-serif;" type="text" name="field1" placeholder="Votre nom et prénom" />
				      <input style="font-family: 'Raleway', sans-serif;" type="email" name="field2" placeholder="Votre adresse mail" />
				      <textarea style="font-family: 'Raleway', sans-serif;" name="field3" placeholder="Votre message"></textarea>
				      <input style="font-family: 'Raleway', sans-serif;" type="submit" value="Envoyer" />
				    </form>
			  	</div>
			  </div>
			  	<div class="info_contact">
			  	</br></br></br></br>
					  	<div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
								<div align="center">
									<p><span class="glyphicon glyphicon-envelope"></span> kvn.wernet@gmail.com</p>
								</div>
							</br>
						</div>
					  	<div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
							<div align="center">
								<p><span class="glyphicon glyphicon-earphone"></span> +33 (0)6 34 20 31 89</p>
							</div>
							</div>
				</div>


			  <div class="col-md-12 col-xs-12">
				<div class="col-md-12 col-xs-12">
						<iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10617.060488685605!2d4.074430531372067!3d48.29775221483447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1492180232657" frameborder="0" style="border:0; width:100%;height:340px;" allowfullscreen=""></iframe>
				</div>

			</div>
		</div>

			  	<?php 

ini_set("display_errors",0);error_reporting(0); 
$nom=$_POST['field1'];
$add_mail_new=$_POST['field2'];
$message=$_POST['field3'];
date_default_timezone_set('Etc/UTC');
require 'repertoire_mail/PHPMailer-master/PHPMailerAutoload.php';
function send_email($add_mail,$message,$nom){

            //envoi du mail
            $headers ='From: "Portfolio"<'.$add_mail.'>'."\n";
            $headers .='Reply-To: '.'kvn.wernet@gmail.com.'."\n";
            $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
            $headers .='Content-Transfer-Encoding: 8bit';
 
            $message =$nom." vous a envoye un message:\r\n".$message."\r\n"."Son adresse mail est: ".$add_mail;
 
            $mail = mail('kvn.wernet@gmail.com', 'Portfolio', $message, $headers); 
 
}
if (!empty($_POST['field1']) && !empty($_POST['field2']) && !empty($_POST['field3']) ){
		send_email($add_mail_new,$message,$nom);
}
?>
		</div>
</body>

<script>
$(document).ready(function(){
	$("header").sticky({topSpacing:0});
});
$(document).ready(function() {

	$("#show").click(function(){
		$(".target").hide( "drop", {direction: "up"}, 1000 );
		$("#profil").show( "drop", {direction: "down"}, 1000 );
	});

	$("#hide").click(function(){
		$(".target").show( "drop", {direction: "down"}, 1000 );
		$("#profil").hide( "drop", {direction: "up"}, 1000 );
	});

});
jQuery(document).ready(function(){
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});
 function progressbar(percent){
    //var szazalek=Math.round((meik*100)/ossz);
    document.getElementById("szliderbar").style.width=percent+'%';
    document.getElementById("szazalek").innerHTML=percent+'%';
}

var elapsedTime=0;
function timer()
{
if(elapsedTime > 100)
    {
        document.getElementById("szazalek").style.color = "#FFF";
        document.getElementById("szazalek").innerHTML = "Vous êtes le "+ <?php echo $compte ?>+"ème"+" visiteur";
        if(elapsedTime >= 107)
        {
            clearInterval(interval);
            history.go(-1);
        }
    }
    else
    {
        progressbar(elapsedTime);
    }
    elapsedTime++;
    
}
var myVar=setInterval(function(){timer()},20);
 $(document).ready(function(){
           $("#loader").fadeOut(10000);
        })
</script>