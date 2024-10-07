<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GeradorBingoController extends Controller
{
    public function gerar(Request $request){

        $quantidadeLinhas   = $request->quantidadeLinhas;
        $quantidadeColunas  = $request->quantidadeColunas;
        $numeroInferior     = $request->numeroInferior;
        $numeroSuperior     = $request->numeroSuperior;
        $quantidadeCartelas = $request->quantidadeCartelas;

        $totalNumeros = $quantidadeLinhas * $quantidadeColunas;

        $cartela[][][] = array();

        for($a = 0; $a < $quantidadeCartelas; $a++){
            // Resetando o tempo máximo de execução a cada inserção, para não dar timeout
            ini_set('max_execution_time', 300);

            $array[] = array();

            for($i = 0; $i < $totalNumeros; $i++){
                $numero = rand($numeroInferior, $numeroSuperior);

                while(in_array($numero, $array[$a])){
                    $numero = rand($numeroInferior, $numeroSuperior);
                }

                array_push($array[$a], $numero);
            }

            for($i = 0; $i < $quantidadeLinhas; $i++){
                for($j = 0; $j < $quantidadeColunas; $j++){
                    $cartela[$a][$i][$j] = array_shift($array[$a]);
                }
            }
        }

        return \PDF::loadView('bingoPdf', compact('array', 'cartela', 'quantidadeLinhas', 'quantidadeColunas', 'numeroInferior', 'numeroSuperior', 'quantidadeCartelas'))->stream('cartelas-bingo.pdf');
        // return view('bingoPdf', compact('array', 'cartela', 'quantidadeLinhas', 'quantidadeColunas', 'numeroInferior', 'numeroSuperior', 'quantidadeCartelas'));
    }

    // Função para gerar as cartelas e o PDF
    public function gerarNovo(Request $request){
        // Validar os dados do formulário
        $request->validate([
            'numeroInferior'        => 'required|integer|min:1',
            'numeroSuperior'        => 'required|integer|min:1',
            'quantidadeLinhas'      => 'required|integer|min:1|max:9',
            'quantidadeColunas'     => 'required|integer|min:1|max:9',
            'quantidadeCartelas'    => 'required|integer|min:1',
        ], [], [
            'numeroInferior'        => 'Menor número',
            'numeroSuperior'        => 'Maior número',
            'quantidadeLinhas'      => 'Quantidade de linhas',
            'quantidadeColunas'     => 'Quantidade de colunas',
            'quantidadeCartelas'    => 'Quantidade de cartelas',
        ]);

        // Obter os dados do formulário
        $numeroInicial      = $request->input('numeroInferior');
        $numeroFinal        = $request->input('numeroSuperior');
        $linhas             = $request->input('quantidadeLinhas');
        $colunas            = $request->input('quantidadeColunas');
        $quantidadeCartelas = $request->input('quantidadeCartelas');

        if($numeroInicial >= $numeroFinal){
            return back()->withErrors(['numeroInferior' => 'Número inicial não pode ser maior ou igual que o número final'])->withInput();
        }

        // Gerar as cartelas de bingo
        $cartelas = $this->gerarCartelasBingo($numeroInicial, $numeroFinal, $linhas, $colunas, $quantidadeCartelas);

        // Gerar o PDF usando o DOMPDF
        return \PDF::loadView('cartelas_bingo', compact('cartelas', 'linhas', 'colunas'))->stream('cartelas-bingo.pdf');
    }

    // Função para gerar as cartelas de bingo
    private function gerarCartelasBingo($numeroInicial, $numeroFinal, $linhas, $colunas, $quantidadeCartelas)
    {
        $totalNumeros       = $numeroFinal - $numeroInicial + 1;
        $totalPorCartela    = $linhas * $colunas;

        // Verifica se o número total de números disponíveis é suficiente para a quantidade desejada de cartelas
        // if ($quantidadeCartelas * $totalPorCartela > $totalNumeros) {
        //     abort(400, "Não é possível gerar essa quantidade de cartelas sem repetir combinações.");
        // }

        $numerosDisponiveis     = range($numeroInicial, $numeroFinal);
        $cartelas               = [];
        $combinacoesExistentes  = [];

        for ($i = 0; $i < $quantidadeCartelas; $i++) {
            $novaCartela = [];

            while (count($novaCartela) < $totalPorCartela) {
                // Sorteia números aleatórios
                $numerosSorteados = array_rand(array_flip($numerosDisponiveis), $totalPorCartela);
                sort($numerosSorteados);

                // Se essa combinação já existir, sorteia novamente
                if (!in_array($numerosSorteados, $combinacoesExistentes)) {
                    $novaCartela                = $numerosSorteados;
                    $combinacoesExistentes[]    = $numerosSorteados;
                }
            }

            // Deixa a cartela de forma aleatória. Se remover essa linha, a cartela vai ficar ordenada de forma crescente
            shuffle($novaCartela);

            // Adiciona a nova cartela e divide os números em linhas e colunas
            $cartelas[] = array_chunk($novaCartela, $colunas);
        }


        return $cartelas;
    }
}
