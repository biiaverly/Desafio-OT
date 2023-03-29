<?php

namespace App\Http\Controllers;

use App\Http\Requests\dadosRequest;
use App\Interface\BancoRepositorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversaoController extends Controller
{
    public function index()
    {
        return view('conversao');
    }
    public function store(dadosRequest $request,BancoRepositorio $repositorio)
    {
        $valorInput = $request->get('valorInput');
        $metodoPagamento = $request->get('meioPagamento');
        $moeda = $request->get('moedaDestino');
        $dadosInseridos = $repositorio->adicionarBanco($request);
        $usuario = Auth::user();
        return to_route('conversao.home');

    }
}
