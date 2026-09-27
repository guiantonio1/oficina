<?php

require_once __DIR__ . "/Veiculo.php";

/**
 * Subclasse Carro - herda de Veiculo
 */
class Carro extends Veiculo {
    private float $taxaBaseServico = 80.00;

    public function calcularOrcamento(): float {
        return $this->taxaBaseServico + 50.00; // mão de obra padrão de carro
    }

    public function tipoVeiculo(): string {
        return "Carro";
    }
}
