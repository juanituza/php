<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists('invitados.txt')) {
    $aInvitados = explode(',', file_get_contents("invitados.txt"));
} else {

    $aInvitados = array();
}

if ($_POST) {
    $dni = $_POST["txtDni"];
    $codigo = $_POST["txtCodigo"];


    if (isset($_POST["btnProcesar"])) {

        //Si el dni ingresado se encuentra en la lista se mostrara un mensaje de bienvenida
        if (in_array($dni, $aInvitados)) {
            $bienvenida = "$dni se encuentra en la lista de invitados";
        } else {
            //si no un mensaje de "no se encuentra en la lista de invitados"
            $error = "$dni no se encuentra en la lista";
        }
    }
    if (isset($_POST["btnVip"])) {

        //Si el código es verde entonces se mostrará "su codigo de acceso es (ramdom)"
        if ($codigo == 'verde') {
            $codAcceso = 'Su codigo de acceso es' . " " . rand(1000, 9999);
        } //si no un mensaje "Ud. no es VIP" 
        else {
            $errorVip = 'Ud. no es VIP';
        }
    }
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Acceso Invitados</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lista de invitados</h1>
            </div>
            <?php if (isset($bienvenida)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $bienvenida; ?>
                </div>
            <?php endif; if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($codAcceso)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $codAcceso; ?>
                </div>
            <?php endif; if (isset($errorVip)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorVip;?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-5 py-3">
                <form method="POST">
                    <div class="my-3">
                        <label for="txtDni" class="py-2">Ingrese DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control shadow">
                    </div>
                    <div class="my-3">
                        <button type="submit" name="btnProcesar" id="btnProcesar" class="btn btn-outline-primary shadow py-1">Verificar invitado</button>
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="txtCodigo" class="py-2">Ingrese el código secreto para el pase VIP:</label>
                        <input type="text" name="txtCodigo" id="txtCodigo" class="form-control shadow">
                    </div>
                    <div class="my-3">
                        <button type="submit" name="btnVip" id="btnVip" class="btn btn-outline-primary shadow py-1">Verificar código</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>