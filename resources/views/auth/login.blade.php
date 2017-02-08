@extends('auth.app')

@section('content')
    {!! Form::open(['url' => '/auth/login', 'class' => 'form-signin', 'style' => 'min-height:380px; float:left; margin-left:230px;']) !!}
        @if (count($errors) > 0 && !$errors->has('cadastro'))
            <div class="alert alert-danger">
                <strong>Opa!</strong> Corrija os erros do formulário.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Digite seu E-mail e Senha para acessar.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                </div>
            </div>
        </div>

        @if (env('CAPTCHA'))
            <div class="row">
                <div class="col-md-12" style="padding-top: 10px;">
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lecvh0TAAAAADqp8afhDVZMH7fSsfDLUVIsJgKR"></div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-3" style="margin-left: 25px;">
                <div class="form-group">
                    {!! Form::submit('Entrar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
    {!! Form::open(['url' => 'cadastro', 'class' => 'form-signin', 'style' => 'min-height:380px; float:right; margin-right:230px;']) !!}
        @if (count($errors) > 0 && $errors->has('cadastro'))
            <div class="alert alert-danger">
                <strong>Opa!</strong> Corrija os erros do formulário.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <?php 
                            if($error=="erro_cadastro"){
                                continue;
                            }
                        ?>
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <p>Preencha as informações para se cadastrar.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']) !!}
                </div>
            </div>
        </div>    
        
        <div class="row">
            <div class="col-md-4" style="margin-left: 18px;">
                <div class="form-group">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
@endsection

@if (env('CAPTCHA'))
    @section('js')
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endsection
@endif