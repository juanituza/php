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

        <div class="row ">
            <div class="col-12 m-2 text-center">
                <h1>Formulario datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-6  col-12 offset-sm-3">
                <form action="resultado.php" method="POST">
                    <div>
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtDni">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div>
                        <label for="edad">Edad:*</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtTelefono">Télefono:*</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>

                </form>
            </div>
        </div>

    </main>
</body>

</html>