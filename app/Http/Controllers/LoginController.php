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
                'password' => 'required'
            ],
            [
                'name.required' => 'Informe um nome valido.',
                'email.required' => 'Informe um email valido.',
                'password.required' => 'É necessário informar um password.',
                'email.unique' => 'Email ja cadastrado no sistema.',
                'name.unique' => 'Nome ja cadastrado no sistema.' 
 
            ]);            
        $dados = $request->except(['_token']);
        $dados['password'] = Hash::make($dados['password']);
        $usuario = User::create($dados);
        Auth::login($usuario);
        return to_route('home')->with(['mensagemSucesso' => 'Usuario cadastrado.']);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
