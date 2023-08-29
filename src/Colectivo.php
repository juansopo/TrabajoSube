<?php
namespace TrabajoSube;
require 'Tarjeta.php';
require 'Boleto.php';

class Colectivo{

    public $tarifa;

    function __construct(){
        $boleto = new Boleto;
        $this->tarifa = $boleto->tarifa;
    }

    function pagarCon($tarjeta){
        if($tarjeta->consultarSaldo()>= $this->tarifa){
            $tarjeta->hacerViaje($this->tarifa);
        }else{
            echo "No tiene saldo suficiente";
            return;
        }
    }
}


$tarjetanashe = new Tarjeta;
$tarjetanashe->cargarTarjeta(4000);
$tarjetanashe->cargarTarjeta(4000);
$colectivonashe = new Colectivo;
$colectivonashe->pagarCon($tarjetanashe);
echo $tarjetanashe->consultarSaldo();