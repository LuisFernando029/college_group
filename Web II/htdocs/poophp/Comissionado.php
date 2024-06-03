<?php

include "Funcionario.php";

class Comissionado extends Funcionario {
    private $vendas;

    public function __construct($codigo, $nome, $valorHora, $horasTrabalhadas, $vendas) {
        parent::__construct($codigo, $nome, $valorHora, $horasTrabalhadas);
        $this->vendas = $vendas;
    }

    public function setVendas($vendas){
		$this->vendas = $vendas;
	} 
    
    public function getVendas() {
        return $this->vendas;
    }

    public function calcularSalario() {
       return parent::calcularSalario() + ($this->vendas * 0.15);

  
    }
}

?>
