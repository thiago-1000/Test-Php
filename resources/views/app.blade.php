<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<!--[if lt IE 7]> <html lang="en-us" class="ie6"> <![endif]-->
		<!--[if IE 7]>    <html lang="en-us" class="ie7"> <![endif]-->
		<!--[if IE 8]>    <html lang="en-us" class="ie8"> <![endif]-->

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />

		<title>Teste Php</title>

		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/jquery-confirm.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/theme-teste.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker3.min.css') }}">
		@yield('css')

		<!--[if lt IE 9]><script src="{{ asset('/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
		<script src="{{ asset('/js/jquery-1.12.2.min.js') }}"></script>
		<script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>
		<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap-datepicker.pt-BR.min.js') }}"></script>
                 
			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!--[if lt IE 9]>
                        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                        <![endif]-->
	</head>

	<body  style="background-color: #f6f6f6; font-family: Arial, sans-serif">

		@if (!Auth::guest())
			@include('parts.navbar')
		@endif
		
                <div class="container bkw" style="padding-top: 55px;-webkit-box-shadow: -3px 0px 10px 3px rgba(0,0,0,0.10);-moz-box-shadow: -3px 0px 10px 3px rgba(0,0,0,0.10);box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.10);min-height: 400px;">
                    @yield('content')
                </div>

		@include('parts.footer')
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap-filestyle.min.js') }}"></script>
                <script src="{{ asset('/js/jquery.jfeed.js') }}"></script>
                <script src="{{ asset('/js/jquery.jfeed.pack.js') }}"></script>
		@yield('js')

	</body>
</html>
