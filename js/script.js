function btntest_onclick()
{
    var nombre_point_geo = document.getElementById("nombre_point_geo").value;
    if (nombre_point_geo!='' && isNaN(nombre_point_geo)===false ) {
        var id_hid = document.getElementById("id_hid").textContent;
        var zone_zn = document.getElementById("zone_zn").value;
        window.open("../final_event/page_2.php?_id_cap=" + id_hid + "&nb_point_geoloc=" + nombre_point_geo + "&area=" + zone_zn + "",'_blank');
    }
}
function btntest_onclick_deux()
{	
	var choix = $(".choix_select_forme_area_cliquez:checked").val();
    window.open("../final_event/page_2.php?_id_cap=1C668&nb_point_geoloc=10&area=" + choix + "","_self");
    
}
function btntest_onclick_cv()
{
   	window.open("http://kevinwernet.fr/cv_final.pdf",'_blank');
}
function btntest_onclick_cv_ligne()
{
    window.open("http://kevinwernet.fr/cv_ligne.php",'_blank');
}
function btntest_onclick_link()
{
    window.open("https://www.linkedin.com/in/k%C3%A9vin-wernet-328176126/",'_blank');
}
function btntest_onclick_rapport()
{
    window.open("http://kevinwernet.fr/stage_tn09/stage.html",'_blank');
}
function btntest_onclick_interface()
{
    window.open("http://kevinwernet.fr/map_capteur/final_event/index.php",'_blank');
}
