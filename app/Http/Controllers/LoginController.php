<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get('mensagemSucesso');
        return view('login.index')->with('mensagemSucesso',$mensagemSucesso);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) 
        {
            return redirect()->back()->with('mensagemSucesso','Verificar usuario e senha.'); 
        }
        $request->session()->flash('mensagemSucesso',"Login realizado.");  
        return to_route('conversao.home');  
    }    

    public function create(Request $request)
    {
        return view('login.criarUsuario');
    }

    public function store(Request $request, User $usuarioTabela)
    {
        $request->validate(
            [   
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'name.required' => 'Informe um nome valido.',
                'email.required' => 'Informe um email valido.',
                'password.required' => 'É necessário informar um password.'   
            ]);
            
        $dados = $request->except(['_token']);
        $verificarUsuario = $usuarioTabela->where('email',$request->email)->get();
        if($verificarUsuario[0]['name']<>null)
        {
            return to_route('criarUsuario')->with(['mensagemSucesso' => 'Usuario já cadastrado no sistema.']);
        }
        $dados['password'] = Hash::make($dados['password']);
        $usuario = User::create($dados);
        Auth::login($usuario);
        return to_route('conversao.home')->with(['mensagemSucesso' => 'Usuario cadastrado.']);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
