<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists('archivo.txt')) {

    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {

    $aTareas = array();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);
    //convertir el array aClientes en json
    $strJson = json_encode($aTareas);
    //almacenar el json en un archivo.txt
    file_put_contents("archivo.txt", $strJson);
    header("location: index.php");
}



if ($_POST) {
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $estado = $_POST["lstEstado"];
    $usuario = $_POST["lstUsuarios"];
    $descripcion = $_POST["txtDescripcion"];


    if ($id >= 0) {
        $aTareas[$id] = array(
            'titulo' => $titulo,
            'prioridad' => $prioridad,
            'estado' => $estado,
            'usuario' => $usuario,
            'descripcion' => $descripcion,
            'fecha' => $aTareas[$id]['fecha'],
        );
    } else {
        $aTareas[] = array(
            'titulo' => $titulo,
            'prioridad' => $prioridad,
            'estado' => $estado,
            'usuario' => $usuario,
            'descripcion' => $descripcion,
            'fecha' => date('d/m/Y')
        );
    }

    $strJson = json_encode($aTareas);
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
    <title>GESTOR DE TAREAS</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="row">

                        <div class="col-4  py-1">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control shadow">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Alta
                                </option>
                                <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Media
                                </option>
                                <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Baja
                                </option>
                            </select>
                        </div>
                        <div class="col-4  py-1">
                            <label for="lstUsuarios">Usuarios</label>
                            <select name="lstUsuarios" id="lstUsuarios" class="form-control shadow">
                                <option value="" disabled selected>Selecionar</option>
                                <option value="Juan" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Juan" ? "selected" : ""; ?>>Juan</option>
                                <option value="Luciana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Luciana" ? "selected" : ""; ?>>Luciana</option>
                                <option value="Pablo" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Pablo" ? "selected" : ""; ?>>Pablo</option>
                            </select>
                        </div>
                        <div class="col-4 py-1">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control shadow">
                                <option value=" Sin Asignar">Sin Asignar</option>
                                <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : ""; ?>>Asignado</option>
                                <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : ""; ?>>En proceso</option>
                                <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : ""; ?>>Terminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="py-1">
                            <label for="txtTitulo">Título</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="form-control shadow" value="<?php echo isset($aTareas[$id]["titulo"]) ? $aTareas[$id]["titulo"] : ""; ?>">
                        </div>

                        <div class="py-3">
                            <label for="txtDescripcion"> Descripción</label>
                            <textarea style="resize:none" name="txtDescripcion" id="txtDescripcion" class="form-control shadow" requided value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""; ?>"></textarea>

                        </div>
                        <div class=" text-center py-1">
                            <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary m-1">ENVIAR</button>
                            <a href="index.php" class="btn btn-secondary m-1">NUEVO</a>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <?php if (count($aTareas)) : ?>


            <div class="row">
                <div class="col-12  py-3">
                    <table class="table table-hover border shadow">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>TÍTULO</th>
                                <th>PRIORIDAD</th>
                                <th>ESTADO</th>
                                <th>USUARIO</th>
                                <th>ACCIÓN</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea) : ?>
                                <tr>
                                    <td><?php echo $pos; ?></td>
                                    <td><?php echo $tarea['fecha']; ?></td>
                                    <td><?php echo $tarea['titulo']; ?></td>
                                    <td><?php echo $tarea['prioridad']; ?></td>
                                    <td><?php echo $tarea['estado']; ?></td>
                                    <td><?php echo $tarea['usuario']; ?></td>
                                    <td>
                                    <td> <a href="?id=<?php echo $pos ?>" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>


                    </table>
                </div>



            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">

                    <div class="alert alert-info" role="alert">
                        Aun no se cargaron tareas
                    </div>
                </div>
            </div>
        <?php endif ?>





    </main>

</body>

</html>