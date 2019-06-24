<h1>Barcos Marciel</h1>
<h2>Relatório de Barcos Cadastrados</h2>

<table border=1>
<tr>
    <td>Modelo</td>
    <td>Marca</td>
    <td>categoria</td>
    <td>Ano</td>
    <td>Diaria</td>
    <td>Tamanho</td>
    <td>Preço R$:</td>

</tr>
    @foreach($barcos as $c)
        <tr>
            <td>{{$c->modelo}}</td>
            <td>{{$c->marca->nome}}</td>
            <td>{{$c->categoria}}</td>
            <td>{{$c->ano}}</td>
            <td>{{$c->diaria}}</td>
            <td>{{$c->tamanho}}</td>
            <td>{{$c->preco}}</td>

        </tr>
    @endforeach

</table>
        