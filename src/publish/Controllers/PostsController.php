<?php

namespace App\Http\Controllers;

/*
 * Caminho do package: vendor/lukasgreed/posts
 *  
 * Methods default: 
 * 
 * -index: Lista todos os registros. Aceita parametros para filtros enviados por get.
 * --url: api/posts
 * --metodo: GET
 * --return: Array
 * 
 * -show: Busca um registro por id. Aceita parametro id enviado por get
 * --url: api/posts/{id}
 * --metodo: GET 
 * --return Array
 * 
 * -save: Salva um novo registro. Parametros obrigatorios: nm_categoria
 * --url: api/posts
 * --metodo: POST
 * --return: Boolean 
 * 
 * -edit: Altera um registro. Parametros obrigatorios: id, nm_categoria
 * --url: api/posts
 * --metodo: PUT
 * --return: Boolean 
 * 
 * -destroy: excluir um registro. Parametros obrigatorios: id
 * --url: api/posts/{id}
 * --metodo: DELETE
 * --return: Boolean 
 */

/*
 * Parametros aceitos, valores defaults e valores possiveis:
 * ---id => '', id valido
 * ---id_categoria => '', valor int.
 * ---nm_categoria => '', valor string.
 * ---nm_titulo => '', valor string.
 * ---ds_conteudo => '', valor string.
 * ---pagination => '10', valor int
 * ---relacao => '', valores aceitos:['categorias': tras posts junto com as categorias] 
 * ---ordem => array('nm_posts', 'asc'), valores aceitos:['todos os atributos']['asc','desc'] 
 * 
 * --Exemplo de uso:
 * ---localhost/'seuprojeto'/api/posts?relacao=categorias&nm_categoria=teste
 * ----Tras os posts que sejam de qualquer categoria que tenha "teste" no nome junto com suas respectivas categorias.
 */

class PostsController extends \LukasGreed\posts\app\Controllers\CategoriasController {

}