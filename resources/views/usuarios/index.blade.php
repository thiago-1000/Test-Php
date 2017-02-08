@extends('app')

@section('content')

    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <span class="destaque">&raquo; Produtos</span>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-5">
            <div class="input-group">
                {!! Form::text('buscar', old('buscar'), ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-info" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 40%">Nome</th>
                        <th style="width: 20%">Allied ID</th>
                        <th style="width: 10%">CPF</th>
                        <th style="width: 10%">Ativo</th>
                        <th style="width: 10%">Ações</th>
                    </tr>
                    </thead>

                    @if (count($usuarios))
                        <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->username }}</td>
                                <td>{{ maskCPF($usuario->cpf) }}</td>
                                <td style="width: 5%; padding-left: 44px;"><input data-toggle="toggle" type="checkbox" data-token="{{ csrf_token() }}" data-route="/usuarios/{{ $usuario->id }}" {{ ($usuario->ativo) ? 'checked' : '' }} /></td>
                                <td style="width: 9%;">
                                    <a href="/usuarios/{{ $usuario->id }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Visualizar os Detalhes!">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                    <a href="/usuarios/{{ $usuario->id }}/edit" class="btn btn-xs btn-default" data-toggle="tooltip" title="Editar os Dados!">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="/usuarios/{{ $usuario->id }}" class="btn btn-xs btn-default btnDelete" data-toggle="tooltip" title="Excluir o Registro!" data-token="{{ csrf_token()  }}">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                    <a href="/edit_senha_usuario/{{ $usuario->id }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Alterar Senha!" data-token="{{ csrf_token()  }}" style="margin-top: 3px;">
                                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        Senha!
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-center">
                                {!! $usuarios->appends(getPartsPaginate())->render() !!}
                            </td>
                        </tr>
                        </tfoot>
                    @else
                        <tbody>
                        <tr>
                            <td colspan="5">Nenhum usuário encontrado.</td>
                        </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection