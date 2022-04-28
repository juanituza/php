<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[]= array(
    'DNI' => 33300123,
    'nombre'=> "Gardella Pablo",
    'bruto' => 850000.50
    );
$aEmpleados[]= array('DNI' => 40874456,
    'nombre' => 'Roche Walter',
    'bruto'=> 255000
);
$aEmpleados[]= array('DNI'=> 36630478,
    'nombre' => 'Luciana Ghio',
    'bruto' =>  105000
);
$aEmpleados[]= array(
    'DNI' => 31729647,
    'nombre'=> 'Juan Ignacio Mc Kenna',
    'burto' => 200
);
function calcularNeto($bruto)
{

    return $bruto - ($bruto * 0.17);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Empleados</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center m-3 pb-3">
                <h1>Listado de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>

                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                            foreach ($aEmpleados as $empleado) {
                                # code...
                            }{ 
                        ?>  
                                <tr>
                                    <td><?php echo $aEmpleado['DNI']?></td>
                                    <td><?php echo mb_strtoupper( $empleado['nombre']); ?></td>
                                    <td><?php $importe= CalcularNeto( $ampleado['bruto']);
                                    echo number_format($importe, 2, ",","." );?>
                                    </td>
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