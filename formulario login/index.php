<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_POST) {/*Si es postback*/
    $nombre = $_POST['txtUsuario'];
    $clave = $_POST['txtClave'];


    if ($nombre != "" && $clave != "") {
        header("location:acceso-confirmado.php");
    } else {
        $mensaje = "Válido solo para mensajes registrados";
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


    <title>actividad</title>
</head>

<body>
    <main class="container">

        <div class="row ">
            <div class="col-12 m-2 text-center">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="col-6 ">
                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                        <div>
                            <label for="txtUsuario">Usuario:</label>
                            <input type="text" name="txtUsuario"  class="form-control">
                        </div>
                        <div>
                            <label for="txtClave">Clave:</label>
                            <input type="password" name="txtClave"  class="form-control">
                        </div>
                        <div class="py-3">
                            <button type="submit" class="btn btn-primary">
                                ENVIAR
                            </button>
                        </div>
                </form>
            </div>
        </div>

    </main>
</body>

</html>