<?php

namespace App\Http\Controllers;

use App\Http\Requests\dadosRequest;
use App\Interface\BancoRepositorio;
use App\Interface\ConversaoInterface;
use App\Models\DadosConversoes;
use Illuminate\Support\Facades\Auth;

class ConversaoController extends Controller
{
    public function index()
    {
        return view('conversao');
    }
    public function store(dadosRequest $request,BancoRepositorio $repositorio,ConversaoInterface $interface)
    {
        $valorInput = $request->get('valorInput');
        $metodoPagamento = $request->get('meioPagamento');
        $moeda = $request->get('moedaDestino');
        $dadosUsuario = $interface->calculoGeral($valorInput,$metodoPagamento,$moeda);
        // dd($dadosUsuario);
        $dadosInseridos = $repositorio->adicionarBanco($request,$dadosUsuario);        
        $usuario = Auth::user();
        return to_route('posconversao.home',$dadosInseridos->id);
    }
    public function visualizarDados(DadosConversoes $banco)
    {
        $dadosInseridos = $banco->orderBy('id','desc')->first();
        return view('dados')->with('dados',$dadosInseridos);
    }
}
