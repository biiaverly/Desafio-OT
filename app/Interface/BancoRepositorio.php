<?php

namespace App\Interface;

use App\Http\Requests\dadosRequest;
use App\Models\DadosConversoes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

interface BancoRepositorio
{
    public function adicionarBanco(dadosRequest $request): DadosConversoes;
    public function filtrarDadosUsuario(): Collection;
}