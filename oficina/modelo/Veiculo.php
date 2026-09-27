<?php
abstract class Veiculo {
    protected string $placa;
    protected string $modelo;
    protected string $problema;

    public function __construct(string $placa, string $modelo, string $problema) {
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->problema = $problema;
    }

    public function getPlaca(): string {
        return $this->placa;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getProblema(): string {
        return $this->problema;
    }

  
    abstract public function calcularOrcamento(): float;

    
    abstract public function tipoVeiculo(): string;

    public function descricao(): string {
        return "{$this->placa} - {$this->modelo} [{$this->tipoVeiculo()}] - Problema: {$this->problema}";
    }
}
