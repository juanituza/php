<?php
    $aNotas = array(8,4,5,3,9,1);
    $aSueldo= array(800.30,400.37,500.45,300,900.70,100,900,1800);

    function maximo($aVector){
        $mayor = 0;
        foreach ($aVector as $vector) {
        if ($mayor < $vector ) {
            $mayor=$vector;
            } 
        }
            
        return $mayor;
    }

    echo maximo($aNotas);
?>