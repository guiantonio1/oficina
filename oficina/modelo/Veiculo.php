<?php

/**
 * Superclasse Veiculo
 * Atividade - Herança com domínio (Orientação a Objetos - IFPR)
 */
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

    // Cada subclasse calcula o valor do serviço à sua maneira
    abstract public function calcularOrcamento(): float;

    // Cada subclasse descreve seu tipo de veículo
    abstract public function tipoVeiculo(): string;

    public function descricao(): string {
        return "{$this->placa} - {$this->modelo} [{$this->tipoVeiculo()}] - Problema: {$this->problema}";
    }
}
