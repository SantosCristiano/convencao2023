<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\CadastroFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Acompanhante;
use App\Models\Pagamento;
use App\Models\Cadastro;
use App\Models\Checkin;

class SiteController extends Controller
{

    private $cadastro;
    private $checkin;
    private $pagamento;
    private $acompanhante;

    public function __construct(Cadastro $cadastro, Checkin $checkin, Pagamento $pagamento, Acompanhante $acompanhante) {

        $this->cadastro = $cadastro;
        $this->checkin = $checkin;
        $this->pagamento = $pagamento;
        $this->acompanhante = $acompanhante;

    }

    public function edit($id) {

        return "Editar item {$id}";

    }

    public function show($id) {

        return "Apresentando item {$id}";

    }

    public function index() {

        return view('site.home.index');

    }

    public function inscricao() {
        
        $single = Checkin::where('tipoacomodacao', '=', 'single')->get();

        $double = Checkin::where('tipoacomodacao', '=', 'double')->get();

        return view('site.inscricao.index', compact('single', 'double'));

        //return view('site.inscricao.index');

    }

    /**
     * @param CadastroFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cadastroStore(CadastroFormRequest $request) {

        $insert = $this->cadastro->create([

            'nome'              => $request->nome,
            'rg'                => $request->rg,
            'orgaoexpedidor'    => $request->expedidor,
            'cpf'               => $request->cpf,
            'email'             => $request->email,
            'razaosocial'       => $request->razaosocial,
            'cnpj'              => $request->cnpj,
            'endereco'          => $request->endereco,
            'cidade'            => $request->cidade,
            'uf'                => $request->uf,
            'cep'               => $request->cep,
            'telefone'          => $request->celular,
            'fixo'              => $request->fixo,
            'datanascimento'    => $request->datanascimento,

        ]);

        $this->checkin->create([

            'user_id'                   => $insert->id,
            'acompanhante'              => $request->levaracompanhante,
            'numeroacompanhantes'       => $request->acompanhantes,
            'tipoacomodacao'            => $request->acomodacao,
            'transfer'                  => $request->transfer,
            'aeroporto'                 => $request->aeroporto,
            'horario'                   => $request->horario,
            'horariovolta'              => $request->horariovolta,
            'observacoes'               => $request->observacoes,

        ]);

        $this->pagamento->create([

            'user_id'              => $insert->id,
            'valortotal'           => $request->valortotal,
            'formapagamento'       => $request->formapagamento,
            'valorparcelado'       => $request->valorparcelado,
            'vencimento'           => $request->datavencimento,

        ]);

        if ($request->acompanhantes == 1) {

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante1,
                'rgparticipante' => $request->rgparticipante1,
                'cpfparticipante' => $request->cpfparticipante1,
                'datanascimento' => $request->datanascimento1,
                'franqueadoparticipante' => $request->franqueadoparticipante1,
                'valorparticipante' => $request->valorparticipante1,

            ]);

        } elseif ($request->acompanhantes == 2) {

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante1,
                'rgparticipante' => $request->rgparticipante1,
                'cpfparticipante' => $request->cpfparticipante1,
                'datanascimento' => $request->datanascimento1,
                'franqueadoparticipante' => $request->franqueadoparticipante1,
                'valorparticipante' => $request->valorparticipante1,

            ]);

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante2,
                'rgparticipante' => $request->rgparticipante2,
                'cpfparticipante' => $request->cpfparticipante2,
                'datanascimento' => $request->datanascimento2,
                'franqueadoparticipante' => $request->franqueadoparticipante2,
                'valorparticipante' => $request->valorparticipante2,

            ]);

        } elseif ($request->acompanhantes == 3) {

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante1,
                'rgparticipante' => $request->rgparticipante1,
                'cpfparticipante' => $request->cpfparticipante1,
                'datanascimento' => $request->datanascimento1,
                'franqueadoparticipante' => $request->franqueadoparticipante1,
                'valorparticipante' => $request->valorparticipante1,

            ]);

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante2,
                'rgparticipante' => $request->rgparticipante2,
                'cpfparticipante' => $request->cpfparticipante2,
                'datanascimento' => $request->datanascimento2,
                'franqueadoparticipante' => $request->franqueadoparticipante2,
                'valorparticipante' => $request->valorparticipante2,

            ]);

            $this->acompanhante->create([

                'user_id' => $insert->id,
                'nomeparticipante' => $request->nomeparticipante3,
                'rgparticipante' => $request->rgparticipante3,
                'cpfparticipante' => $request->cpfparticipante3,
                'datanascimento' => $request->datanascimento3,
                'franqueadoparticipante' => $request->franqueadoparticipante3,
                'valorparticipante' => $request->valorparticipante3,

            ]);

        }

        /** E-mail cadastrado , do Cliente */
        $userEmail = $request->email;

