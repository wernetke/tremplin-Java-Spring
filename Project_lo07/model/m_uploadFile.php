<?php
 function uploadFile($id)
 {
     $directory = '../avatar/';
     $name_file = $_FILES["photo"]["name"];
     $name_temp_file = $_FILES["photo"]["tmp_name"];
     if(!file_exists($directory))
     {
         mkdir('../avatar/',0777,true);
     }
         $file_id_nounou=$id.".".basename($name_file);
         $file_to_upload = $directory.$file_id_nounou;
         if(move_uploaded_file($name_temp_file,$file_to_upload))
         {
            ob_start();
             header("Location:../controller/c_confirmpage.php");
             exit();
         }
 }
 ?>