<?php
namespace TrabajoSube;
class Colectivo{
    function pagarCon($tarjeta){
        $tarjeta->saldo -= 120;
        $tarjeta->viajes += 1;
    }
}


