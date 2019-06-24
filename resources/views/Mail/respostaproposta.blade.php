<h1>Barcos Marciel</h1>

<p> Olá {{ $proposta->nome }},<br>
Recebemos sua proposta de compra para o Barco {{ $barco->modelo }}, no valor de R$ {{number_format($proposta->proposta, '2', ',', '.')}},</p>

<p>e esta foi encaminhada para um
de nossos bendedores. <br>Segue abaixo a resposta:</p>

<p><i><b>{{ $mensagem }}</b></i></p>