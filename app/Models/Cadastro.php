<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{

    protected $fillable = [

        'nome', 'rg', 'orgaoexpedidor', 'cpf', 'email', 'razaosocial',
        'cnpj', 'endereco', 'cidade', 'uf', 'cep', 'telefone', 'fixo', 'datanascimento'

    ];

    private $totalPage = 5;

    public function search(Array $data, $totalPage) {

        $cadastros =  $this->where(function ($query) use ($data) {

            if( isset($data['id']) ) {

                $query->where('razaosocial', 'LIKE', '%' . $data['id'] . '%');

            } elseif ( isset($data['uf']) ) {

                $query->where('uf', $data['uf']);

            }

        })->paginate($totalPage);

        return $cadastros;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagamento()
    {

        return $this->hasMany('App\Models\Pagamento');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Checkin()
    {

        return $this->hasMany('App\Models\Checkin');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Acompanhante()
    {

        return $this->hasMany('App\Models\Acompanhante');

    }


}
