<?php 

namespace TrabajoSube;
require_once 'src/Colectivo.php';
require_once 'src/Tarjeta.php';
require_once 'src/Boleto.php';
use PHPUnit\Framework\TestCase;


class ColectivoTest extends TestCase{
    public function testPagarCon(){
        $colectivoTest = new Colectivo;
        $tarjetaTest = new Tarjeta;

        $boleto = $colectivoTest->tarifa;

        //verificar que se este cargando correctamente la tarifa
        $this->assertEquals($boleto, 120);

        //
    }
   
}