<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peticione;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class PeticioneController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peticiones = Peticione::orderBy('created_at', 'desc')->get();
        return view('peticiones.index', compact('peticiones'));
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('peticiones.create', compact('categorias'));
    }
    public function listMine()
    {
        $user = Auth::user();
        $peticiones = Peticione::where('user_id', $user->id)->get();
        return view('peticiones.mine', compact('peticiones'));
    }

    public function show($id)
    {
        $peticion = Peticione::findOrFail($id);
        return view('peticiones.show', compact('peticion'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        try {
            $input = $request->only(['titulo', 'descripcion', 'destinatario', 'categoria_id']);
            $input['user_id'] = Auth::id();
            $input['firmantes'] = 0;
            $input['estado'] = 'pendiente';
            $peticion = Peticione::create($input);
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('peticiones', 'public');
                $peticion->imagen = $path;
                $peticion->save();
            }
            return redirect()->route('peticiones.mine')->with('success', 'Petición creada con éxito.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function store2(Request $request)
    {
            $this->validate($request, [
                'titulo' => 'required|max:255',
                'descripcion' => 'required',
                'destinatario' => 'required',
                'categoria_id' => 'required',
// 'file' => 'required',
            ]);
            $input = $request->all();
            $category = Categoria::findOrFail($request->input('categoria_id'));
            $user = 1; //harcodeamos el usuario
//$user = Auth::user(); //asociarlo al usuario authenticado
            $peticion = new Peticione($input);
            $peticion->user()->associate($user);
            $peticion->categoria()->associate($category);
            $peticion->firmantes = 0;
            $peticion->estado = 'pendiente';
            $peticion->save();
            return $peticion;
}

    public function firmar($id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            $user = Auth::user();
            $firmas = $peticion->firmas;
            foreach ($firmas as $firma) {
                if ($firma->id == $user->id) {
                    return back()->withError( "Ya has firmado esta petición")->withInput();
                }
            }
            $user_id = [$user->id];
            $peticion->firmas()->attach($user_id);
            $peticion->firmantes = $peticion->firmantes + 1;
            $peticion->save();
        }
        catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
        }
        return redirect()->back();
        }
    public function peticionesFirmadas(Request $request)
    {
        try {
            $id = Auth::id();
            $usuario = User::findOrFail($id);
            $peticiones = $usuario->firmas;
        }catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
}
        return view('peticiones.index', compact('peticiones'));
    }


    public function cambiarEstado(Request $request, $id)
    {
        $peticion = Peticione::findOrFail($id);
        $peticion->estado = 'aceptada';
        $peticion->save();
        return $peticion;
    }

    public function delete($id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            if ($peticion->imagen_nombre) {
                $imagePath = public_path('storage/peticiones/' . $peticion->imagen_nombre);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $peticion->delete();
            return redirect()->route('peticiones.mine')->with('success', 'Petición eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('peticiones.mine')->with('error', 'Error al eliminar la petición.');
        }
    }



}

