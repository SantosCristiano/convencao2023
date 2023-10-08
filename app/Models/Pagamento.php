<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [

        'user_id', 'valortotal', 'formapagamento', 'valorparcelado', 'vencimento'

    ];

    public $rules3 = [

        //'valortotal'           => 'required|min:1|max:10',
        'formapagamento'       => 'required|min:1|max:11',
        //'valorparcelado'       => 'required|min:3|max:10',
        //'vencimento'           => 'required|min:1|max:10',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cadastro()
    {

        return $this->belongsTo('App\Models\Cadastro', 'user_id', 'id');

    }

}
