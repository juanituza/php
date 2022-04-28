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
    "peso" => 79
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 95
);
$aPacientes[] = array(
    "dni" => "36.630.478",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 85

);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CLINICA</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 m-5 text-center">
                <h1>Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr class="text-center">
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>EDAD</th>
                            <th>PESO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aPacientes as $paciente) { ?>
                            <tr>
                                <td><?php echo $paciente["dni"];  ?></td>
                                <td><?php echo $paciente["nombre"];  ?></td>
                                <td><?php echo $paciente["edad"];  ?></td>
                                <td><?php echo $paciente["peso"];  ?></td>

                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>