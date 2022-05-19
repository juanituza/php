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
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control shadow">
                    </div>
                    <div class="py-1">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control shadow">
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control shadow">
                            <option value="Sin Asignar">Sin Asignar</option>
                            <option value="Asignado">Asignado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Terminado">Terminado</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstUsuarios">Usuarios</label>
                        <select name="lstUsuarios" id="lstUsuarios" class="form-control shadow">
                            <option value="" disabled selected>Selecionar</option>
                            <option value="Juan">Juan</option>
                            <option value="Luciana">Luciana</option>
                            <option value="Pablo">Pablo</option>
                        </select>
                    </div>
                    <div class="py-3">
                        <label for="txcDescripción"> Descripción</label>
                        <textarea style="resize:none" name="txcDescripción" id="txcDescripción" class="form-control shadow" cols="30" rows="10" placeholder="Escribe aquí la descripción"></textarea>

                    </div>
                    <div class="py-1">
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

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>


                </table>
            </div>



        </div>






    </main>

</body>

</html>