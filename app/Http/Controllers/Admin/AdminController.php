<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cadastro;
use App\Models\Checkin;
use App\Models\Pagamento;
use App\Models\Acompanhante;

class AdminController extends Controller
{
    public function index ()
    {
        $cadastros = Cadastro::where('id', '>', '0')->get();

        $checkins = Checkin::where('transfer', '=', '1')->get();

        $pagamentos = Pagamento::where('valortotal', '>', '0')->get();

        $acompanhantes = Acompanhante::where('id', '>', '0')->get();

        return view('admin.home.index', compact('cadastros', 'checkins', 'pagamentos', 'acompanhantes'));
    }
}
