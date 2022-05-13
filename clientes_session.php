<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION["listadoClientes"])) {
    $_SESSION["listadoClientes"] = array();
}

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {

        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $edad = $_POST["txtEdad"];
        $telefono = $_POST["txtTelefono"];





        $_SESSION["listadoClientes"][] =
            $cliente = array(
                'nombre' => $nombre,
                'dni' => $dni,
                'edad' => $edad,
                'telefono' => $telefono
            );
    } else if (isset($_POST["btnEliminar"])) {
        session_destroy();
        header("location: clientes_session.php");
    }
}


?>





<!DOCTYPE html>
<html lang="es">

<head>

    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Datos personales</title>
</head>

<body>
    <main class="container">

        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1 class="shadow">Datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-5">
                <form action="clientes_session.php" method="POST">
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control shadow my-2" placeholder="Ingrese el nombre">
                    </div>
                    <div>
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control shadow my-2" placeholder="DNI">
                    </div>
                    <div>
                        <label for="edad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control shadow my-2" placeholder="EDAD">
                    </div>
                    <div>
                        <label for="txtTelefono">Télefono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control shadow my-2" placeholder="Teléfono">
                    </div>
                    <div class="py-3">
                        <button type="submit" name="btnGuardar" class="btn btn-primary m-1">GUARDAR</button>
                        <button type="submit" name="btnEliminar" class="btn bg-danger text-white m-1">ELIMINAR</button>
                    </div>

                </form>
            </div>


            <div class="col-7 text-center  pb-sm-5">




                <div class="text-center">

                    <table class="table table-hover border shadow">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>DNI</th>
                                <th>EDAD</th>
                                <th>TELÉFONO</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($_SESSION["listadoClientes"] as  $cliente) : ?>
                                <tr>
                                    <td><?php echo $cliente['nombre'] ?></td>
                                    <td><?php echo $cliente['dni'] ?></td>
                                    <td><?php echo $cliente['edad'] ?></td>
                                    <td><?php echo $cliente['telefono'] ?></td>


                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </main>
</body>

</html>