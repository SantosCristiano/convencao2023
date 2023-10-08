<!DOCTYPE html>
<html>
<head>
    <title>Email Giraffas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .titulo {
            font-weight: bold;
        }
  </style>
</head>
<body>
<div class="container">
  <h3 class="titulo">Parabéns sua inscrição foi realizada com sucesso no evento Convenção Nacional de Franqueados 2023!</h3>    <br>        
  <table class="table table-hover">
    <tbody>
    @foreach($cadastros as $cadastro)
    <tr>
        <td class="titulo">DATA DE INSCRIÇÃO:</td>
        <td>{{$cadastro->created_at->format('d/m/Y')}}</td>
        <td class="titulo">HORA DE INSCRIÇÃO</td>
        <td>{{$cadastro->created_at->format('H:i:s')}}</td>
        <td class="titulo">DATA DE NASCIMENTO:</td>
        <td>{{$cadastro->datanascimento}}</td>
        <td class="titulo">NOME</td>
        <td>{{ $mail['nome'] }}</td>
      </tr>
      @endforeach
      <tr>
        <td class="titulo">RG:</td>
        <td>{{ $mail['rg'] }}</td>
        <td class="titulo">ORGÂO EXPEDIDOR:</td>
        <td>{{ $mail['orgaoexpedidor'] }}</td>
        <td class="titulo">CPF:</td>
        <td>{{ $mail['cpf'] }}</td>
        <td class="titulo">E-MAIL:</td>
        <td>{{ $mail['email'] }}</td>
      </tr>
      <tr>
        <td class="titulo">RAZÃO SOCIAL:</td>
        <td>{{ $mail['razaosocial'] }}</td>
        <td class="titulo">CNPJ:</td>
        <td>{{ $mail['cnpj'] }}</td>
        <td class="titulo">ENDEREÇO:</td>
        <td>{{ $mail['endereco'] }}</td>
        <td class="titulo">CIDADE:</td>
        <td>{{ $mail['cidade'] }}</td>
      </tr>
      <tr>
        <td class="titulo">UF:</td>
        <td>{{ $mail['uf'] }}</td>
        <td class="titulo">CEP:</td>
        <td>{{ $mail['cep'] }}</td>
        <td class="titulo">TELEFONE:</td>
        <td>{{ $mail['telefone'] }}</td>
        <td class="titulo">FIXO:</td>
        <td>{{ $mail['fixo'] }}</td>
      </tr>
      <tr>
        <td class="titulo">ACOMPANHANTE:</td>
        <td>{{ $mail['acompanhante'] }}</td>
        <td class="titulo">NUMERO ACOMPANHANTES:</td>
        <td>{{ $mail['numeroacompanhantes'] }}</td>
        <td class="titulo">TIPO ACOMODAÇÃO:</td>
        <td>{{ $mail['tipoacomodacao'] }}</td>
        <td class="titulo">TRANSFER:</td>
        <td>{{ $mail['transfer'] }}</td>
      </tr>
      <tr>
        <td class="titulo">AEROPORTO:</td>
        <td>{{ $mail['aeroporto'] }}</td>
        <td class="titulo">HORÁRIO DE IDA:</td>
        <td>{{ $mail['horario'] }}</td>
        <td class="titulo">HORÁRIO DE VOLTA:</td>
        <td>{{ $mail['horariovolta'] }}</td>
        <td class="titulo">OBSERVAÇÕES:</td>
        <td colspan="3">{{ $mail['observacoes'] }}</td>
      </tr>
      
      <tr>
        <td class="titulo">VALOR TOTAL:</td>
        <td>R$ {{ number_format($mail['valortotal'], 2, ".", ".") }}</td>
        <td class="titulo">FORMA PAGAMENTO:</td>
        <td>{{ $mail['formapagamento'] }} x</td>
        <td class="titulo">VALOR PARCELADO:</td>
        <td>R$ {{ number_format($mail['valorparcelado'], 2, ".", ".") }}</td>
        <td class="titulo">VENCIMENTO:</td>
        <td>{{ $mail['vencimento'] }}</td>
      </tr>
      @if($mail['$Nacompanhantes'] == 1)
      <tr>
        <td class="titulo">NOME PARTICIPANTE 1:</td>
        <td>{{ $mail['nomeparticipante1'] }}</td>
        <td class="titulo">RG PARTICIPANTE 1:</td>
        <td>{{ $mail['rgparticipante1'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 1:</td>
        <td>{{ $mail['cpfparticipante1'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 1:</td>
        <td>{{ $mail['datanascimento1'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 1:</td>
        <td>{{ $mail['franqueadoparticipante1'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 1:</td>
        <td>R$ {{ number_format($mail['valorparticipante1'], 2, ".", ".") }}</td>
      </tr>

      @elseif($mail['$Nacompanhantes'] == 2)
      <tr>
        <td class="titulo">NOME PARTICIPANTE 1:</td>
        <td>{{ $mail['nomeparticipante1'] }}</td>
        <td class="titulo">RG PARTICIPANTE 1:</td>
        <td>{{ $mail['rgparticipante1'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 1:</td>
        <td>{{ $mail['cpfparticipante1'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 1:</td>
        <td>{{ $mail['datanascimento1'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 1:</td>
        <td>{{ $mail['franqueadoparticipante1'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 1:</td>
        <td>R$ {{ number_format($mail['valorparticipante1'], 2, ".", ".") }}</td>
      </tr>

      <tr>
        <td class="titulo">NOME PARTICIPANTE 2:</td>
        <td>{{ $mail['nomeparticipante2'] }}</td>
        <td class="titulo">RG PARTICIPANTE 2:</td>
        <td>{{ $mail['rgparticipante2'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 2:</td>
        <td>{{ $mail['cpfparticipante2'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 2:</td>
        <td>{{ $mail['datanascimento2'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 2:</td>
        <td>{{ $mail['franqueadoparticipante2'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 2:</td>
        <td>R$ {{ number_format($mail['valorparticipante2'], 2, ".", ".") }}</td>
      </tr>

      @elseif($mail['$Nacompanhantes'] == 3)
      <tr>
        <td class="titulo">NOME PARTICIPANTE 1:</td>
        <td>{{ $mail['nomeparticipante1'] }}</td>
        <td class="titulo">RG PARTICIPANTE 1:</td>
        <td>{{ $mail['rgparticipante1'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 1:</td>
        <td>{{ $mail['cpfparticipante1'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 1:</td>
        <td>{{ $mail['datanascimento1'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 1:</td>
        <td>{{ $mail['franqueadoparticipante1'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 1:</td>
        <td>R$ {{ number_format($mail['valorparticipante1'], 2, ".", ".") }}</td>
      </tr>

      <tr>
        <td class="titulo">NOME PARTICIPANTE 2:</td>
        <td>{{ $mail['nomeparticipante2'] }}</td>
        <td class="titulo">RG PARTICIPANTE 2:</td>
        <td>{{ $mail['rgparticipante2'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 2:</td>
        <td>{{ $mail['cpfparticipante2'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 2:</td>
        <td>{{ $mail['datanascimento2'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 2:</td>
        <td>{{ $mail['franqueadoparticipante2'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 2:</td>
        <td>R$ {{ number_format($mail['valorparticipante2'], 2, ".", ".") }}</td>
      </tr>

      <tr>
        <td class="titulo">NOME PARTICIPANTE 3:</td>
        <td>{{ $mail['nomeparticipante3'] }}</td>
        <td class="titulo">RG PARTICIPANTE 3:</td>
        <td>{{ $mail['rgparticipante3'] }}</td>
        <td class="titulo">CPF PARTICIPANTE 3:</td>
        <td>{{ $mail['cpfparticipante3'] }}</td>
        <td class="titulo">DATA DE NASCIMENTO PARTICIPANTE 3:</td>
        <td>{{ $mail['datanascimento3'] }}</td>
      </tr>
      <tr>
        <td class="titulo">FRANQUEADO PARTICIPANTE 3:</td>
        <td>{{ $mail['franqueadoparticipante3'] }}</td>
        <td class="titulo">VALOR PARTICIPANTE 3:</td>
        <td>R$ {{ number_format($mail['valorparticipante3'], 2, ".", ".") }}</td>
      </tr>
      @else

    @endif
    </tbody>
  </table>
</div>
</body>
</html>
