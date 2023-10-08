@extends('adminlte::page')

@section('title', 'Relatório Financeiro')

@section('content_header')
    <h1>Relatório Financeiro</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Relatório Financeiro</a></li>
    </ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
    <a href="" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-refresh"></span> Atualizar
    </a>
    <a href="{{route('export_excel.excelFinanceiro')}}" class="btn btn-success btn-add">
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

<table class="table table-striped text-center">

    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Razão Social</th>
        <th>CNPJ</th>
        <th>Estado</th>
        <th>Valor Total</th>
        <th>Número de Pagamento</th>
        <th>Valor Parcelado</th>
        <th>Vencimento</th>
    </tr>

     @foreach($pagamentos as $pagamento)

    <tr>

        <td>{{$pagamento->cadastro->nome}}</td>
        <td>{{$pagamento->cadastro->cpf}}</td>
        <td>{{$pagamento->cadastro->razaosocial}}</td>
        <td>{{$pagamento->cadastro->cnpj}}</td>
        <td>{{$pagamento->cadastro->uf}}</td>
        <td>R$ {{number_format($pagamento->valortotal,2,',','.')}}</td>
        <td>{{$pagamento->formapagamento}}</td>
        <td>R$ {{$pagamento->valorparcelado}}</td>
        <td>{{$pagamento->vencimento}}</td>

        <!--<td>
            <a href="{{-- url('/cadastros/{$cadastro->id}/edit') --}}" class="actions edit">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="" class="actions delete">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
        </td>-->
        
    </tr>

    @endforeach

</table>
</div>
</div>

{!! $pagamentos->links() !!}

@stop