        /** Numero de Acompanhantes */
        $mail['$Nacompanhantes'] =  $request->acompanhantes;

        /** DADOS CADASTRO CLIENTE */
        $mail['user_id'] = $insert->id;
        $mail['nome'] = $request->nome;
        $mail['rg'] = $request->rg;
        $mail['orgaoexpedidor'] = $request->expedidor;
        $mail['cpf'] = $request->cpf;
        $mail['email'] = $request->email;
        $mail['razaosocial'] = $request->razaosocial;
        $mail['cnpj'] = $request->cnpj;
        $mail['endereco'] = $request->endereco;
        $mail['cidade'] = $request->cidade;
        $mail['uf'] = $request->uf;
        $mail['cep'] = $request->cep;
        $mail['telefone'] = $request->celular;
        $mail['fixo'] = $request->fixo;

        /** DADOS CHECKIN */
        if ($request->levaracompanhante == 1) {

                $request->levaracompanhante = 'Sim';

        } else {

            $request->levaracompanhante = 'Não';

        }

        if ($request->transfer == 1) {

            $request->transfer = 'Sim';

        } else {

            $request->transfer = 'Não';

        }
        $mail['acompanhante'] = $request->levaracompanhante;
        $mail['numeroacompanhantes'] = $request->acompanhantes;
        $mail['tipoacomodacao'] = $request->acomodacao;
        $mail['transfer'] = $request->transfer;
        $mail['aeroporto'] = $request->aeroporto;
        $mail['horario'] = $request->horario;
        $mail['horariovolta'] = $request->horariovolta;
        $mail['observacoes'] = $request->observacoes;

        /** DADOS PAGAMENTO */
        $mail['valortotal'] = $request->valortotal;
        $mail['formapagamento'] = $request->formapagamento;
        $mail['valorparcelado'] = $request->valorparcelado;
        $mail['vencimento'] = $request->datavencimento;

        /** DADOS ACOMPANHANTES */
        /** 01 */
        if ($request->franqueadoparticipante1 == 1) {

            $request->franqueadoparticipante1 = 'Sim';

        } else {

            $request->franqueadoparticipante1 = 'Não';

        }
        $mail['nomeparticipante1'] = $request->nomeparticipante1;
        $mail['rgparticipante1'] = $request->rgparticipante1;
        $mail['cpfparticipante1'] = $request->cpfparticipante1;
        $mail['datanascimento1'] = $request->datanascimento1;
        $mail['franqueadoparticipante1'] = $request->franqueadoparticipante1;
        $mail['valorparticipante1'] = $request->valorparticipante1;

        /** 02 */
        if ($request->franqueadoparticipante2 == 1) {

            $request->franqueadoparticipante2 = 'Sim';

        } else {

            $request->franqueadoparticipante2 = 'Não';

        }
        $mail['nomeparticipante2'] = $request->nomeparticipante2;
        $mail['rgparticipante2'] = $request->rgparticipante2;
        $mail['cpfparticipante2'] = $request->cpfparticipante2;
        $mail['datanascimento2'] = $request->datanascimento2;
        $mail['franqueadoparticipante2'] = $request->franqueadoparticipante2;
        $mail['valorparticipante2'] = $request->valorparticipante2;

        /** 03 */
        if ($request->franqueadoparticipante3 == 1) {

            $request->franqueadoparticipante3 = 'Sim';

        } else {

            $request->franqueadoparticipante3 = 'Não';

        }
        $mail['nomeparticipante3'] = $request->nomeparticipante3;
        $mail['rgparticipante3'] = $request->rgparticipante3;
        $mail['cpfparticipante3'] = $request->cpfparticipante3;
        $mail['datanascimento3'] = $request->datanascimento3;
        $mail['franqueadoparticipante3'] = $request->franqueadoparticipante3;
        $mail['valorparticipante3'] = $request->valorparticipante3;

        $cadastros = Cadastro::where('id', '=', $insert->id)->get();

       
            \PDF::loadView('admin.pdf.cadastros', compact('mail', 'cadastros')) 
            // formato a4 retrato: ->setPaper('a4', 'landscape')
                //->download('cadastros.pdf');
                ->setPaper('a4', 'landscape')
                ->save('storage/pdf/' . $userEmail . 'convencao2019.pdf');
                //->stream();

            Mail::send('admin.email.email', ['mail' => $mail], function($message) use ($userEmail) {

                $enderecos = [
                    $userEmail
                ];
    
                $message->to($enderecos);
                $message->bcc('teckins@gmail.com');
                $message->subject('Giraffas Convenção 2023');
                $message->attach('storage/pdf/' . $userEmail . 'convencao2019.pdf', [
                    'as' => 'Giraffas Convenção 2023.pdf',
                    'mime' => 'application/pdf'
                ]);
                
            });        
    
            return view('admin.email.emailReturn');

    }

}