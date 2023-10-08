@extends('site.layouts.default')

@section('title', 'Cadastro')

@section('content')
    <div style="margin:30px;">
        <h3 style="text-align:center;">Ficha de Inscrição - Convenção Nacional de Franqueados 2023</h3>
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
                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    <input type="text" mask="00/00/0000" class="form-control datanascimento" id="datanascimento" name="datanascimento" placeholder="Data de Nascimento" value="{{old('datanascimento')}}">
                </div>
            </div>
            <!--div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-blender-phone"></i></span>
            <input type="text" class="form-control" id="fixo" name="fixo" placeholder="Telefone Fixo" value="{{old('fixo')}}">
          </div>
        </div-->
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
                        <option value="">Tipo de Acomodação</option>
                        @if (88 - count($single) > 0)
                            <option value="single">Single (Sem acompanhantes): Valor R$ 4.500,00 | Vagas Disponiveis: {{88 - $single->count()}}</option>
                        @else
                            <option value="single" disabled>Single (Sem acompanhantes): Valor R$ 4.500,00 | (Não temos mais disponibilidade neste tipo de acomodação. Envie um email para convencao2023@giraffas.com e faça sua solicitação)</option>
                        @endif

                        @if (82 - count($double) > 0)
                            <option value="double">Duplo (Até dois acompanhantes):  Valor R$ 3.200,00 | Vagas Disponiveis: {{82 - $double->count()}} </option>
                        @else
                            <option value="double" disabled>Duplo (Até dois acompanhantes):  Valor R$ 3.200,00 | (Não temos mais disponibilidade neste tipo de acomodação. Envie um email para convencao2023@giraffas.com e faça sua solicitação) </option>
                        @endif
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
                        <!--option value="3">3 acompanhantes</option-->
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" hidden>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-plane"></i></span>
                    <select class="form-control" id="transfer" value="{{old('transfer')}}" name="transfer">
                        <option value="">Usará o transfer do evento?</option>
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>
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
                <div class="alert alert-success"><p><b>Check-in: 02/05/2023 a partir das 16h (almoço não incluso)</b></p></div>
            </div>

            <!--div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="opcaopagamento">
              <div class="alert alert-success"><p><b>Última parcela deverá ser para dia 30/10/2023</b></p></div>
            </div-->
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

                            <h4 style="text-align:center">CONVENÇÃO NACIONAL DE FRANQUEADOS GIRAFFAS 2023 – INSCREVA-SE</h4>

                            <p>Franqueado,</p>

                            <p>Você está convidado para uma experiência única e enriquecedora, a Convenção de Franqueados 2023, que acontecerá no período de 2 a 5 de maio no Resort Club Med Rio das Pedras, em Angra dos Reis. </p>
                            <p>Neste ano, temos uma programação especial com espaços de debate, troca de experiências e confraternização, a fim de proporcionar maior integração entre franqueadora, franqueados e parceiros.</p>

                            <p>Você é peça fundamental nesse encontro, marco da nossa saída da crise e aceleração das vendas, para planejarmos e discutirmos juntos estratégias ainda mais assertivas e inovadoras para a gestão do nosso negócio. </p>

                            <p>Não fique de fora desse evento e confraternize conosco em meio as belezas naturais de Angra dos Reis. As vagas são limitas. </p>

                            <h5 style="font-weight:bold;">SUA INSCRIÇÃO NO EVENTO INCLUI:</h5>

                            <ul>
                                <li>Hospedagem em apartamentos com ar-condicionado, telefone, frigobar, secador de cabelo, televisão e cofre;</li>
                                <li>Alimentação com pensão completa: café da manhã, almoço e jantar, com bebidas incluídas nas refeições (água, refrigerantes, sucos, vinhos nacionais e chopp);</li>
                                <li>Participação em todas as atividades extras promovidas pelo Giraffas (agenda será divulgada posteriormente);</li>
                                <li>Transfer in/out;</li>
                                <li>Bar durante toda estada;</li>
                                <li>Equipe de G.O.s (monitores especializados), de acordo com a programação do Village;</li>
                                <li>Atividades Esportivas e Recreativas, de acordo com a programação do Village; </li>
                                <li>Entretenimento noturno, de acordo com a programação do Village.</li>
                            </ul>

                            <h5 style="font-weight:bold;">TRANSFER</h5>

                            <p style="font-weight:bold;">Transfer in:</p>
                            <ul>
                                <li>Origem: Aeroporto Santos Dumont e Aeroporto Galeão</li>
                                <li>Horários de saída: 14h, 15h e 16h</li>
                            </ul>

                            <p style="font-weight:bold;">Transfer out:</p>
                            <ul>
                                <li>Horários de saída: 10h, 13h e 15h</li>
                            </ul>

                            <p>As movimentações entre aeroporto x hotel x aeroporto levam em torno de 2hs de viagem. Programem a sua passagem de volta contando as 2hs de viagem até o aeroporto mais 1h de antecedência para embarque.</p>

                            <p>No dia 20/03 será enviado um formulário aos franqueados para esclarecer informações referentes aos transfers: horários e ponto de encontro. Caso o seu horário não condizer com os estipulados acima, fique tranquilo, trataremos todas as exceções e nenhum franqueado ficará sem transfer.</p>


                            <h5 style="font-weight:bold;">INFORMAÇÕES DO PACOTE DE HOSPEDAGEM:</h5>

                            <ul>
                                <li>Local: Club Med Rio das Pedras </li>
                                <li>Check-in: 02/05/2023 a partir das 16h (almoço não incluso)</li>
                                <li>Check-out: 05/05/2023 liberação do apartamento às 12h e check-out até às 15h (almoço incluso)</li>
                            </ul>

                            <p>Early Check-in ou Late Check-out: Caso o franqueado opte por essas opções, deverá solicitar com antecedência, pois estará sujeito à disponibilidade e custo adicional. </p>

                            <p style="font-weight:bold;">Atenção: Devido ao COVID-19, os horários de chegada e saída do hotel podem ser modificados a qualquer momento, a fim de respeitar as medidas sanitárias impostas pelas autoridades.</p>

                            <h5 style="font-weight:bold;">CONDIÇÕES FINANCEIRAS – PREÇO POR PESSOA</h5>
                            <p>Inscrições até 26/03 ou enquanto houver disponibilidade de acomodações. </p>
                            <p>Todos os pagamentos serão via Boleto Bancário.</p>
                            <ul>
                                <li>Apto Duplo: R$ 3.200,00 por pessoa</li>
                                <li>Apto Single: R$ 4.500,00</li>
                                <li>Forma de pagamento: à vista ou em parcelas mensais, com último pagamento até 28/04/2023, conforme inscrição do evento. </li>
                                <li>5% de desconto e parcelamento em 5X para inscrições feitas até 31/12/2022.</li>
                            </ul>

                            <h5 style="font-weight:bold;">Política tarifária para hospedagem de crianças:</h5>

                            <ul>
                                <li>0 a 3 anos – Cortesia</li>
                                <li>4 a 11 anos – R$1.600,00</li>
                                <li>A partir de 12 anos – R$3.200,00</li>
                                <li>Esses valores são sempre acomodados no mesmo quarto do responsável.</li>
                            </ul>

                            <h5 style="font-weight:bold;">Política de cancelamento:</h5>

                            <ul>
                                <li>A menos de 30 dias da data do check-in não serão aceitos cancelamentos.</li>
                            </ul>

                            <h5 style="font-weight:bold;">IMPORTANTE:</h5>
                            <ul>
                                <li>As acomodações do Village comportam no máximo 3 pessoas, sendo que a terceira pessoa ficará em uma cama de armar.</li>
                                <li>No caso de casal com dois filhos, precisamos consultar junto ao hotel a disponibilidade de apartamento familiar, visto que são pouquíssimas unidades no Village. Para isso, pedimos que entrem em contato com Wylza através do e-mail: <a href="mailto: convencao@giraffas.com"> convencao@giraffas.com</a></li>
                                <li>Consideraremos o nome que consta na inscrição como o primeiro participante, responsável financeiro, podendo inscrever na mesma acomodação até dois acompanhantes.</li>
                            </ul>

                            <p style="font-weight:bold;">Em breve traremos maiores informações sobre a programação. Contamos com a sua presença no evento mais aguardado do ano.</p>

                            <p style="font-weight:bold;">Em caso de dúvidas entre em contato com Wylza através do e-mail: <a href="mailto:convencao@giraffas.com">convencao@giraffas.com</a> </p>
                            <br>

                            <h5 style="text-align:center; font-weight: bold" >Cláudio Miccieli</h5>

                            <h5 style="text-align:center; font-weight: bold">Diretor de Gestão</h5>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceito termos e condições!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="sk-fading-circle">
      <div class="sk-circle1 sk-circle"></div>
      <div class="sk-circle2 sk-circle"></div>
      <div class="sk-circle3 sk-circle"></div>
      <div class="sk-circle4 sk-circle"></div>
      <div class="sk-circle5 sk-circle"></div>
      <div class="sk-circle6 sk-circle"></div>
      <div class="sk-circle7 sk-circle"></div>
      <div class="sk-circle8 sk-circle"></div>
      <div class="sk-circle9 sk-circle"></div>
      <div class="sk-circle10 sk-circle"></div>
      <div class="sk-circle11 sk-circle"></div>
      <div class="sk-circle12 sk-circle"></div>
    </div>-->

@endsection