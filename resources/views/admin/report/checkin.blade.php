@extends('adminlte::page')

@section('title', 'Relatório Checkins')

@section('content_header')
    <h1>Relatório Checkins</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Relatório Checkins</a></li>
    </ol>
@stop

@section('content')

<div class="box">
    <div class="box-header">
    <a href="" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-refresh"></span> Atualizar
    </a>
    <a href="{{route('export_excel.excelTransfer')}}" class="btn btn-success btn-add">
        <span class="fa fa-file-excel-o"></span> Exportar Excel
    </a>
    <form action="{{ route('report.search') }}" method="post" class="form form-inline" style="float:right;">
        {!! csrf_field() !!}
        <input type="text" name="id" id="" class="form-control" placeholder="Razão Social">
        <!--<input type="date" name="data" id="" class="form-control">-->
        <select name="uf" id="" class="form-control">
            <option value="">Estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
    </div>
    <div class="box-body table-responsive">

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Razão Social</th>
        <th>CNPJ</th>
        <th>Estado</th>
        <th>Acompanhante</th>
        <th>Número de Acompanhantes</th>
        <th>Tipo Acomodacão</th>
        <th>Transfer</th>
        <th>Aeroporto</th>
        <th>Horário de ida</th>
        <th>Horário de volta</th>
        <th>Observações</th>
    </tr>
    
    @foreach($checkins as $checkin)
    <tr>
        <td>{{$checkin->cadastro->nome}}</td>
        <td>{{$checkin->cadastro->cpf}}</td>
        <td>{{$checkin->cadastro->razaosocial}}</td>
        <td>{{$checkin->cadastro->cnpj}}</td>
        <td>{{$checkin->cadastro->uf}}</td>
        @if ($checkin->acompanhante == 1)
        <td>Sim</td>
        @else 
        <td>Não</td>
        @endif
        <td>{{$checkin->numeroacompanhantes}}</td>
        <td>{{$checkin->tipoacomodacao}}</td>
        @if ($checkin->transfer == 1)
        <td>Sim</td>
        @else 
        <td>Não</td>
        @endif
        <td>{{$checkin->aeroporto}}</td>
        <td>{{$checkin->horario}}</td>
        <td>{{$checkin->horariovolta}}</td>
        <td>{{$checkin->observacoes}}</td>
    </tr>
    @endforeach

</table>
</div>
</div>

{!! $checkins->links() !!}

@stop