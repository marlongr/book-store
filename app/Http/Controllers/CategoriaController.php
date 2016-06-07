<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Categoria;

class CategoriaController extends Controller {

    function getCategoria($id = null) {
        if ($id == null) {
            $models['categorias'] = Categoria::all();
            return view('frente.categorias', $models);
        }
        
        // se um id foi passado
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
        return view('frente.produtos-categoria', $models);
    }

}
