<?php

require_once __DIR__ . "/Veiculo.php";


class Caminhao extends Veiculo {
    private float $taxaBaseServico = 150.00;

    public function calcularOrcamento(): float {
        return $this->taxaBaseServico + 120.00; // mão de obra padrão de caminhão
    }

    public function tipoVeiculo(): string {
        return "Caminhão";
    }
}
