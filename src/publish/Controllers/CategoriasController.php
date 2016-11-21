<?php

namespace App\Http\Controllers;
/*
 * Caminho do package: vendor/lukasgreed/posts
 * 
 * Methods default: 
 * 
 * -index: Lista todos os registros. Aceita parametros para filtros enviados por get.
 * --url: api/categorias
 * --metodo: GET
 * --return: Array
 * 
 * -show: Busca um registro por id. Aceita parametro id enviado por get
 * --url: api/categorias/{id}
 * --metodo: GET 
 * --return Array
 * 
 * -save: Salva um novo registro. Parametros obrigatorios: nm_categoria
 * --url: api/categorias
 * --metodo: POST
 * --return: Boolean 
 * 
 * -edit: Altera um registro. Parametros obrigatorios: id, nm_categoria
 * --url: api/categorias
 * --metodo: PUT
 * --return: Boolean 
 * 
 * -destroy: excluir um registro. Parametros obrigatorios: id
 * --url: api/categorias/{id}
 * --metodo: DELETE
 * --return: Boolean 
 */

/*
 * Parametros aceitos, valores defaults e valores possiveis:
 * ---id => '', id valido
 * ---nm_categoria => '', valor string.
 * ---pagination => '10', valor int
 * ---relacao => '', valores aceitos:['posts': tras posts junto com as categorias] 
 * ---ordem => array('nm_categoria', 'asc'), valores aceitos:['nm_categoria','created_at','updated_at']['asc','desc'] 
 * 
 * --Exemplo de uso:
 * ---localhost/'seuprojeto'/api/categorias?relacao=posts&nm_categoria=teste
 * ----Tras as categorias que tenham teste no nome junto com seus respectivos posts
 */

class CategoriasController extends \LukasGreed\posts\app\Controllers\CategoriasController {

    public function __construct() {
        $this->middleware('auth', ['only' => ['save', 'edit', 'destroy']]);
        $this->model = new \App\Models\Categorias();
        $this->modelPosts = new \App\Models\Posts();
    }
}
