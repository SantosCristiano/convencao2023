<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->view('admin.email.email');
    }
}
