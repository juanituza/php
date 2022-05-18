<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (file_exists('archivo.txt')) {
    //si el archivo existe, cargo los datos en la variable aClientes
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson, true);
} else {
    //si el archivo no existe es porque no hay clientes
    $aClientes = array();
}

if ($_POST) {
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];

    $aClientes = array();
    $aClientes[] = array(
        'dni' => $dni,
        'nombre' => $nombre,
        'telefono' => $telefono,
        'correo' => $correo
    );
    //convertir el array aClientes en json
    $strJson = json_encode($aClientes);
    //almacenar el json en un archivo.txt
    file_put_contents("archivo.txt", $strJson);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" />
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>ABM CLIENTES</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="txtNombre">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control shadow my-2" placeholder="Ingrese el DNI">
                    </div>
                    <div>
                        <label for="txtDni">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control shadow my-2" placeholder="Ingrese el nombre">
                    </div>
                    <div>
                        <label for="txtTelefono">Télefono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control shadow my-2" placeholder="11-1234-5678">
                    </div>
                    <div>
                        <label for="edad">Correo:</label>
                        <input type="mail" name="txtCorreo" id="txtCorreo" class="form-control shadow my-2" placeholder="ejemplo@mail.com">
                    </div>
                    <div>
                        <label for="archivo">Adjuntar archivo:</label>
                        <input type="file" name="archivo1" id="archivo1" class="form-control shadow my-2" accept=".jpg,.jpeg,.png">
                        <p> Archivos admitidos: .jpg .jpeg .png</p>
                    </div>

                    <div class="py-3">
                        <button type="submit" name="btnGuardar" class="btn btn-primary m-1">GUARDAR</button>
                        <button type="submit" name="btnNuevo" class="btn bg-danger text-white m-1">NUEVO</button>
                    </div>

                </form>
            </div>
            <div class="col-7 text-center  pb-sm-5">
                <div class="text-center">
                    <table class="table table-hover border shadow">
                        <thead>
                            <tr>

                                <th>IMAGEN</th>
                                <th>DNI</th>
                                <th>NOMBRE</th>
                                <th>TELEFONO</th>
                                <th>CORREO</th>
                                <th>ACCIONES</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aClientes as $cliente) : ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $cliente['dni']; ?></td>
                                    <td><?php echo $cliente['nombre']; ?></td>
                                    <td><?php echo $cliente['telefono']; ?></td>
                                    <td><?php echo $cliente['correo']; ?></td>
                                    <td></td>



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