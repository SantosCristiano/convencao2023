@extends('adminlte::page')

@section('title', ' Relatório inscritos ')

@section('content_header')
    <h1>Relatório inscritos</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Relatório inscritos</a></li>
    </ol>
@stop

@section('content')

<div class="box">
    <div class="box-header">
    <a href="" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-refresh"></span> Atualizar
    </a>
    <a href="{{route('export_excel.excelInscritos')}}" class="btn btn-success btn-add">
        <span class="fa fa-file-excel-o"></span> Exportar Excel
    </a>
    <!--<a href="{{route('export_pdf.pdfInscritos')}}" class="btn btn-danger btn-add">
        <span class="fa fa-file-pdf-o"></span> Exportar PDF
    </a>-->
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
                

                <!--<td>
                    <a href="{{url('/cadastros/{$cadastro->id}/edit')}}" class="actions edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="" class="actions delete">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
                url('Admin/cadastros/{$cadastro->id}/edit')
                route('admin.cadastros.edit', $cadastros->id)

                {{}}
                
                -->

                <!--<td>
                    <a href="" class="btn btn-warning">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>-->
                
            </tr>

            @endforeach
        </table>
    </div>
</div>

{!! $cadastros->links() !!}

@stop