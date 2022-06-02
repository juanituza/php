<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

abstract class Persona
{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }

    public function imprimir(){
        echo "DNI:". $this->dni . "<br>";
        echo "Nombre:". $this->nombre . "<br>";
        echo "Correo:". $this->correo . "<br>";
        echo "Celular:". $this->celular . "<br>";

    }
}
class Entrenador extends Persona
{
    private $aClases;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular); 
        $this->aClases = array();
    }


    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarClase($clase)
    {
        $this->aClases[] = $clase;
    }
}
class Alumno extends Persona
{

    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;


    public function __construct($dni, $nombre, $correo, $celular, $fechaNac)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->presentismos = 0.0;
    }
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    public function setFichaMedica($peso, $altura, $aptoFisico)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }
}
class Clase
{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct()
    {
        $this->aAlumnos = array();
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }
    public function inscribirAlumno($alumno)
    {
        $this->aAlumnos[] = $alumno;
    }
    public function imprimirListado()
    {
        echo "<table  class='table table-hover table-bordered border-dark shadow';
                <tr>
                    <th colspan=2 class='table-secondary'>Clase</th>
                    <td colspan=2>" . $this->nombre . "</td>
                    
                </tr>
                <tr>
                    <th colspan=2  class='table-secondary'> ENTRENADOR</th>
                    <td colspan=2>" . $this->entrenador->nombre . "</td>
                </tr>
                <tr>
                    <th colspan=4 class='text-center table-secondary' >ALUMNOS </th>
                </tr>
                <tr>
                    <td  class='table-secondary'>Nombre</td>
                    <td  class='table-secondary'>DNI</td>
                    <td  class='table-secondary'>Celular</td>
                    <td  class='table-secondary'>Apto Fisico</td>

                </tr>";
                    foreach ($this->aAlumnos as $alumno):
                        echo "<tr>
                                <td >". $alumno->nombre."</td>
                                <td >". number_format($alumno-> dni, 0, ",",  ".") ."</td>
                                <td >". $alumno->celular."</td>
                                <td >". $alumno->aptoFisico."</td> 
                             </tr>";
                    endforeach;
            "</table>";
            /*  **==>preguntar para que aparezca true o false****<==  */
    }
}


//Programa
$entrenador1 = new Entrenador("31789456", "Juan Perez", "juanperez@gmail.com", "1112345678");
$entrenador2 = new Entrenador("30985469", "Federico Lopez", "fedelo@mail.com", "1132659878");

$alumno1 = new Alumno("31123456", "Juan De los Santos", "juandelos@mail.com", "1191846216", "4-02-1983");
$alumno1->setFichaMedica(90, 1.80, true);
$alumno1->presentismo = 80;

$alumno2 = new Alumno("36630478", "Luciana Ghio", "luciana@gmail.com", "1149270395", "09-12-1991");
$alumno2->setFichaMedica(70, 1.60, false);
$alumno2->presentismo = 98;

$alumno3 = new Alumno("31729647", "Juan Ignacio Mc kenna", "juanituza85@gmail.com", "1150571913", "24-07-1985");
$alumno3->setFichaMedica(93, 1.68, true);
$alumno3->presentismo = 40;

$alumno4 = new Alumno("35456321", "Mariano Milani", "milani@mail.com", "1145983278", "18-08-1985");
$alumno4->setFichaMedica(70, 1.70, true);
$alumno4->presentismo = 100;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno2);
$clase1->inscribirAlumno($alumno3);
//$clase1->imprimirListado();

$clase2 = new Clase();
$clase2->nombre = "Cardio";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno4);
$clase2->inscribirAlumno($alumno2);
//$clase2->imprimirListado();

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
                <?php echo $clase1->imprimirListado(); ?>
            </div>
            <div class="col-6">
                <?php echo $clase2->imprimirListado(); ?>
            </div>
        </div>
    </main>

</body>

</html>