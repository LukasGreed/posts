<?php

namespace LukasGreed\posts\app\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoriasController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['save', 'edit', 'destroy']]);
        $this->model = new \LukasGreed\posts\app\Models\Categorias();
        $this->modelPosts = new \LukasGreed\posts\app\Models\Posts();
    }

    public function index() {
        return \Response::json($this->model->getAll()->toArray());
    }

    public function show($id) {
        $filter = Input::all();
        $filter['id'] = $id;
        return \Response::json($this->model->getOne($filter)->toArray());
    }

    public function save() {
        $data = Input::all();
        $categoria = $this->model->find($id);
        $categoria->create([
                    'nm_categoria' => $data['nm_categoria'],
                ])
                ->save();
        return \Response::json(array('success' => true));
    }

    public function edit($id) {
        $data = Input::all();
        $categoria = $this->model->find($id);
        $categoria->update([
                    'nm_categoria' => $data['nm_categoria'],
                ])
                ->push();
        return \Response::json(array('success' => true));
    }

}
