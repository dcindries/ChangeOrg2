<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    private function store(Request $request){
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
    ]);
    if ($validator->fails()) {
    return response()->json($validator->messages(), 400);
    }
    $category = Categoria::create([
        'nombre' => $request->get('nombre'),
    ]);
    return response()->json(['message'=> 'Categoria creada', 'data'=> $category  ],200);
}
}
