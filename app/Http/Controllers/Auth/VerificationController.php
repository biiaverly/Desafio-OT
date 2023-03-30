<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function VerificarEmail($token=null)
    {
    	if($token == null) {
    		session()->flash('message', 'Não foi possivel realizar o login.');
            return to_route('login');

    	}

       $user = User::where('remember_token',$token)->first();
       if($user == null )
       {
       	  session()->flash('message', 'Não foi possivel realizar o login.');
       return to_route('login');
       }
       $user->update([
          'email_verified' => 1,
          'email_verified_at' => Carbon::now(),
          'remember_token' => ''
          
         ]);      
       session()->flash('message', 'Sua conta foi verificada. Realize o login.');
       return to_route('login');
    }

    public function show()
    {
      return to_route('login')->with(['mensagemErro' => 'Verifique seu email para autenticação.']);
    }
}
