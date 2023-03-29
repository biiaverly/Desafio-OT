<x-layout title="Login">
    @if(session()->has('mensagemSucesso'))
    <div class="alert alert-danger">
        {{ session('mensagemSucesso') }}
    </div>
    @endif
    
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary mt-3">
            Entrar
        </button>
        
        <a href="{{ route('salvarUsuario') }}" class="btn btn-secondary mt-3">
            Registrar
        </a>
    </form>
</x-layout>