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
            <h1><b>Alugar</b></h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <p>* Campos Requeridos</p>
            <form method="post" class="form-group" action="{{route('proposta_alugar.store')}}">
            {{ csrf_field() }}

                <label for="nome" class="mr-sm-2">*Nome: </label>
                <input type="text" name="nome_cliente" class="form-control" id="nome" required>

                <label for="email" class="mr-sm-2">*E-mail: </label>
                <input type="email" name="email" class="form-control" id="email" required>

                <label for="telefone" class="mr-sm-2">*Telefone: </label>
                <input type="text" name="telefone" class="form-control" id="telefone" required>

                <label for="dias" class="mr-sm-2">*Quantos Dias Deseja?:</label>
                <input type="number" name="dias" class="form-control" id="dias" min="1" max="30" required>
            <br>
                <input type="hidden" name="barco_id" value="{{$barco->id}}">
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
            </div>

            <div class="col-sm-6">
            @if(Storage::exists($barco->foto))
                            <img src="{{url('storage/'.$barco->foto)}}"
                            style="width:100%; height: 18vw;" 
                            alt="Foto de barco"/>
            @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 18vw;" 
                            alt"Foto de barco"/>
            @endif
                <ul class="none">
                <li><b>Diaria:</b><h2>{{number_format($barco->diaria, '2', ',', '.')}}</h2></li>
                    <li><b>Modelo:</b> {{$barco->modelo}}</li>
                    <li><b>Ano:</b> {{$barco->ano}}</li>
                    <li><b>Categora:</b> {{$barco->categoria}}</li>
                    <li><b>Tamanho:</b> {{$barco->tamanho}}</li>
                    <li><b>Marca:</b> {{$barco->marca->nome}}</li>
                </ul>
            </div>
        </div>
<footer class="page-footer font-small blue pt-4 mt-4">
  <div class="footer-copyright text-center py-3">© 2018 Copyright Barcos Marciel</div>
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