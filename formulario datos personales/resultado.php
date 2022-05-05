<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    $nombre = $_REQUEST["txtNombre"];
    $dni = $_REQUEST["txtDni"];
    $edad = $_REQUEST["edad"];
    $telefono = $_REQUEST["txtTelefono"];
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Resultado</title>
</head>

<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-6 text-center offset-sm-3 my-sm-5">
                <h1>DATOS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-center offset-sm-3 ">

                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <td>NOMBRE</td>
                            <td>DNI</td>
                            <td>EDAD</td>
                            <td>TELÉFONO</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> <?php echo $nombre ?></td>
                            <td> <?php echo $dni ?></td>
                            <td> <?php echo $edad ?></td>
                            <td> <?php echo $telefono ?></td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </main>
</body>

</html>