@component('mail::message')
# Converão BRL-{{ $moedaDestino }}

Moeda de origem: BRL <br>
Moeda de destino: {{ $moedaDestino }}<br>
Valor usado para conversão: {{ $valorMoeda }} {{ $moedaDestino}}<br>
Valor para conversão: R$ {{ $valorInput }}<br>
Forma de pagamento: {{ $meioPagamento }}<br>
Valor comprado em {{ $moedaDestino }}: $ {{ $valorConvertido }}<br>
Taxa de pagamento: R$ {{ $valorTaxaPagamento }}<br>
Taxa de conversão: R$ {{ $valorTaxaConversao }}<br>
Valor utilizado para conversão descontando as taxas: R$ {{ $valorBaseLiquido }}<br>

Acesse aqui seu historico de conversões:

@component('mail::button', ['url' => route('dadosHistorico')])
    Ver dados
@endcomponent

@endcomponent
