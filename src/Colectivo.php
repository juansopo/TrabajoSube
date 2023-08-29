<?php

namespace TrabajoSube;
class Colectivo{

    public $tarifa;

    function __construct(){
        $boleto = new Boleto;
        $this->tarifa = $boleto->tarifa;
    }

    function pagarCon(Tarjeta $tarjeta){
        if($tarjeta->consultarSaldo()>= $this->tarifa){
            $tarjeta->hacerViaje($this->tarifa);
        }else{
            echo "No tiene saldo suficiente";
            return;
        }
    }
}


