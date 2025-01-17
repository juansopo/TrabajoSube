<?php 

namespace TrabajoSube;
require_once 'src/Colectivo.php';
require_once 'src/Tarjeta.php';
require_once 'src/Boleto.php';
use PHPUnit\Framework\TestCase;


class ColectivoTest extends TestCase{
    public function testPagarConSaldo(){
        //Instancia de colectivo
        $colectivoTest = new Colectivo;
        //Creamos una instancia de tarjeta para hacer pruebas
        $tarjetaTest = new Tarjeta;
        $tarjetaTest->cargarTarjeta(200);

        //traemos el valor del boleto a partir del colectivo
        $boleto = $colectivoTest->tarifa;

        //Pagamos el bondi
        $colectivoTest->pagarCon($tarjetaTest);

        //Verificar que:
        //- se este cargando correctamente la tarifa
        $this->assertEquals($boleto, 120);
        //- el saldo se reduzca correctamente
        $this->assertEquals(80, $tarjetaTest->consultarSaldo());
    }
    public function testPagarSinSaldo(){
        //Instancia de colectivo
        $colectivoTest = new Colectivo;
        //Creamos una instancia de tarjeta para hacer pruebas
        $tarjetaTest = new Tarjeta;
        $tarjetaTest->cargarTarjeta(100);

        //Verifica que no se haya cargado debido a que no se puede cargar 100 pesos
        $this->assertEquals(0, $tarjetaTest->consultarSaldo());

        //Damos una carga valida
        $tarjetaTest->cargarTarjeta(150);

        //Pagamos el bondi
        $colectivoTest->pagarCon($tarjetaTest);

        //Consultamos que el saldo restante sea 30
        $this->assertEquals(30, $tarjetaTest->consultarSaldo());

        //Intentamos pagar nuevamente y verificamos que el saldo es el mismo
        $colectivoTest->pagarCon($tarjetaTest);
        $this->assertEquals(30, $tarjetaTest->consultarSaldo());

    }
    public function testCargarDeMas(){
        //Instancia de colectivo
        $colectivoTest = new Colectivo;
        //Creamos una instancia de tarjeta para hacer pruebas
        $tarjetaTest = new Tarjeta;
        $tarjetaTest->cargarTarjeta(600);
        $tarjetaTest->cargarTarjeta(2000);
        $tarjetaTest->cargarTarjeta(4000);

        //Verificamos que se haya cargado correctamente:
        $this->assertEquals(6600, $tarjetaTest->consultarSaldo());

        //Intentamos cargar en el excedente y verificamos que siga igual
        $tarjetaTest->cargarTarjeta(600);
        $this->assertEquals(6600, $tarjetaTest->consultarSaldo());
        
    }
}