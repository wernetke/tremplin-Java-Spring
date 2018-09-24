<?php
include_once ("../model/m_config.php");
include_once ("../model/m_admin.php");

$liste_infos=array();
$liste_infos_nounou=array();

$info=infos_parents($liste_infos);
$info_nounou=infos_nounou($liste_infos_nounou);
$nb_infos_parent=count($info);
$nb_infos_nounou=count($info_nounou);
$sel_contact_nounou=count(select_cont_nounou());
$sel_contact_parent=count(select_cont_parent());
$sel_contact_nounou_info=select_cont_nounou();
$nb_infonou_par=$nb_infos_parent+$nb_infos_nounou;

$sel_admin=select_info_admin($_SESSION["identifiant"]);
if (!empty($_POST)) {
    switch ($_POST["submit"]){
        case "add":
            add_info($_POST["id_parent"]);
            header("Refresh:0");
            break;
        case "supp":
            delete_info($_POST["id_parent"]);
            header("Refresh:0");
            break;
        case "add_nounou":
            add_info_nounou($_POST["id_parent"]);
            header("Refresh:0");
            break;
        case "supp_nounou":
            delete_info_nounou($_POST["id_parent"]);
            header("Refresh:0");
            break;
        case "block_nounou":
            bloc_nounou($_POST["id_parent"]);
            header("Refresh:0");
            break;
        case "deblock_nounou":
            deblock_nounou($_POST["id_parent"]);
            header("Refresh:0");
            break;

    }
}
include_once('../view/v_admin.php');
?>
