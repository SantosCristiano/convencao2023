@extends('site.layouts.default')

@section('title', 'Cadastro')

@section('content')
<div style="margin:30px;">
  <h3 style="text-align:center;">Convenção Nacional de Franqueados 2019 - Ficha de Inscrição</h3>
</div>

@if( isset($errors) && count($errors) > 0) 
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
@endif

@if( isset($mensagens) && count($mensagens) > 0) 
  <div class="alert alert-success">
    @foreach($mensagens->all() as $mensagem)
      <p>{{ $mensagem }}</p>
    @endforeach
  </div>
@endif

<form method="post" action="{{ route('cadastro.store') }}" class="form-horizontal" id="formID">
      {!! csrf_field() !!} 
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="nome" placeholder="Nome completo" value="{{old('nome')}}" name="nome" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
            <input type="text" class="form-control" id="rg" placeholder="RG" value="{{old('rg')}}" name="rg" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" id="expedidor" placeholder="Orgão Expedidor" value="{{old('expedidor')}}" name="expedidor" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
            <input type="text" class="form-control cpf" id="cpf" placeholder="CPF" value="{{old('cpf')}}" name="cpf" required="">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="E-mail" value="{{old('email')}}" name="email" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" id="razaosocial" placeholder="Razão Social da Loja" value="{{old('razaosocial')}}" name="razaosocial" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" value="{{old('cnpj')}}" name="cnpj" required="">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input type="text" class="form-control" id="endereco" placeholder="Endereço" value="{{old('endereco')}}" name="endereco" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">             
            <span class="input-group-addon"><i class="fas fa-city"></i></span>
            <input type="text" class="form-control" id="cidade" placeholder="Cidade" value="{{old('cidade')}}" name="cidade" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-city"></i></span>
            <select name="uf" id="uf" value="{{old('uf')}}" class="form-control" required="">
              <option value="">Selecione a UF</option>
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
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
          <div class="input-group">            
            <span class="input-group-addon"><i class="fas fa-home"></i></span>
            <input type="text" class="form-control" id="cep" placeholder="CEP" value="{{old('cep')}}" name="cep" required="">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
            <input type="text" class="form-control" id="celular" name="celular" placeholder="Telefone Celular" valude="{{old('celular')}}" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">             
            <span class="input-group-addon"><i class="fas fa-blender-phone"></i></span>
            <input type="text" class="form-control" id="fixo" name="fixo" placeholder="Telefone Fixo" value="{{old('fixo')}}">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
            <select class="form-control" id="levaracompanhante" name="levaracompanhante" value="{{old('levaracompanhante')}}" required="">
              <option value="">Levará acompanhante?</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
            <select class="form-control" id="acomodacao" value="{{old('acomodacao')}}" name="acomodacao" required="">
              <option value="">Tipo de Acomadação</option>
              <option value="double">Duplo:  Valor R$ 750,00</option>
              <option value="single">Single: Valor R$ 990,00</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="opcaoacompanhantes">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
            <select class="form-control" id="acompanhantes" value="{{old('acompanhantes')}}" name="acompanhantes">
              <option value="">Selecione número de acompanhantes</option>
              <option value="1">1 acompanhante</option>
              <option value="2">2 acompanhantes</option>
              <option value="3">3 acompanhantes</option>
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-plane"></i></span>
            <select class="form-control" id="transfer" value="{{old('transfer')}}" name="transfer" required="">
              <option value="">Usará o transfer do evento?</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 opcaotransfer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-plane"></i></span>
            <select class="form-control" id="aeroporto" value="{{old('aeroporto')}}" name="aeroporto">
              <option value="">Selecione o Aeroporto</option>
              <option value="congonhas">Congonhas 75 KM</option>
              <option value="guarulhos">Guarulhos 50 KM</option>
              <!--<option value="vira-copos">Vira Copos</option>-->
            </select>
          </div> 
        </div>

      </div>
      <div class="form-group">    

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 opcaotransfer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-clock"></i></span>
            <select class="form-control" id="horario" value="{{old('horario')}}" name="horario">
              <option value="">Selecione o horário</option> 
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="14:00">14:00</option>
            </select>
          </div>
        </div>  

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-pencil-alt"></i></span>
            <textarea class="form-control" id="observacoes" placeholder="Observações" value="{{old('observacoes')}}" name="observacoes" required=""></textarea>
          </div>
        </div>

      </div>  

      <div class="form-group" id="formulario">

      </div>   
      <div class="form-group">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">             
          <span class="input-group-addon" style="color:green"><i class="far fa-money-bill-alt"></i> <b>Valor total R$ </b></span>
            <input class="form-control" type="text" placeholder="" id="valortotal" name="valortotal" readonly value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
          <span class="input-group-addon"><i class="fab fa-cc-mastercard"></i></span>
            <select class="form-control" id="formapagamento" value="{{old('formapagamento')}}" name="formapagamento" required="">
              <option value="">Número de parcelas</option>
              <option value="1" id="n1">1X</option>
              <option value="2" id="n2">2X</option>
              <option value="3" id="n3">3X</option>
              <option value="4" id="n4">4X</option>
              <option value="5" id="n5">5X</option>
              <option value="6" id="n6">6X</option>
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon" style="color:green"><i class="far fa-money-bill-alt"></i><b> Valor parcelado R$</b></span>
            <input class="form-control" type="text" placeholder="" id="valorparcelado" name="valorparcelado" value="" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <div class="input-group">
            <span class="input-group-addon" style="color:green"><i class="far fa-money-bill-alt"></i><b> Data de Vencimento</b></span>
            <input class="form-control" type="text" placeholder="" id="datavencimento" name="datavencimento" value="" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="mensagemtransfer">
          <div class="alert alert-success"><p><b>O check in estará liberado a partir das 12:00 horas e liberação dos apartamentos até as 17h00 horas</b></p></div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="opcaopagamento">
          <div class="alert alert-success"><p><b>Última parcela deverá ser para dia 30/10/2019</b></p></div>
        </div>
      </div>


    <div class="form-group">
       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <button type="submit" class="btn btn-primary btn-block" id="enviar">Inscrever-se</button>
      </div></div>

    </div>  
  </form>

