@extends('site.modelo')

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <!-- Header -->
        <div class="container">
            <h1><b>Comprar casa</b></h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <p>* Campos Requeridos</p>
            <form method="post" class="form-group" action="{{route('proposta.store')}}">
            {{ csrf_field() }}

                <label for="nome" class="mr-sm-2">*Nome: </label>
                <input type="text" name="nome_cliente" class="form-control" id="nome" required>

                <label for="email" class="mr-sm-2">*E-mail: </label>
                <input type="email" name="email" class="form-control" id="email" required>

                <label for="telefone" class="mr-sm-2">*Telefone: </label>
                <input type="text" name="telefone" class="form-control" id="telefone" required>

                <label for="proposta" class="mr-sm-2">*Valor da proposta R$:</label>
                <input type="text" name="proposta" class="form-control" id="proposta" required>
            <br>
                <input type="hidden" name="casa_id" value="{{$casa->id}}">
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
            </div>

            <div class="col-sm-6">
            @if(Storage::exists($casa->foto))
                            <img src="{{url('storage/'.$casa->foto)}}"
                            style="width:100%; height: 18vw;" 
                            alt="Foto de casa"/>
            @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 18vw;" 
                            alt"Foto de casa"/>
            @endif
                <ul class="none">
                    <li><b>Nome:</b> {{$casa->modelo}}</li>
                    <li><b>Fabricada:</b> {{$casa->ano}}</li>
                    <li><b>Categoria:</b> {{$casa->categoria}}</li>
                    <li><b>Tamanho:</b> {{$casa->tamanho}}</li>
                    <li><b>Tipo:</b> {{$casa->tipo->nome}}</li>
                    <li><b>Acompanhamentos:</b> {{$casa->acompanhamentos}}</li>
                    <li><h2>{{number_format($casa->preco, '2', ',', '.')}}</h2></li>
                </ul>
            </div>
        </div>
<footer class="page-footer font-small blue pt-4 mt-4">
  <div class="footer-copyright text-center py-3">© 2018 Copyright Casas-Laravel</div>
</footer>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
        <script>
            $(document).ready(function () {
                $('#proposta').mask('000.000.000.000.000,00', {reverse: true});
            });
        </script>


@endsection