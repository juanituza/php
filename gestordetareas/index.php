<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

setlocale(LC_TIME, 'es_MX');
$fecha= strftime("%a/%d/%B/%Y");


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
            'descripcion' => $descripcion
        );
    } else {
        $aTareas[] = array(
            'titulo' => $titulo,
            'prioridad' => $prioridad,
            'estado' => $estado,
            'usuario' => $usuario,
            'descripcion' => $descripcion
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
                    <div class="py-1">
                        <label for="txtTitulo">Título</label>
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control shadow" value="<?php echo isset($aTareas[$id]["titulo"]) ? $aTareas[$id]["titulo"] : ""; ?>">
                    </div>
                    <div class=" py-1">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control shadow" value="<?php echo isset($aTareas[$id]["prioridad"]) ? $aTareas[$id]["prioridad"] : ""; ?>">
                            <option value=" Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control shadow" value="<?php echo isset($aTareas[$id]["estado"]) ? $aTareas[$id]["estado"] : ""; ?>">
                            <option value=" Sin Asignar">Sin Asignar</option>
                            <option value="Asignado">Asignado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Terminado">Terminado</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstUsuarios">Usuarios</label>
                        <select name="lstUsuarios" id="lstUsuarios" class="form-control shadow" value="<?php echo isset($aTareas[$id]["usuario"]) ? $aTareas[$id]["usuario"] : ""; ?>">
                            <option value="" disabled selected>Selecionar</option>
                            <option value=" Juan">Juan</option>
                            <option value="Luciana">Luciana</option>
                            <option value="Pablo">Pablo</option>
                        </select>
                    </div>
                    <div class="py-3">
                        <label for="txtDescripcion"> Descripción</label>
                        <textarea style="resize:none" name="txtDescripcion" id="txtDescripcion" class="form-control shadow" cols="30" rows="10" placeholder="Escribe aquí la descripción" value="<?php echo isset($aTareas[$id]["descripcion"]) ? $aTareas[$id]["descripcion"] : ""; ?>"></textarea>

                    </div>
                    <div class=" py-1">
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary m-1">ENVIAR</button>

                    </div>
                </form>
            </div>


        </div>
        <div class="row">
            <div class="col-12  py-3">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>TÍTULO</th>
                            <th>PRIORIDAD</th>
                            <th>USUARIO</th>
                            <th>ACCIÓN</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aTareas as $pos => $tarea) : ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $fecha;?></td>
                                <td><?php echo $tarea['titulo']; ?></td>
                                <td><?php echo $tarea['prioridad']; ?></td>
                                <td><?php echo $tarea['usuario']; ?></td>
                                <td>
                                <td> <a href="?id=<?php echo $pos ?>"> <i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="?id=<?php echo $pos ?>&do=eliminar"><i class="fa-solid fa-trash"></i></a>
                                </td>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>


                </table>
            </div>



        </div>






    </main>

</body>

</html>