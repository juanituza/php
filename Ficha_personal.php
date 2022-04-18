<?php
$nombre="Juan Ignacio";
$edad="36";
$fecha=date("d/M/y");
$aPeliculas = array("Corazón valiente" , "Voler al futuro", "Gladiador");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ficha Personal</title>
</head>

<body>
    <div class="container m-4">

        <div class="row">
            <div class="col-12 m-3">
                <h1 class="text-center">FICHA PERSONAL</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">

                <table class="table table-hover table-bordered mt-3 m-5">
                    <tr>
                        <td>Fecha:</td>
                        <td><?php echo $fecha?></td>
                    </tr>
                    <tr>
                        <td>Nombre y apellido:</td>
                        <td><?php echo $nombre?></td>
                    </tr>
                    <tr>
                        <td> Edad:</td>
                        <td><?php echo $edad ?></td>
                    </tr>
                    <tr>
                        <td>Peliculas favoritas:</td>
                        <td> <?php echo $aPeliculas[0] ." </br> " . $aPeliculas[1] . " </br>" . $aPeliculas[2] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>