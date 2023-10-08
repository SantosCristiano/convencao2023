<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{

    protected $fillable = [

        'user_id', 'acompanhante', 'numeroacompanhantes', 'tipoacomodacao', 'transfer',
        'aeroporto', 'horario', 'horariovolta', 'observacoes'

    ];

    public $rules2 = [

        'acompanhante'              => 'required|min:1|max:2',
        'numeroacompanhantes'       => 'min:1|max:3',
        'tipoacomodacao'            => 'required|min:3|max:10',
        'transfer'                  => 'required|min:1|max:2',
        'aeroporto'                 => 'min:3|max:20',
        'horario'                   => 'min:2|max:10',
        'horariovolta'                   => 'min:2|max:10',
        /*'observacoes'                   => 'min:2',*/

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cadastro()
    {

        return $this->belongsTo('App\Models\Cadastro', 'user_id', 'id');

    }

}
