<x-layout title="Historico de conversões: ">  
    <table class="table">
        <thead class="thead-dark">
          <tr>            
            <th scope="col">#</th>
            <th scope="col">Valor</th>
            <th scope="col">Moeda</th>
            <th scope="col">Taxa Pagamento</th>
            <th scope="col">Taxa Conversao</th>
            <th scope="col">Valor convertido</th>
            <th scope="col">Data Modificacao</th>

          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($dados as $dados)
          <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $dados->valorInput }}</td>
            <td>{{ $dados->moedaDestino }}</td>
            <td>{{ $dados->valorTaxaPagamento }}</td>
            <td>{{ $dados->valorTaxaConversao }}</td>
            <td>{{ $dados->valorConvertido }}</td>
            <td>{{ $dados->created_at }}</td>
            <?php $i=1+$i; ?>
          </tr>
          @endforeach
        </tbody>
      </table>
    </x-layout>
            
    