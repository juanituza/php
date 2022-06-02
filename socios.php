<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

abstract class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni,$nombre,$correo,$celular){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->celular=$celular;
        
    }
    abstract public function imprimir(){

    }
}

class Cliente extends Persona {
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechasBaja;
    
    public function __construct(){
    $this->aTarjetas=array();
    $this->bActivo=true;
    $this->fechaAlta=date("d/m/Y H:i:s");
    
    }
    
    
    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$valor)
    {
        $this->$propiedad = $valor;
    }

    public function darDeBaja($fechasBaja){
        $this->bActivo=false;
        $this->fechaBaja=$fechasBaja;
    }

    public function agregarTarjeta($tarjeta){

        $this->aTarjetas[]=$tarjeta;
    }
    public function imprimir(){
        echo "Nombre del cliente: ". $this->nombre . "<br>";
        echo "DNI: " .  $this->dni . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Celular: ". $this->celular . "<br>";

        echo "Tarjetas: "; 
        foreach ($this->aTarjetas as $tarjeta) {
           echo  $tarjeta->tipo . "  " . "||" . "  " . "Numero: " . $tarjeta->numero . "<br>";
        };



    }
}
class Tarjeta {
   
    private $numero;
    private $fechaDesde;
    private $tipo;    
    private $fechaVto;   
    private $cvv;
    const VISA="Visa";
    const MASTER="Mastercard";
    const AMEX="American Express";
    const NARARANJA="Naranja";
    const CABAL="CABAL";



    public function __construct($tipo,$numero,$fechaVto,$cvv){
       
        $this->numero=$numero;
        $this->tipo=$tipo;
        $this->fechaVto=$fechaVto;
        $this->cvv=$cvv;
    }

     public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$valor)
    {
        $this->$propiedad = $valor;
    }

}

//Desarrollo del programa
$cliente1 = new Cliente();
$cliente1->dni = "35123789";
$cliente1->nombre = "Ana Valle";
$cliente1->correo = "ana@correo.com";
$cliente1->celular = "1156781234";
$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750778806383", "01/2023", "275");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347572886751981", "07/2027", "136");
$tarjeta3 = new Tarjeta(Tarjeta::MASTER, "5415620495970009", "12/2024", "742");
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);

$cliente2 = new Cliente();
$cliente2->dni = "48456876";
$cliente2->nombre = "Bernabe Paz";
$cliente2->correo = "bernabe@correo.com";
$cliente2->celular = "1145326787";
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316", "08/2025", "865"));
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::MASTER, "5149107669552238", "04/2025", "554"));

echo $cliente1->imprimir() . "<br>";
echo $cliente2->imprimir();


?>










