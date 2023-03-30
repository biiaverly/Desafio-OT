<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificacaoEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get('mensagemSucesso');
        return view('login.index')->with('mensagemSucesso',$mensagemSucesso);
    }
    public function login(Request $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) 
        {
            return redirect()->back()->with('mensagemSucesso','Login realizado.'); 
        }
        $request->session()->flash('mensagemSucesso',"Verificar login e senha.");  
        return to_route('home');  
    }    
    public function create(Request $request)
    {
        return view('login.criarUsuario');
    }
    public function store(Request $request, User $usuarioTabela)
    {
        $request->validate(
            [   
                'name' => ['required','string','min:3','unique:users'],
                'email' => ['required','email','unique:users'],
                'password' => ['required','confirmed']
            ],
            [
                'name.required' => 'Informe um nome valido.',
                'email.required' => 'Informe um email valido.',
                'password.required' => 'As senhas não coincidem.',
                'email.unique' => 'Email ja cadastrado no sistema.',
                'name.unique' => 'Nome ja cadastrado no sistema.'
            ]);            
        $dados = $request->except(['_token']);
        $token = ['remember_token'=>Str::random(15)];
        $dados=array_merge($dados,$token);

        $dados['password'] = Hash::make($dados['password']);
        $usuario = User::create($dados);
        Mail::to($usuario->email)->send(new VerificacaoEmail($usuario));
        Auth::login($usuario);
        return redirect()->back()->with(['mensagemSucesso' => 'Verifique seu email para autenticação.']);
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
