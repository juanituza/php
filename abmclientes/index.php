<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//si el archivo existe
if (file_exists('archivo.txt')) {
    //si el archivo existe, cargo los datos en la variable aClientes
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson, true);
} else {
    //si el archivo no existe es porque no hay clientes
    $aClientes = array();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}
//si es eliminar
if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aClientes[$id]);
    //convertir el array aClientes en json
    $strJson = json_encode($aClientes);
    //almacenar el json en un archivo.txt
    file_put_contents("archivo.txt", $strJson);


    header("location: index.php");
}



if ($_POST) {
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];
    

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
       
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tpm = $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tpm, "imagenes/$nombreImagen");
        }
    }
    if ($id >= 0) {
        //si no se subió una imagen y estoy editando conservar en $nombreImagen el nombre
        //de la imagen anterior que está asociada al cliente que estamos editando
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $nombreImagen = $aClientes[$id]["imagen"];
        }//Si viene una imagen y hay una imagen anterior, eliminar la anterior
        else{
            if(file_exists("imagenes/" . $aClientes[$id]["imagen"])) {
            unlink("imagenes/" . $aClientes[$id]["imagen"]);
            }
        }
        //estoy editando
        $aClientes[$id] = array(
            'dni' => $dni,
            'nombre' => $nombre,
            'telefono' =>$telefono,
            'correo' => $correo,
            'imagen' => $nombreImagen
        );
    } else {
        //estoy insertando un nuevo cliente
        $aClientes[] = array(
            'dni' => $dni,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'correo' => $correo,
            'imagen' => $nombreImagen
        );
    }


    //convertir el array aClientes en json
    $strJson = json_encode($aClientes);
    //almacenar el json en un archivo.txt
    file_put_contents("archivo.txt", $strJson);
}


?>



<!DOCTYPE html>
<html lang="es">

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
                        <input type="text" name="txtDni" id="txtDni" class="form-control shadow my-2" placeholder="Ingrese el DNI" value="<?php echo isset($aClientes[$id]["dni"]) ? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="txtDni">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control shadow my-2" placeholder="Ingrese el nombre" value="<?php echo isset($aClientes[$id]["nombre"]) ? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="txtTelefono">Télefono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control shadow my-2" placeholder="11-1234-5678" value="<?php echo isset($aClientes[$id]["telefono"]) ? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="edad">Correo:</label>
                        <input type="mail" name="txtCorreo" id="txtCorreo" class="form-control shadow my-2" placeholder="ejemplo@mail.com" value="<?php echo isset($aClientes[$id]["correo"]) ? $aClientes[$id]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="archivo">Adjuntar archivo:</label>
                        <input type="file" name="archivo" id="archivo" class="form-control shadow my-2" accept=".jpg,.jpeg,.png">
                        <p> Archivos admitidos: .jpg .jpeg .png</p>
                    </div>

                    <div class="py-3">
                        <button type="submit" name="btnGuardar" class="btn btn-primary m-1">GUARDAR</button>
                        <a href="index.php" class="btn bg-danger text-white m-1">NUEVO</a>
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
                            <?php foreach ($aClientes as $pos => $cliente) : ?>
                                <tr>
                                    <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                                    <td><?php echo $cliente['dni']; ?></td>
                                    <td><?php echo $cliente['nombre']; ?></td>
                                    <td><?php echo $cliente['telefono']; ?></td>
                                    <td><?php echo $cliente['correo']; ?></td>
                                    <td> <a href="?id=<?php echo $pos ?>"> <i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar"><i class="fa-solid fa-trash"></i></a>
                                    </td>



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