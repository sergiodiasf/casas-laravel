@extends('adminlte::page')

@section('title', 'Lista de Propostas')

@section('content')

    <div class='col-sm-11'>
        <h2> Propostas de Compra </h2>
    </div>
    @if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Sucesso:</strong> {{ Session::get('success') }}
	</div>
    @elseif (Session::has('error'))
	<div class="alert alert-danger" role="alert">
		<strong>Erro:</strong> {{ Session::get('error') }}
	</div>
    @endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Erros:</strong> 
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div
@endif
    <div class='col-sm-12'>
    
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nome do Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Casa</th>
                <th>Proposta</th>
                <th>Data</th>

            </tr>
            @forelse($propostas as $proposta)
                <tr>
                    <td style="text-align: center">{{$proposta->id}}</td>
                    <td>{{$proposta->nome_cliente}}</td>
                    <td>{{$proposta->email}}</td>
                    <td>{{$proposta->telefone}}</td>
                    <td>{{$proposta->casa->modelo}}</td>
                    <td>R$: {{number_format($proposta->proposta, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>
                    <td> {{date_format($proposta->created_at, 'd/m/Y')}} </td>
                </tr>
            @empty

                <h4>Não existem proposta cadastradas ainda.</h4>

            @endforelse
        </table>
        {{ $propostas->links() }}
    </div>

@endsection