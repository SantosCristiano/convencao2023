<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cadastro;
use Excel;
use DB;

class ExportExcelController extends Controller
{

    function excelInscritos() {

        $cadastros = DB::table('cadastros')->get()->toArray();

        $customer_array[] = array(
            'NOME', 'DATA DE NASCIMENTO', 'RG', 'ORGAO EXPEDITOR', 'CPF', 'E-MAIL', 'RAZAO SOCIAL',
            'CNPJ', 'ENDERECO', 'CIDADE', 'UF', 'CEP', 'TELEFONE', 'FIXO'
        );

         foreach($cadastros as $cadastro) {

            $customer_array[] = array(

                'NOME'                  => $cadastro->nome,
                'DATA DE NASCIMENTO'    => $cadastro->datanascimento,
                'RG'                    => $cadastro->rg, 
                'ORGAO EXPEDITOR'       => $cadastro->orgaoexpedidor,
                'CPF'                   => $cadastro->cpf, 
                'E-MAIL'                => $cadastro->email,
                'RAZAO SOCIAL'          => $cadastro->razaosocial,
                'CNPJ'                  => $cadastro->cnpj, 
                'ENDERECO'              => $cadastro->endereco,
                'CIDADE'                => $cadastro->cidade,
                'UF'                    => $cadastro->uf, 
                'CEP'                   => $cadastro->cep, 
                'TELEFONE'              => $cadastro->telefone,
                'FIXO'                  => $cadastro->fixo

            );

         }

         Excel::create('InscritosExported', function($excel) use ($customer_array) {

            $excel->sheet('Inscritos', function($sheet) use ($customer_array) {

                $sheet->fromArray($customer_array, null, 'A1', false, false);

            });

         })->download('xlsx');

    }

    function excelTransfer() {

        $checkins = DB::table('checkins')->get()->toArray();

        $customer_array[] = array(
            'NOME', 'CPF', 'RAZAO SOCIAL', 'CNPJ', 'ESTADO', 'ACOMPANHANTE', 'NUMERO DE ACOMPANHANTES',
            'TIPO ACOMODACAO', 'TRANSFER', 'AEROPORTO', 'HORARIO', 'HORARIO DE VOLTA', 'OBSERVACOES'
        );

        foreach($checkins as $checkin) {

            if ($checkin->acompanhante == 1) {

                $checkin->acompanhante = 'Sim';

            } else {

                $checkin->acompanhante = 'Não';

            }

            if ($checkin->transfer == 1) {

                $checkin->transfer = 'Sim';

            } else {

                $checkin->transfer = 'Não';

            }

            $inscrito = Cadastro::where('id', '=', $checkin->user_id)->first();

            $customer_array[] = array(

                'NOME'                      => $inscrito->nome,
                'CPF'                       => $inscrito->cpf,
                'RAZAO SOCIAL'              => $inscrito->razaosocial,
                'CNPJ'                      => $inscrito->cnpj,
                'ESTADO'                    => $inscrito->uf,
                'ACOMPANHANTE'              => $checkin->acompanhante,
                'NUMERO DE ACOMPANHANTES'   => $checkin->numeroacompanhantes,
                'TIPO ACOMODACAO'           => $checkin->tipoacomodacao,
                'TRANSFER'                  => $checkin->transfer,
                'AEROPORTO'                 => $checkin->aeroporto,
                'HORARIO CHECKIN'           => $checkin->horario,
                'HORARIO CHECKOUT'          => $checkin->horariovolta,
                'OBSERVACOES'               => $checkin->observacoes
            );

        }

        Excel::create('TransferExported', function($excel) use ($customer_array) {

            $excel->sheet('Transfer', function($sheet) use ($customer_array) {

                $sheet->fromArray($customer_array, null, 'A1', false, false);

            });

        })->download('xlsx');

    }

    function excelFinanceiro() {

        $pagamentos = DB::table('pagamentos')->get()->toArray();

        $customer_array[] = array(
            'NOME', 'CPF', 'RAZAO SOCIAL', 'CNPJ', 'ESTADO', 'VALOR TOTAL',
            'NUMERO DE PAGAMENTO', 'VALOR PARCELADO', 'VENCIMENTO'
        );

        foreach($pagamentos as $pagamento) {

            $inscrito = Cadastro::where('id', '=', $pagamento->user_id)->first();

            $customer_array[] = array(

                'NOME'                      => $inscrito->nome,
                'CPF'                       => $inscrito->cpf,
                'RAZAO SOCIAL'              => $inscrito->razaosocial,
                'CNPJ'                      => $inscrito->cnpj,
                'ESTADO'                    => $inscrito->uf,
                'VALOR TOTAL'              => 'R$ ' . number_format($pagamento->valortotal,2,',','.'),
                'NUMERO DE PAGAMENTO'      => $pagamento->formapagamento,
                'VALOR PARCELADO'          => 'R$ ' . number_format($pagamento->valorparcelado,2,',','.'),
                'VENCIMENTO'               => $pagamento->vencimento

            );

        }

        Excel::create('FinanceiroExported', function($excel) use ($customer_array) {

            $excel->sheet('Financeiro', function($sheet) use ($customer_array) {

                $sheet->fromArray($customer_array, null, 'A1', false, false);

            });

        })->download('xlsx');

    }

    function excelAcompanhante() {

        $acompanhantes = DB::table('acompanhantes')->get()->toArray();

        $customer_array[] = array(
            'NOME', 'CPF', 'RAZAO SOCIAL', 'CNPJ', 'ESTADO', 'NOME ACOMPANHANTE', 'RG ACOMPANHANTE',
            'CPF ACOMPANHANTE', 'DATA DE NASCIMENTO', 'FRANQUEADO', 'VALOR'
        );

        foreach($acompanhantes as $acompanhante) {

            if ($acompanhante->franqueadoparticipante == 1) {

                $acompanhante->franqueadoparticipante = 'Sim';

            } else {

                $acompanhante->franqueadoparticipante = 'Não';

            }

            $inscrito = Cadastro::where('id', '=', $acompanhante->user_id)->first();

            $customer_array[] = array(

                'NOME'                      => $inscrito->nome,
                'CPF'                       => $inscrito->cpf,
                'RAZAO SOCIAL'              => $inscrito->razaosocial,
                'CNPJ'                      => $inscrito->cnpj,
                'ESTADO'                    => $inscrito->uf,
                'NOME ACOMPANHANTE'         => $acompanhante->nomeparticipante,
                'RG ACOMPANHANTE'           => $acompanhante->rgparticipante,
                'CPF ACOMPANHANTE'          => $acompanhante->cpfparticipante,
                'DATA DE NASCIMENTO'        => $acompanhante->datanascimento,
                'FRANQUEADO'                => $acompanhante->franqueadoparticipante,
                'VALOR'                     => 'R$ ' . number_format($acompanhante->valorparticipante,2,',','.')

            );

        }

        Excel::create('AcompanhanteExported', function($excel) use ($customer_array) {

            $excel->sheet('Acompanhante', function($sheet) use ($customer_array) {

                $sheet->fromArray($customer_array, null, 'A1', false, false);

            });

        })->download('xlsx');

    }

}