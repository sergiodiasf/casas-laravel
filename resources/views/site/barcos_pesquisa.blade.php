@extends('site.modelo')

@section('conteudo')

<div class="container">
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif
@if (count($barcos)==0)
                <div class="alert alert-danger">
                    Não há barco Cadastrados com esse nome...
                </div>
            @endif
<div class="row">

@foreach($barcos as $barco)
        <div class="col col-sm-4">
            <div class="card border-light bg-light">
                <div class="card-header text-center" style="font-weight: bold;">{{ $barco->modelo }}</div>
                    <div class="card-body">
                        @if(Storage::exists($barco->foto))
                            <img src="{{url('storage/'.$barco->foto)}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de Barco"/>
                        @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de Barco"/>
                        @endif
                        <p class="text-center">Valor R$: {{number_format($barco->preco, 2, ',', '.')}} </p>
                        <a href="{{route('proposta.show', $barco->id)}}" type="button" class="btn btn-block btn-dark">Comprar</a>
                        <a href="{{route('proposta_alugar.show', $barco->id)}}" type="button" class="btn btn-block btn-secondary">Alugar</a>
                    </div>
                </div>
        </div>

@endforeach
</div>
</div>
@endsection