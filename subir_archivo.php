<?php
    if ($_FILES["archivo"]["error"]=== UPLOAD_ERR_OK) {
        $nombreAleatorio= date("Ymdhmsi").rand(1000,2000);
        $archivo_tpm =$_FILES["archivo"]["tmp_name"];
        $extension=pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension=="doc" || $extension=="docx"||$extension=="pdf")
            move_uploaded_file($archivo_tpm,"files/$nombreAleatorio.$extension"); 
    }


?>