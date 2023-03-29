<?php

namespace App\Entity;

use Spatie\DataTransferObject\DataTransferObject;
class conversaoEntity extends DataTransferObject
{
    public $valorTaxaPagamento;
    public $valorTaxaConversao;
    public $valorBaseLiquido;
    public $valorMoeda;
    public $valorConvertido;
    public $usuario;
    public $moedaDestino;
    public $meioPagamento;
    public $valorInput;



    public function __construct($input)
    {
        $this->valorTaxaPagamento = $input['valorTaxaPagamento'];
        $this->valorTaxaConversao= $input['valorTaxaConversao'];
        $this->valorBaseLiquido = $input['valorBaseLiquido'];
        $this->valorMoeda = $input['valorMoeda'];
        $this->valorConvertido = $input['valorConvertido'];
        $this->usuario = $input['usuario'];
        $this->moedaDestino = $input['moedaDestino'];
        $this->meioPagamento = $input['meioPagamento'];
        $this->valorInput = $input['valorInput'];   
    }
}
