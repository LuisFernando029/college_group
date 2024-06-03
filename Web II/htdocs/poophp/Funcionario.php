<?php
class Funcionario{
    protected $codigo;
    protected $nome;
    protected $valorHora;
    protected $horasTrabalhadas;

    public function __construct($codigo, $nome, $valorHora, $horasTrabalhadas) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->valorHora = $valorHora;
        $this->horasTrabalhadas = $horasTrabalhadas;
    }
    public function setCodigo($codigo){
		$this->codigo = $codigo;
	} 
	public function getCodigo(){
		return $this->codigo;
	}

    public function setNome($nome){
		$this->nome = $nome;
	} 
	public function getNome(){
		return $this->nome;
	}

    public function setValorHora($valorHora){
		$this->valorHora = $valorHora;
	}  
	public function getValorHora(){
		return $this->valorHora;
	}

    public function setHorasTrabalhadas($horasTrabalhadas){
		$this->horasTrabalhadas = $horasTrabalhadas;
	}  
	public function getHorasTrabalhadas(){
		return $this->horasTrabalhadas;
	}
    
	public function calcularSalario(){
		return $this->valorHora * $this->horasTrabalhadas;
	} 
}

?>
