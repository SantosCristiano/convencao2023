<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cadastro;

class ExportPdfController extends Controller
{
    public function pdfInscritos()
{
    $cadastros = Cadastro::all();
 
    \PDF::loadView('admin.pdf.cadastros', compact('cadastros'))
                // formato a4 retrato: ->setPaper('a4', 'landscape')
                //->download('cadastros.pdf');
                //->setPaper('a3', 'landscape')
                ->save('storage/pdf/convencao2019.pdf');
                //->stream();
}
}
