<h1>Casas Serginho</h1>
<h2>Relatório de Propostas de Compra</h2>

<table border=1> 
<tr>
    <td>Nome Cliente</td>
    <td>Email</td>
    <td>Telefone</td>
    <td>Proposta</td>

</tr>
    @foreach($propostas as $c)
        <tr>
            <td>{{$c->nome_cliente}}</td>
            <td>{{$c->email}}</td>
            <td>{{$c->telefone}}</td>
            <td>{{number_format($c->proposta, '2', ',', '.')}}</td>
        </tr>
    @endforeach

</table>
        