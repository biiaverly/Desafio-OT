<x-layout title="Conversão de valor: ">  
    <form action="{{ route('conversao.store')}}" method="post" enctype="multipart/form-data">
        @csrf        
        <div class="row mb-2">                
            <div class="col-2">
                <label for="valorInput" class="form-label">Valor a converter:</label>
                <input type="text" 
                id="valorInput" 
                name="valorInput" 
                class="form-control">
            </div>                    
            <div class="col-3">
                <label for="meioPagamento">Meio de pagamento:</label>
                <select name="meioPagamento" id="meioPagamento">
                    <option value="boleto">Boleto</option>
                    <option value="credito">Cartao de Credito</option>
                </select>                        
            </div>                
            <div class="col-3">
                <label for="moedaDestino">Conversão para:</label>
                <select name="moedaDestino" id="moedaDestino">
                    <option value="USD">USD</option>
                    <option value="THB">THB</option>
                </select>  
            </div>   
        </div>    
    <button  type="submit" class="btn btn-primary">Converter</button>
    </form> 
    
    </x-layout>
            
    