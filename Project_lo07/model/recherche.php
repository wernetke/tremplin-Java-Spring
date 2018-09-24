<?php
include_once ("../model/m_config.php");

// Empêche l'accès direct à la page
if(!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'))
trigger_error('Accès refusé', E_USER_ERROR);

// Définition de la recherche, suppression des tags, remplacement des espaces multiples...
// $term est le nom de la variable utilisé par l'autocomplétion de jquery UI
$term = addslashes(strip_tags(trim($_GET['term'])));
$term = preg_replace('/\s+/', ' ', $term);

$a_json = array();
$a_json_row = array();

// Recherche dans la base (ici sur le champ societe, encore une fois j'ai viré du code superflu pour la compréhension)
$sql = "SELECT * FROM city WHERE name LIKE '%".$term."%'";
$result = mysqli_query($bdd, $sql);
while($row = mysqli_fetch_array($result))
{

$a_json_row["ville"] = $row['name'];
array_push($a_json, $a_json_row);
}

$json = json_encode($a_json);
echo $json;
?>