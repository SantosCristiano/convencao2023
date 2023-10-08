<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acompanhante extends Model
{

    protected $fillable = [

        'user_id', 'nomeparticipante', 'rgparticipante', 'cpfparticipante',
        'datanascimento', 'franqueadoparticipante', 'valorparticipante'

        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cadastro()
    {

        return $this->belongsTo('App\Models\Cadastro', 'user_id', 'id');

    }

}
