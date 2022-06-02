<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente
{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __construct()
    {
        $this->descuento = 0.0;
    }

    public function imprimir()
    {
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br>";
    }
}

class Producto
{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __construct()
    {

        $this->precio = 0.0;
        $this->iva = 0.0;
    }
    public function imprimir()
    {
        echo "cod: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br>";
    }
}

class carrito
{
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __construct()
    {
        $this->aProductos = array();
        $this->subtotal = 0.0;
        $this->total = 0.0;
    }

    public function cargarProducto($producto)
    {
        $this->aProductos[] = $producto;
    }
    public function imprimirTicket()
    {
        echo "<table  class='table table-hover table-bordered border-dark shadow';
                <tr>
                <th class='text-center table-secondary' colspan=2> ECO MARKET</th>
                </tr>

                <tr>
                <th class='table-secondary'>FECHA:</th>
                <td>". date("d/m/Y H:i:s") . "</td>
                </tr>
                <tr>            
                    <th class='table-secondary'>DNI:</th>
                    <td>". $this->cliente->dni  . "</td>
                </tr>
                <tr>
                    <td class='table-secondary'>NOMBRE:</td>
                    <td>". $this->cliente->nombre. "</td>
                </tr>
                <tr>
                    <th colspan=2 class='text-center table-secondary' >PRODUCTOS </th>
                </tr>";
                    foreach ($this->aProductos as  $producto) :
                        echo "<tr>
                                <td>" . $producto->nombre. "</td>
                                <td>" .  number_format($producto->precio,2,",",".")."</td>        
                            </tr>";
                            $this->subtotal+=$producto->precio;
                            $this->total+= $producto->precio * number_format(($producto->iva / 100)+1);
                    endforeach;
        echo    "<tr>
                    <th class='table-secondary'>SUBTOTAL:</th>
                    <td>". number_format($this->subtotal, 2, ",", ".") ."</td>
                </tr>
                 <tr>
                    <th class='table-secondary'>TOTAL:</th>
                    <td>" . number_format($this->subtotal, 2, ",", ".") . "</td>
                </tr>
            </table>";

    }
}


//PROGAMA

$cliente1 = new Cliente();
$cliente1->dni = "31729647";
$cliente1->nombre = "Juan Ignacio";
$cliente1->correo = "juanituza85@gmail.com";
$cliente1->telefono = "+5491150571913";
$cliente1->descuento = 0.05;

$cliente2 = new Cliente();
$cliente2->dni = "36630478";
$cliente2->nombre = "Luciana Ghio";
$cliente2->correo = "mail@gmail.com";
$cliente2->telefono = "+5491149270395";
$cliente2->descuento = 0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->precio = 30800;
$producto1->descripcion = "Esta es una computadora HP";
$producto1->iva = 21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirpool";
$producto2->precio = 76000;
$producto2->descripcion = "Esta es una heladera no frost";
$producto2->iva = 10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

$carrito1 = new Carrito();
$carrito1->cliente = $cliente2;
$carrito1->cargarProducto($producto1);
$carrito1->cargarProducto($producto2);
//print_r($carrito);
//$carrito->imprimirTicket();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Carrito Venta</title>
</head>

<body>
    <main class="container">
        <div class="row mt-3">
            <div class="col-6">
                <?php echo $carrito->imprimirTicket(); ?>
            </div>
            <div class="col-6">
                <?php echo $carrito1->imprimirTicket();?>
            </div>
        </div>
    </main>

</body>

</html>