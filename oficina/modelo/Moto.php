<?php

require_once __DIR__ . "/Veiculo.php";

/**
 * Subclasse Moto - herda de Veiculo
 */
class Moto extends Veiculo {
    private float $taxaBaseServico = 40.00;

    public function calcularOrcamento(): float {
        return $this->taxaBaseServico + 25.00; // mão de obra padrão de moto
    }

    public function tipoVeiculo(): string {
        return "Moto";
    }
}
