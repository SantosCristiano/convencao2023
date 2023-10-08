<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class appController extends Controller
{
    public function index(){
        //apresentar a view inicial da aplicação
        return view('admin.email.index');
    }

    public function enviarEmail(){
        //enviar email
        //Mail::to('cristiano.souza@giraffas.com')->send(new OrderShipped());
        //return 'Email enviado com sucesso!';

        Mail::send('admin.email.email', [], function($message){

            $enderecos = ['cristiano.souza@giraffas.com'];

            $message->to($enderecos);
            $message->bcc('convencao2019@giramail.com');
            $message->subject('Giraffas Convenção 2019');
            $message->attach('pdf/convencao2019.pdf', [
                        'as' => 'Giraffas Convenção 2019.pdf',
                        'mime' => 'application/pdf'
                        ]);
            
        });

        return view('admin.email.email');
        
    }
}
