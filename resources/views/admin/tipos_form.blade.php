@extends('adminlte::page')

@section('title', 'Cadastro de Tipos')

@section('content')

    <div class='col-sm-11'>
        @if ($acao == 1)
            <h2> Inclusão de Tipos </h2>
        @else
            <h2> Alteração de Tipos </h2>
        @endif
    </div>
    <div class='col-sm-1'>
        <a href="{{route('tipos.index')}}" class="btn btn-primary"
           role="button">Voltar</a>
    </div>

    <div class='col-sm-12'>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($acao == 1)
            <form method="post" action="{{route('tipos.store')}}">
                @else
                    <form method="post" action="{{route('tipos.update', $reg->id)}}">
                        {!! method_field('put') !!}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome">Nome do Tipo:</label>
                            <input type="text" class="form-control" id="nome"
                                   name="nome"
                                   value="{{$reg->nome or old('nome')}}"
                                   required>
                        </div>


                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </form>
    </div>


@endsection