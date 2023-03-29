<?php

namespace App\Jobs;

use App\Entity\conversaoEntity;
use App\Mail\Email;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnviarEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private conversaoEntity $dadosUsuario;
    private string $moeda;
    private string $metodoPagamento;
    private float $valorInput;
    private User $usuario;

    public function __construct
    (
        $dadosUsuario,
        $moeda,
        $metodoPagamento,
        $valorInput,
        $usuario,

    )
    {
        $this->dadosUsuario = $dadosUsuario;
        $this->moeda = $moeda; 
        $this->metodoPagamento = $metodoPagamento;
        $this->valorInput = $valorInput;  
        $this->usuario = $usuario;
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dados = new Email
        (
            $this->moeda,
            $this->metodoPagamento,
            $this->valorInput,
            $this->usuario,
            $this->dadosUsuario->valorTaxaPagamento,
            $this->dadosUsuario->valorTaxaConversao,
            $this->dadosUsuario->valorBaseLiquido,
            $this->dadosUsuario->valorMoeda,
            $this->dadosUsuario->valorConvertido
        );
        Mail::to($this->usuario)->send($dados);
    }
}
