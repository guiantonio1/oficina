<?php

/**
 * Atividade - Herança com domínio
 * Curso Técnico em Desenvolvimento de Sistemas - IFPR Foz do Iguaçu
 * Disciplina: Orientação a Objetos - Prof. Daniel Di Domenico
 *
 * Domínio: Oficina mecânica com atendimento ao cliente.
 * As classes (modelo) ficam na pasta modelo/, este arquivo executa o programa.
 */

require_once __DIR__ . "/modelo/Veiculo.php";
require_once __DIR__ . "/modelo/Carro.php";
require_once __DIR__ . "/modelo/Moto.php";
require_once __DIR__ . "/modelo/Caminhao.php";

// -----------------------------------------------------------------
// Veículos que já estão na oficina
// -----------------------------------------------------------------
function criarFila(): array {
    return [
        new Carro("ABC-1234", "Fiat Uno", "Troca de óleo"),
        new Moto("XYZ-9876", "Honda CG 160", "Revisão dos freios"),
        new Caminhao("CAM-4321", "Volvo FH", "Problema no motor"),
    ];
}

// -----------------------------------------------------------------
// Funções auxiliares de entrada/saída
// -----------------------------------------------------------------
function lerOpcao(string $mensagem): string {
    echo $mensagem;
    return trim(fgets(STDIN));
}

function listarFila(array $fila): void {
    echo "\n=== Veículos na oficina ===\n";
    if (empty($fila)) {
        echo "Nenhum veículo na fila.\n";
        return;
    }
    foreach ($fila as $i => $veiculo) {
        echo ($i + 1) . " - " . $veiculo->descricao() . "\n";
    }
}

function cadastrarVeiculo(array &$fila): void {
    echo "\nTipo de veículo:\n";
    echo "1 - Carro\n";
    echo "2 - Moto\n";
    echo "3 - Caminhão\n";
    $tipo = lerOpcao("Escolha: ");

    $placa = lerOpcao("Placa: ");
    $modelo = lerOpcao("Modelo: ");
    $problema = lerOpcao("Qual o problema relatado pelo cliente? ");

    switch ($tipo) {
        case "1":
            $fila[] = new Carro($placa, $modelo, $problema);
            break;
        case "2":
            $fila[] = new Moto($placa, $modelo, $problema);
            break;
        case "3":
            $fila[] = new Caminhao($placa, $modelo, $problema);
            break;
        default:
            echo "\nTipo inválido, veículo não cadastrado.\n";
            return;
    }

    echo "\nVeículo cadastrado na oficina!\n";
}

function atenderCliente(array &$fila, float &$caixa): void {
    listarFila($fila);
    if (empty($fila)) {
        return;
    }

    $opcao = (int) lerOpcao("\nQual veículo você vai atender? (número): ");
    $veiculo = $fila[$opcao - 1] ?? null;

    if ($veiculo === null) {
        echo "\nOpção inválida.\n";
        return;
    }

    $valor = $veiculo->calcularOrcamento();
    echo "\nOrçamento para {$veiculo->getModelo()} ({$veiculo->getPlaca()}): R$ "
        . number_format($valor, 2, ',', '.') . "\n";

    $confirma = lerOpcao("Cliente aprovou o serviço? (s/n): ");
    if (strtolower($confirma) === "s") {
        $caixa += $valor;
        unset($fila[$opcao - 1]);
        $fila = array_values($fila);
        echo "\nServiço realizado! Veículo liberado.\n";
    } else {
        echo "\nCliente não aprovou. Veículo permanece na fila.\n";
    }
}

// -----------------------------------------------------------------
// Menu principal
// -----------------------------------------------------------------
function menuPrincipal(): void {
    $fila = criarFila();
    $caixa = 0.0;

    while (true) {
        echo "\n===== OFICINA - MENU =====\n";
        echo "1 - Listar veículos na fila\n";
        echo "2 - Cadastrar veículo\n";
        echo "3 - Atender cliente (fazer orçamento e serviço)\n";
        echo "4 - Ver total em caixa\n";
        echo "5 - Sair\n";
        $opcao = lerOpcao("Escolha uma opção: ");

        switch ($opcao) {
            case "1":
                listarFila($fila);
                break;
            case "2":
                cadastrarVeiculo($fila);
                break;
            case "3":
                atenderCliente($fila, $caixa);
                break;
            case "4":
                echo "\nTotal em caixa: R$ " . number_format($caixa, 2, ',', '.') . "\n";
                break;
            case "5":
                echo "\nOficina fechada. Até logo!\n";
                return;
            default:
                echo "\nOpção inválida.\n";
        }
    }
}

// Início do programa
menuPrincipal();
