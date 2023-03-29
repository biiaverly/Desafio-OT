<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosConversoes extends Model
{
    use HasFactory;
    protected $table="DadosConversoes";
    protected $fillable =
     [
        'moedaDestino',
        'meioPagamento',
        'valorInput',
        'usuario',
    ];
}
