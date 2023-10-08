<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cadastro;

class CadastroController extends Controller
{

    private $cadastro;

    public function __construct(Cadastro $cadastro) {
        $this->cadastro = $cadastro;
    }

    public function edit($id) {
        //return "Editar item {$id}";
        $cadastro = $this->cadastro->find($id);

        $title = "Editar cadastro: {cadastro->nome}";

        return view('admin.cadastros.create-edit', compact('cadastros', 'title'));
    }

    public function show($id) {
        return "Apresentando item {$id}";
    }
}
