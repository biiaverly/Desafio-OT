<?php

namespace App\Http\Controllers;

use App\Http\Requests\dadosRequest;
use App\Interface\BancoRepositorio;
use App\Interface\ConversaoInterface;
use App\Jobs\EnviarEmail;
use App\Mail\Email;
use App\Models\DadosConversoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $email = new EnviarEmail($dadosUsuario,$moeda,$metodoPagamento,$valorInput,$usuario);
        dispatch($email);

        return to_route('posconversao.home',$dadosInseridos->id);
    }
    public function visualizarDados(DadosConversoes $banco)
    {
        $dadosInseridos = $banco->orderBy('id','desc')->first();
        return view('dados')->with('dados',$dadosInseridos);
    }
    public function historicoDados(BancoRepositorio $repositorio)
    {
        $dadosHistorico = $repositorio->filtrarDadosUsuario();
        return view('dadosHistorico',[Auth::user()->id])->with('dados',$dadosHistorico);
    } 
}
