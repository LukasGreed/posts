<?php

namespace LukasGreed\posts\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model {

    use SoftDeletes;

    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nm_categoria'];
    protected $filter = array(
        'id' => '',
        'nm_categoria' => '',
        'pagination' => '10',
        'relacao' => '',
        'ordem' => array('nm_categoria', 'asc')
    );

    public function getAll($data = array()) {

        $filter = array_merge($this->filter, $data);

        return $this->nome($filter['nm_categoria'])
                        ->ordem($filter['ordem'])
                        ->relacao($filter['relacao'])
                        ->Paginate($filter['pagination']);
    }

    public function posts() {
        return $this->belongsToMany('LukasGreed\posts\app\Models\Posts', 'post_categoria', 'id_categoria', 'id_post');
    }

    public function getOne($data = array()) {

        $filter = array_merge($this->filter, $data);

        return $this->relacao($filter['relacao'])
                        ->id($filter['id']);
    }

    public function scopeNome($query, $nome) {
        if ($nome)
            return $query->where('nm_categoria', 'like', '%' . $nome .'%');
    }

    public function scopeRelacao($query, $relacao) {
        if ($relacao)
            return $query->with($relacao);
    }

    public function scopeId($query, $id) {
        if ($id)
            return $query->find($id);
    }

    public function scopeOrdem($query, $ordem) {
        return $query->orderBy($ordem[0], $ordem[1]);
    }

}
