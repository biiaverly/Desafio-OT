<?php
namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class dadosDTO extends DataTransferObject

{
    public  string $bid;
    public  string  $codein;
    public  string  $name;
    public  string  $high;
    public  string  $low;
    public  string  $varBid;
    public  string  $pctChange;
    public  string  $ask;
    public  string  $timestamp;
    public  string  $create_date;

    public function __construct($dados)
    {
        #proteção para botar null;
        $this->bid = $dados['bid']??null;
        $this->codein = $dados['codein']??null;
        $this->name = $dados['name']??null;
        $this->high = $dados['high']??null;
        $this->low = $dados['low']??null;
        $this->varBid = $dados['varBid']??null;
        $this->pctChange = $dados['pctChange']??null;
        $this->ask = $dados['ask']??null;
        $this->timestamp = $dados['timestamp']??null;
        $this->create_date = $dados['create_date']??null;
    }

}

