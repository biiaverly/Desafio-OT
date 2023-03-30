
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <link rel="stylesheet" href="site.css"/>
    </head>
    <body>
        <header >
            <h1>Verificação do Email</h1>
        </header>
        <section class="menu">
            <ul>
                Bem vindo ao sistema de conversões da OT.
                <br>
                Para continuar clique no link abaixo para autenticar seu email.

            </ul>
        </section>

        <section class="content">
            <a href="{{ route('verificar',$user->remember_token) }}" class="button">
                Verificar email
            </a>
        </section>
        <script src="jquery-3.0.0.min.js"></script>
        <script src="site.js"></script>
    </body>
</html>

