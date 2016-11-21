<?php

namespace LukasGreed\posts\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model {

    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    protected $fillable = ['nm_titulo',
        'ds_conteudo'];
    
    protected $filter = array(
        'id' => '',
        'nm_titulo' => '',
        'ds_conteudo' => '',
        'id_categoria' => '',
        'nm_categoria' => '',
        'pagination' => '10',
        'relacao' => '',
        'ordem' => array('nm_titulo', 'asc')
    );

    public function categorias() {
        return $this->belongsToMany('LukasGreed\posts\app\Models\Categorias', 'post_categoria', 'id_post', 'id_categoria');
    }

    public function getAll($data = array()) {

        $filter = array_merge($this->filter, $data);

        return $this->titulo($filter['nm_titulo'])
                        ->relacao($filter['relacao'])
                        ->conteudo($filter['ds_conteudo'])
                        ->idCategoria($filter['id_categoria'])
                        ->nmCategoria($filter['nm_categoria'])
                        ->ordem($filter['ordem'])
                        ->Paginate($filter['pagination']);
    }

    public function getOne($data = array()) {

        $filter = array_merge($this->filter, $data);

        return $this->relacao($filter['relacao'])
                ->id($filter['id']);                                                
    }

    public function scopeId($query, $id) {
        if ($id)
            return $query->find($id);
    }
    
    public function scopeRelacao($query, $relacao) {
        if ($relacao)
            return $query->with($relacao);
    }

    public function scopeTitulo($query, $titulo) {
        if ($titulo)
            return $query->where('nm_titulo', 'like', '%' . $titulo . '%');
    }

    public function scopeIdCategoria($query, $id) {
        if ($id)
            return $query->whereHas('categorias', function($q)use($id) {
                        $q->where('categorias.id_categoria', $id);
                    });
    }

    public function scopeNmCategoria($query, $nm_categoria) {
        if ($nm_categoria)
            return $query->whereHas('categorias', function($q)use($nm_categoria) {
                        $q->where('categorias.nm_categoria', 'like', '%' . $nm_categoria . '%');
                    });
    }

    public function scopeConteudo($query, $conteudo) {
        if ($conteudo)
            return $query->where('ds_conteudo', 'like', '%"' . $conteudo . '"%');
    }

    public function scopeOrdem($query, $ordem) {
        return $query->orderBy($ordem[0], $ordem[1]);
    }

}
