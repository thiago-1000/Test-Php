<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content=10;url="{{ url() }}">

        <title>Teste Php</title>

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/theme-teste.css') }}">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <div class="jumbotron text-center">
                <h1>Erro, permissão!</h1>
                <p>Você não tem permissão para acessar essa área do sistema, clique no link ou espere 10 segundos para ser redirecionado.</p>
                <p>{!! HTML::link('/', 'Home', ['class' => 'btn btn-primary btn-lg']) !!}</p>
            </div>
        </div>

    </body>
</html>