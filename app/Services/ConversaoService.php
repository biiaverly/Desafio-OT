<?php

namespace App\Services;

use App\DTO\dadosDTO;
use App\Entity\conversaoEntity;
use App\Interface\ConversaoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ConversaoService implements ConversaoInterface
{
    public function realizarConversao($moeda):dadosDTO
    {   
        $var='BRL'.$moeda;
        $url=env('BASE_URL').'/last/BRL-'.$moeda;
        $dados = Http::get($url)->json();
        $dadosDTO = new dadosDTO($dados[$var]);
        return $dadosDTO;

    }
    public function valorMoeda($moeda):float
    {
        $urlvalormoeda =env('BASE_URL').'/'.$moeda.'-BRL/1';
        $valormoeda = Http::get($urlvalormoeda)->json();
        $valormoeda = $valormoeda[0]['bid'];
        return $valormoeda;
    }
    public function calculoTaxaPagamento($valorInput,$metodoPagamento):float
    {
        if($metodoPagamento=='boleto')
        {
            $taxaPagamento = 0.0145;
            $valorTaxaPagamento = $valorInput*$taxaPagamento;
            return $valorTaxaPagamento;
        }
        else
        {
            $taxaPagamento = 0.0763;
            $valorTaxaPagamento = $valorInput*$taxaPagamento;
            return $valorTaxaPagamento; 
        }
    }
    public function calculoTaxaConversao($valorInput):float
    {
        if($valorInput < 3000)
        {
            $taxaConversao = 0.02;
            $valorTaxaConversao = $valorInput * $taxaConversao;
        }
        else 
        {
            $taxaConversao = 0.01;
            $valorTaxaConversao = $valorInput * $taxaConversao;
        }
        return $valorTaxaConversao;
    }
    public function calculoGeral($valorInput,$metodoPagamento,$moeda):conversaoEntity
    {
        $nomeUsuario = Auth::user()->name;
        $valorTaxaPagamento = $this->calculoTaxaPagamento($valorInput,$metodoPagamento);
        $valorTaxaConversao = $this->calculoTaxaConversao($valorInput);
        $valorBaseLiquido = $valorInput - $valorTaxaConversao - $valorTaxaPagamento; 
        $valorMoeda = $this->valorMoeda($moeda);
        $valorConvertido = $valorBaseLiquido/$valorMoeda;
        $input=
        [
            'valorTaxaPagamento'=> $valorTaxaPagamento,
            'valorTaxaConversao'=> $valorTaxaConversao,
            'valorBaseLiquido'=> $valorBaseLiquido,
            'valorMoeda'=> $valorMoeda,
            'valorConvertido'=> $valorConvertido,
            'usuario'=> $nomeUsuario,
            'moedaDestino'=> $moeda,
            'meioPagamento'=> $metodoPagamento,
            'valorInput'=> $valorInput,

        ];
        $dadosUsuario = new conversaoEntity($input);
        return $dadosUsuario;

    }

}

