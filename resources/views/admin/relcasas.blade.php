<h1>Casa Serginho</h1>
<h2>Relatório de Casas Cadastradas</h2>

<table border=1>
<tr>
    <td>Modelo</td>
    <td>Tipo</td>
    <td>categoria</td>
    <td>Ano</td>
    <td>Diaria</td>
    <td>Tamanho</td>
    <td>Preço R$:</td>

</tr>
    @foreach($casas as $c)
        <tr>
            <td>{{$c->modelo}}</td>
            <td>{{$c->tipo->nome}}</td>
            <td>{{$c->categoria}}</td>
            <td>{{$c->ano}}</td>
            <td>{{$c->diaria}}</td>
            <td>{{$c->tamanho}}</td>
            <td>{{$c->preco}}</td>

        </tr>
    @endforeach

</table>
        