<!DOCTYPE html>
<html>
<head>
    <title>PDF Giraffas</title>
    <style type="text/css">
        .card {
            border-style: solid;
            border-left-color: #1D3E92;
            border-bottom: none;
            border-top: none;
            border-right: none;
        }
        .card-image {
            width: 25%;
        }
        .card-content {
            margin-left: 5px;
            color: black;
        }
        .p-body {
            margin-left: 10px;
        }
        img {
            width: 60px;
            height: 60px;
        }
        .span-color {
            color: #1d3e92;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>RG</th>
            <th>Orgão Expedidor</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Razão Social</th>
            <th>CNPJ</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>Telefone</th>
            <th>Fixo</th>
            <th>Data</th>
            <th>Hora</th>
        </tr>
        @foreach($cadastros as $cadastro)
        <tr>
            <td>{{$cadastro->nome}}</td>
            <td>{{$cadastro->datanascimento}}</td>
            <td>{{$cadastro->rg}}</td>
            <td>{{$cadastro->orgaoexpedidor}}</td>
            <td>{{$cadastro->cpf}}</td>
            <td>{{$cadastro->email}}</td>
            <td>{{$cadastro->razaosocial}}</td>
            <td>{{$cadastro->cnpj}}</td>
            <td>{{$cadastro->endereco}}</td>
            <td>{{$cadastro->cidade}}</td>
            <td>{{$cadastro->uf}}</td>
            <td>{{$cadastro->cep}}</td>
            <td>{{$cadastro->telefone}}</td>
            <td>{{$cadastro->fixo}}</td>
            <td>{{$cadastro->created_at->format('d/m/Y')}}</td>
            <td>{{$cadastro->created_at->format('H:i:s')}}</td>                
        </tr>
        @endforeach
    </table>
</body>
</html>