@extends('site.modelo')

@section('conteudo')

<div class="container">
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif
<div class="row">

@forelse($casas as $casa)
        <div class="col col-sm-4">
            <div class="card">
                <div class="card-header">{{ $casa->modelo }}</div>
                    <div class="card-body">
                        @if(Storage::exists($casa->foto))
                            <img src="{{url('storage/'.$casa->foto)}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de casa"/>
                        @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de casa"/>
                        @endif
                        <p class="text-center">Valor R$: {{number_format($casa->preco, 2, ',', '.')}} </p>
                        <a href="{{route('proposta.show', $casa->id)}}" type="button" class="btn btn-block btn-primary">Comprar</a>
                        <a href="{{route('proposta_alugar.show', $casa->id)}}" type="button" class="btn btn-block btn-primary">Alugar</a>
                    </div>
                </div>
        </div>

@empty
        <h4>Não Existe casas sendo Exibidas</h4>

@endforelse
</div>
</div>
@endsection