<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acompanhante;
use App\Models\Pagamento;
use App\Models\Cadastro;
use App\Models\Checkin;

class ReportController extends Controller
{
    /**
     * @var int
     */
    private $totalPage = 5;

    public function index(Cadastro $cadastro) {

        $cadastros = $cadastro->paginate($this->totalPage);

        return view('admin.report.index', compact('cadastros'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkin() {

        $checkins = Checkin::where('id', '>', '0')->paginate($this->totalPage);

        return view('admin.report.checkin', compact('checkins'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pagamento(Pagamento $pagamento) {

       /*
       $pagts = Pagamento::where([
            ['pagamentos.id', '>', '0'],
            ])->join('cadastros', 'pagamentos.user_id', '=', 'cadastros.id');
        $pagamentos = $pagts->paginate($this->totalPage);
       */

        $pagamentos = $pagamento->paginate($this->totalPage);

        return view('admin.report.pagamento', compact('pagamentos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function acompanhante(Acompanhante $acompanhante) {

        $acompanhantes = $acompanhante->paginate($this->totalPage);

        return view('admin.report.acompanhante', compact('acompanhantes'));
    }

    public function searchReport(Request $request, Cadastro $cadastro) {

        $dataForm = $request->all();

        $cadastros = $cadastro->search($dataForm, $this->totalPage);

        return view('admin.report.index', compact('cadastros'));
    }

}