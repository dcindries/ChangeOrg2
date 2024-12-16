<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use Illuminate\Http\Request;

class AdminPeticionesController extends Controller
{

    public function index()
    {
        $peticiones = Peticione::with(['user', 'categoria'])->get();
        return view('admin.peticiones.index', compact('peticiones'));
    }


    public function show($id)
    {
        $peticion = Peticione::with('categoria')->findOrFail($id);
        return view('admin.peticiones.show', compact('peticion'));
    }


    public function delete($id)
    {
        $peticion = Peticione::findOrFail($id);
        $peticion->delete();
        return redirect()->route('adminpeticiones.index')->with('success', 'Petición eliminada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $peticion = Peticione::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'destinatario' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|max:2048',
            'estado' => 'required|in:pendiente,aceptada',
        ]);

        $peticion->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('peticiones', 'public');
            $peticion->imagen = $path;
        }

        $peticion->save();

        return redirect()->route('adminpeticiones.index')->with('success', 'Petición actualizada correctamente.');
    }

    public function edit($id)
    {
        $peticion = Peticione::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.peticiones.edit', compact('peticion', 'categorias'));
    }
}

