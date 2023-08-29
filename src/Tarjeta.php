<?php
namespace TrabajoSube;

class Tarjeta{
    public $saldo = 360;
    public $viajes = 0;

    public $cargasPosibles = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
    

    public function cargarTarjeta($monto){
        
        if($this->saldo + $monto > 6600){
            echo "no se puede cargar ".$monto." ya que excede los 6600 pesos";
            return ;
        }
        if(in_array($monto, $this->cargasPosibles)){
            $this->saldo += $monto;
            return ;
        }
    }


    public function consultarSaldo(){
        return $this->saldo;
    }

    public function hacerViaje($costo){
        $this->saldo -= $costo;
        $this->viajes += 1;
    }
}

?>