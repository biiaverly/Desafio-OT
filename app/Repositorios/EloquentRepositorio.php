<?php

namespace App\Repositorios;

use App\Http\Requests\dadosRequest;
use App\Interface\BancoRepositorio;
use App\Models\DadosConversoes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class EloquentRepositorio implements BancoRepositorio
{
    public function adicionarBanco(dadosRequest $request,$entidade):dadosConversoes
    {
        $array=
        [
            'moedaDestino' => $request -> get('moedaDestino'),
            'meioPagamento' => $request -> meioPagamento,
            'valorInput' => $request -> valorInput,
            'usuario' => $entidade -> usuario,
            'valorTaxaPagamento' => $entidade -> valorTaxaPagamento,
            'valorTaxaConversao' => $entidade -> valorTaxaConversao,
            'valorBaseLiquido' => $entidade -> valorBaseLiquido,
            'valorMoeda' => $entidade -> valorMoeda,
            'valorConvertido' => $entidade -> valorConvertido,
        ];
        $dados = DadosConversoes::create($array);           
        return ($dados);

    }

    public function filtrarDadosUsuario():Collection
    {
        $nomeUsuario = Auth::user()->name;
        $dadosUsuario = DadosConversoes::where('usuario',$nomeUsuario)->orderBy('id','DESC')->get();
        return $dadosUsuario;

    }

}