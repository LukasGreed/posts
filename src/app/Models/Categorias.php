<?php

namespace LukasGreed\posts\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model {

    use SoftDeletes;

    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nm_categoria'];

    public function getAll($data = array()) {

        $filter = array_merge(array(
            'nm_categoria' => '',
            'pagination' => '10',
            'ordem' => array('nm_categoria', 'asc')
                ), $data);

        return $this->nome($filter['nm_categoria'])
                        ->ordem($filter['ordem'])
                        ->Paginate($filter['pagination']);
    }

    public function scopeNome($query, $nome) {
        if ($nome)
            return $query->where('nm_categoria', $nome);
    }

    public function scopeOrdem($query, $ordem) {
        return $query->orderBy($ordem[0], $ordem[1]);
    }

}
