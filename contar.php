<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 95,
);
$aPacientes[] = array(
    "dni" => "36.630.478",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 85,

);

$aNotas=  array(9,8,9.5,4,7,8);
$aEmpleados = array("gardella","mc kenna","vazquez","marioni","viegas","roche","villatarco");



function contar ($aPaciente){
    $contador = 0;
    foreach ($aPaciente as $item) {
         $contador++;
    }
    return  $contador;

     

}

echo "cantidad de pacientes es: ". contar($aPacientes) . "<br>";
echo "cantidad de empleados es: ". contar($aEmpleados) . "<br>";
echo "cantidad de notas es: ". contar($aNotas);


?>

