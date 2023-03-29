<x-layout title="Dados da Conversão: "> 
     <table class="table">
        <thead class="thead-dark">
          <tr>            
            <th scope="col">#</th>
            <th scope="col">Valor (BRL)</th>
            <th scope="col">Moeda Destino</th>
            <th scope="col">Taxa Pagamento (BRL)</th>
            <th scope="col">Taxa Conversao (BRL)</th>
            <th scope="col">Valor convertido ({{$dados->moedaDestino  }})</th>
            <th scope="col">Data Criação</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>{{ $dados->valorInput }}</td>
            <td>{{ $dados->moedaDestino }}</td>
            <td>{{ $dados->valorTaxaPagamento }}</td>
            <td>{{ $dados->valorTaxaConversao }}</td>
            <td>{{ $dados->valorConvertido }}</td>
            <td>{{ $dados->created_at }}</td>
          </tr>
        </tbody>
      </table>   
    </x-layout>
            
    