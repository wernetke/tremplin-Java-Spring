
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
