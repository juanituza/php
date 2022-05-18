<?php

function print_f($variable){
    if(is_array($variable)){
        $contenido = "";
        foreach ($variable as $file) {
           
           $contenido.= $file . "\n";
           
        }
        file_put_contents('datos.txt', $contenido);
      
    }else{
        file_put_contents("datos.txt",$variable);

    }
    echo 'Archivo actualizado';
}
function print_f2($variable){
    if(is_array($variable)){
        $archivo1= fopen("datos.txt","a+");
        foreach ($variable as $file) {
           fwrite($archivo1,$file . "\n");
           
        }
        fclose($archivo1);
     
    }else{
        fwrite("datos.txt",$variable . "\n");

    }
    
    echo 'Archivo actualizado2';
}
function print_f3($variable){
    if(is_array($variable)){
        $contenido="";
        $archivo1= fopen("datos.txt","w");
        foreach ($variable as $file) {
           $contenido.=$file;
           
        }
        fwrite($archivo1, $contenido . "\n");
        fclose($archivo1);
     
    }else{
        fwrite("datos.txt",$variable . "\n");

    }
    
    echo 'Archivo actualizado2';
}
$aNotas=array(8,5,7,9,10,12);
$msg = 'Este es una prueba';


print_f3($aNotas);



?>