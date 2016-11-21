<?php

namespace LukasGreed\posts\app\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['save', 'edit', 'destroy']]);
        $this->modelCategorias = new \LukasGreed\posts\app\Models\Categorias();
        $this->model = new \LukasGreed\posts\app\Models\Posts();
    }

    public function index() {
        return \Response::json($this->model->getAll(Input::all())->toArray());
    }

    public function show($id) {
        $filter = Input::all();
        $filter['id'] = $id;
        return \Response::json($this->model->getAll($filter)->toArray());
    }

    public function save() {
        $data = Input::all();
        $post = $this->model->find($id);
        $post->create([
                    'nm_titulo' => $data['nm_titulo'],
                    'ds_conteudo' => $data['ds_conteudo'],
                ])
                ->save();
        return \Response::json(array('success' => true));
    }

    public function edit($id) {
        $data = Input::all();
        $post = $this->model->find($id);
        $post->update([
                    'nm_titulo' => $data['nm_titulo'],
                    'ds_conteudo' => $data['ds_conteudo'],
                ])
                ->push();
        return \Response::json(array('success' => true));
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'nm_titulo' => 'required|max:300',
                    'ds_conteudo' => 'required',
        ]);
    }

}
