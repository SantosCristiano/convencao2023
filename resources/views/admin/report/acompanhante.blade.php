@extends('adminlte::page')

@section('title', 'Relatório Acompanhante')

@section('content_header')
    <h1>Relatório Acompanhante</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Relatório Acompanhante</a></li>
    </ol>
@stop

@section('content')

<div class="box">
    <div class="box-header">
<!--<h3 class="title-pg">
    Listagem dos cadastrados
</h3>-->
<a href="" class="btn btn-primary btn-add">
    <span class="glyphicon glyphicon-refresh"></span> Atualizar
</a>

<a href="{{route('export_excel.excelAcompanhante')}}" class="btn btn-success btn-add">
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
<!--
<a href="" class="btn btn-success btn-add">
    <span class="glyphicon glyphicon-plus"></span> Cadastrar
</a>-->


<div class="box-body table-responsive">
<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Razão Social</th>
        <th>CNPJ</th>
        <th>Estado</th>
        <th>Nome Acompanhante</th>
        <th>RG Acompanhante</th>
        <th>CPF Acompanhante</th>
        <th>Data de Nascimento</th>
        <th>Franqueado</th>
        <th>Valor</th>
    </tr>
    @foreach($acompanhantes as $acompanhante)
    <tr>
        <td>{{$acompanhante->cadastro->nome}}</td>
        <td>{{$acompanhante->cadastro->cpf}}</td>
        <td>{{$acompanhante->cadastro->razaosocial}}</td>
        <td>{{$acompanhante->cadastro->cnpj}}</td>
        <td>{{$acompanhante->cadastro->uf}}</td>
        <td>{{$acompanhante->nomeparticipante}}</td>
        <td>{{$acompanhante->rgparticipante}}</td>
        <td>{{$acompanhante->cpfparticipante}}</td>
        <td>{{$acompanhante->datanascimento}}</td>
        @if ($acompanhante->franqueadoparticipante == 1)
        <td>Sim</td>
        @else
        <td>Não</td>
        @endif
        <td>{{$acompanhante->valorparticipante}}</td>
    </tr>
    @endforeach

</table>
</div>
</div>

{!! $acompanhantes->links() !!}

@stop