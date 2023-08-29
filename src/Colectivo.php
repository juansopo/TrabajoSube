<?php

namespace TrabajoSube;
class Colectivo{

    public $tarifa;
    private $tarjeta;
    private $boleto;

    function __construct(Tarjeta $tarjeta,Boleto $boleto){
        $this->tarjeta = $tarjeta;
        $this->tarifa = $boleto->tarifa;
    }

    function pagarCon($tarjeta){
        $tarjeta->saldo -= $tarifa;
        $tarjeta->viajes += 1;
    }
}


