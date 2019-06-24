<h1>Barcos Marciel</h1>
<h2>Relatório de Usuarios Cadastrados</h2>

<table border=1>
<tr>
    <td>Nome</td>
    <td>Email</td>
    <td>CPF</td>
    <td>Nascimento</td>
    <td>Telefone</td>

</tr>
    @foreach($user as $c)
        <tr>
            <td>{{$c->name}}</td>
            <td>{{$c->email}}</td>
            <td>{{$c->cpf}}</td>
            <td>{{$c->datanascimento}}</td>
            <td>{{$c->telefone}}</td>
        </tr>
    @endforeach

</table>
        