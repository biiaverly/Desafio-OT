<x-layout title="">  
    <div class="row mb-2">  
        <div class="col-2" >
            @if(!Auth::check())
            <a href='{{ route('criarUsuario') }}'><button style="background-color: #ceccccbb;">Criação de novo usuario</button></a>                
            @endif
        </div>           
            
          @auth           
          <div class="col-2">
              <a href='{{ route('conversao.home') }}'><button style="background-color: #ceccccbb;">Conversão de moeda</button></a>                
            </div>
        @endauth
    </div> 
</x-layout>
            
    