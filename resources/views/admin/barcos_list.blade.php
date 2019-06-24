@extends('adminlte::page')

@section('title', 'Cadastro de Barcos')

@section('content_header')
    <h1>Cadastro de Barcos
    <a href="{{ route('barcos.create') }}" 
       class="btn btn-primary pull-right" role="button">Novo</a>
    </h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<table class="table table-striped">
  <tr>
    <th> Modelo </th>
    <th> Marca </th>
    <th> categoria </th>
    <th> Ano </th>
    <th> Preço R$ </th>
    <th> Data Cad. </th>
    <th> Diaria </th>
    <th> Tamanho </th>
    <th>Foto </th>
    <th> Ações </th>
  </tr>  
@forelse($barcos as $c)
  <tr>
    <td> {{$c->modelo}} </td>
    <td> {{$c->marca->nome}} </td>
    <td> {{$c->categoria}} </td>
    <td> {{$c->ano}} </td>
    <td> {{number_format($c->preco, 2, ',', '.')}} </td>
    <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
    <td> {{ $c->diaria }} </td>
    <td> {{ $c->tamanho }} </td>
    <td>
    @if(Storage::exists($c->foto))
    <img src="{{url('storage/'.$c->foto)}}"
         style="width: 80px; height: 50px;" 
         alt="Foto de Barco"/>
    
    @else

    <img src="{{url('storage/fotos/sem_foto.png')}}"
         style="width: 80px; height: 50px;" 
         alt="Foto de Barco"/>

    @endif
  </td>

    <td> 
    
        <a href="{{route('barcos.edit', $c->id)}}" 
            class="btn btn-warning btn-sm" title="Alterar"
            role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('barcos.destroy', $c->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>
    </td>
  </tr>
  @if ($loop->last)
    <tr>
      <td colspan=8> Soma dos preços dos barcos cadastrados R$: 
        {{number_format($soma, 2, ',', '.')}} </td>
    </tr>  
    <tr>
      <td colspan=8> Preço Médio dos Barcos cadastrados R$: 
        {{number_format($c->avg('preco'), 2, ',', '.')}} </td>
    </tr>  
    <tr>
      <td colspan=8> Preço Médio das Diarias cadastrados R$: 
        {{number_format($c->avg('diaria'), 2, ',', '.')}} </td>
    </tr>  
  @endif

@empty
  <tr><td colspan=8> Não há barcos cadastrados ou filtro da pesquisa não 
                     encontrou registros </td></tr>
@endforelse
</table>
{{ $barcos->links() }}
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection