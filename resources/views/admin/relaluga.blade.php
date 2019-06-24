<h1>Barcos Marciel</h1>
<h2>Relatório de Solicitações  de Aluguel</h2>

<table class="table table-striped" border='1'>
            <tr>
                <th>Código</th>
                <th>Nome do Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Barco</th>
                <th>dias</th>
                <th>diaria</th>
                <th>Data</th>
                <!-- <th>Ação</th> -->

            </tr>
            @forelse($propostas as $proposta)
                <tr>
                    <td style="text-align: center">{{$proposta->id}}</td>
                    <td>{{$proposta->nome_cliente}}</td>
                    <td>{{$proposta->email}}</td>
                    <td>{{$proposta->telefone}}</td>
                    <td>{{$proposta->barco->modelo}}</td>
                    <td>{{$proposta->dias}}</td>
                    <td>R$: {{number_format($proposta->barco->diaria, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>
                    <td> {{date_format($proposta->created_at, 'd/m/Y')}} </td>

                </tr>
            @empty

                <h4>Não existem proposta cadastradas ainda.</h4>

            @endforelse
        </table>
        