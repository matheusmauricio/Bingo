<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