<!-- Modal -->
<div class="modal fade" id="modalCPF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="titleCPF">Erro no CPF!</h5>
      </div>
      <div class="modal-body">
         <p id="msgCPF">Verifique o CPF!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Vou verificar!</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAceite" tabindex="-1" role="dialog">
  <div class="modal-dialog" id="dialog2" role="document">
    <div class="modal-content" id="content2">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center">Termos e condições</h4>
      </div>
      <div class="modal-body">

        <div class="container">
            <div class="row">

            <h4 style="text-align:center">CONVENÇÃO NACIONAL DE FRANQUEADOS GIRAFFAS 2019</h4>

            <p  style="font-weight:bold;">Franqueado,</p>

            <p>Você é o nosso convidado de honra para participar do <span  style="font-weight:bold;">Convenção Nacional de Franqueados 2019</span>, 
            que acontecerá entre os dias <span  style="font-weight:bold;">4 e 6 de novembro</span> no Club Med Lake Paradise, localizado em Mogi das Cruzes - São Paulo. Confira o regulamento abaixo, em seguida, faça a sua inscrição. Esperamos você!</p>

            <h5 style="font-weight:bold;">O Pacote Inclui:</h5>

            <ul>
            <li>Participação em todas as atividades da Convenção: Palestras, workshop, debates, trabalhos em grupo, coffee break.</li>
            <li>Taxa do Club Med</li>
            <li>Tranfer in/out - Aeroportos de Congonhas 75 KM e Guarulhos 50 KM</li>
            <ul>
                <li style="font-weight:bold;">IN - Saídas: 11:00 – 12:00 – 14:00 horas</li>
                <li style="font-weight:bold;">OUT – Saídas 10:00 – 12:00 – 15:30.</li>
            </ul>
            <li>Fornecimento de hospedagem: Acomodação em apartamentos duplos (com acompanhante ou compartilhando com outro franqueado) com ar condicionado, telefone, frigobar, secador de cabelo, televisão e cofre;</li>
            <li>Alimentação com pensão completa: café da manhã, almoço e jantar, com bebidas incluídas nas refeições (água, refrigerantes, sucos, vinhos nacionais e chopp);</li>
            <li>Bar durante toda estada,</li>
            <li>Equipe de G.O.s (monitores especializados), de acordo com a programação do village;</li>
            <li>Atividades Esportivas e Recreativas, de acordo com a programação do village;</li>
            <li>Entretenimento noturno, de acordo com a programação do village;</li>
            <li><span  style="font-weight:bold;">Check - in:</span> a partir das 12:00 horas e liberação dos apartamentos até as 17h00 horas. (Almoço de abertura do evento incluso)</li>
            <li><span  style="font-weight:bold;">Check - out:</span> Liberação dos apartamentos às 12h00, com check - out até às 15h00 (almoço incluso).</li>
            </ul>

            <h5 style="font-weight:bold;">Forma de Pagamento:</h5>
            <ul>
            <li>Boleto Bancário em até 6 X - (30/05, 30/06, 30/07, 30/08, 30/09, 30/10)</li>
            </ul>

            <h5 style="font-weight:bold;">Valores:</h5>

            <ul>
            <li><h5><span  style="font-weight:bold;">Apartamento duplo:</span> Compartilhado com acompanhante ou outro franqueado.</h5></li>
            <ul>
                <li>Valor por Franqueado: <span  style="font-weight:bold;">R$ 750,00</span> (6X de R$125,00)</li>
                <li>Valor para o primeiro acompanhante: <span  style="font-weight:bold;">R$ 750,00</span> (6X de R$125,00)</li>
                <li>Valor para o segundo acompanhante: <span  style="font-weight:bold;">R$ 990,00</span> (6X de R$165,00)</li>
            </ul>
            </ul>
            <ul>
            <li><h5 style="font-weight:bold;">Apartamento Single:</h5></li>
            <ul>
                <li>Valor por franqueado: <span  style="font-weight:bold;">R$ 990,00</span> (6X de R$165,00)</li>
            </ul>
            </ul>

            <h5 style="font-weight:bold;">Valor por criança:</h5>
            <ul>
            <li>0 a 3 anos e 11 meses (até a data do check-in) – Free no mesmo apartamento dos pais</li>
            <li>4 anos a 11 anos e 11 meses (até a data do check-in) - 50% do valor do adulto acomodado no mesmo apartamento dos pais. R$ 375,00</li>
            <li>A partir de 12 anos (até a data do check-in) – adulto R$ 750,00</li>
            <li><span  style="font-weight:bold;">É obrigatório</span> o envio de um documento escaneado da criança para <a href="mailto:convencao2019@giraffas.com">convencao2019@giraffas.com</a></li>

            </ul>


            <h5 style="font-weight:bold;">O pacote não Inclui:</h5>
            <ul>
            <li style="font-weight:bold;">Estacionamento: R$ 30,00 A DIÁRIA</li>
            <li>Consumações de bebidas excluídas do sistema “all-inclusive”,</li>
            <li>Aulas de equitação,</li>
            <li>Pesca de grande porte,</li>
            <li>Atividades em ateliês de artes aplicadas,</li>
            <li>Massagens,</li>
            <li>Green fees na prática de golfe,</li>
            <li>Aulas de mergulho,</li>
            <li>Aluguel de equipamentos de esqui.</li>
            <li>Passagens aéreas</li>
            </ul>

            <h5 style="font-weight:bold;">Serviço: </h5>

            <p><span  style="font-weight:bold;">Data:</span> de 04 a 06 de novembro de 2019 -de segunda à quarta-feira</p>

            <p><span  style="font-weight:bold;">Local:</span> Club Med Lake Paradise – Rodovia Engenheiro Candido do Rêgo Chaves 4500 – Jundiapeba – Mogi das Cruzes/SP</p>
            <p style="font-weight: bold">Confira a estrutura do local da convenção: </p>
            <a href="https://www.clubmed.com.br/r/Lake-Paradise/y">https://www.clubmed.com.br/r/Lake-Paradise/y</a>

            <p><span  style="font-weight:bold;">Público:</span> Franqueados da rede Giraffas.</p>

            <p>Em caso de dúvidas ou mais informações entre em contato pelo e-mail: <a href="mailto:convencao2019@giraffas.com">convencao2019@giraffas.com</a> ou fale com a Wylza no telefone: (61) 99538-3333.</p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceito termos e condições!</button>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>

@endsection