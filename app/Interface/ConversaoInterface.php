<?php

declare(strict_types=1);

namespace App\Interface;

use App\DTO\dadosDTO;
use App\Entity\conversaoEntity;

interface ConversaoInterface
{
    public function realizarConversao($moeda):dadosDTO;
    public function calculoTaxaPagamento($valorInput,$metodoPagamento):float;
    public function calculoTaxaConversao($valorInput):float;
    public function valorMoeda($moeda):float;
    public function calculoGeral($valorInput,$metodoPagamento,$moeda):conversaoEntity;
}
