<?php

namespace TrabajoSube;
class Colectivo{

    public $tarifa;

    function __construct(){
        $boleto = new Boleto;
        $this->tarifa = $boleto->tarifa;
    }

    function pagarCon(Tarjeta $tarjeta){
        $tarjeta->hacerViaje($this->tarifa);
    }
}


