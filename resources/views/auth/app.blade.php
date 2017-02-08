<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teste Php</title>

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <style>
            body {
                margin: 0px;
                padding-top: 50px;
                background: #e7e7e7; /* Para browsers que não suportam gradients */
                background: -webkit-linear-gradient(to bottom, #e7e7e7, #fff); /* Para Safari 5.1 ao 6.0 */
                background: -o-linear-gradient(to bottom, #e7e7e7, #fff); /* Para Opera 11.1 ao 12.0 */
                background: -moz-linear-gradient(to bottom, #e7e7e7, #fff); /* Para Firefox 3.6 ao 15 */
                background: linear-gradient(to bottom, #e7e7e7, #fff); /* Syntax Padrão */
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                border-top: 5px solid #1C335D;
                background-color: #fff;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .rodape {
                margin: 10px 0;
                padding: 5px 0;
            }
            .rodape>.text-center{
                border-top: 1px solid #e7e7e7;
                border-bottom: 1px solid #e7e7e7;
            }
        </style>

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{ asset('/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('/js/respond.min.js') }}"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! HTML::image(asset('/images/logo.png'), 'Teste Php', ['class' => 'center-block']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            <div class="row rodape">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <div class="form-group">
                        <p>
                            <strong>Nome:</strong> Thiago Krizaj Pazzini<br />
                            <strong>Email:</strong> thiago.faet@hotmail.com
                        </p>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <p>Teste Php - Copyright &copy; - {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        @yield('js')
    </body>
</html>
