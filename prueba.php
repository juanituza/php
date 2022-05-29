<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Prueba</title>
</head>

<body>
    <?php echo "Hola mundo </br>";
    echo  date("d/M/Y");
    ?>

    <div class="motion">
        <div class="circle"></div>
    </div>

    <div>
        <p class="element text-element">ho-la </p>
    </div>

    <?php
    function saludar($nombre = "Juan", $apellido = "")
    {
        return "Hola $nombre $apellido ";
    }
    echo saludar("Luciana") . "<br>";

    echo saludar();

    ?>

</body>

</html>

