<?php

namespace App\Http\Controllers;

use App\Models\ConoceMas;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConoceMasController extends Controller
{
    public function index()
    {
        $conoceMas = ConoceMas::with('titulo')->get();
        return view('conoce_mas.index', compact('conoceMas'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('conoce_mas.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto_corto' => 'required|string|max:255',
            'texto_largo' => 'required|string',
            'ruta' => 'required|string|unique:conoce_mas,ruta'
        ]);*/

        $imagenPath = $request->file('imagen')->store('conoce_mas', 'public');

        ConoceMas::create([
            'titulo_id' => $request->titulo_id,
            'imagen' => $imagenPath,
            'texto_corto' => $request->texto_corto,
            'texto_largo' => $request->texto_largo, // HTML del editor
            'ruta' => $request->ruta
        ]);

        return redirect()->route('conoce-mas.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    public function show(ConoceMas $conoceMas)
    {
        return view('conoce_mas.show', compact('conoceMas'));
    }

    public function edit(ConoceMas $conoceMas)
    {
        $titulos = Titulo::all();
        return view('conoce_mas.edit', compact('conoceMas', 'titulos'));
    }

    public function update(Request $request, ConoceMas $conoceMas)
    {
        /*$request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto_corto' => 'required|string|max:255',
            'texto_largo' => 'required|string',
            'ruta' => 'required|string|unique:conoce_mas,ruta,'.$conoceMas->id
        ]);*/

        $data = [
            'titulo_id' => $request->titulo_id,
            'texto_corto' => $request->texto_corto,
            'texto_largo' => $request->texto_largo, // HTML del editor
            'ruta' => $request->ruta
        ];

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($conoceMas->imagen);
            $data['imagen'] = $request->file('imagen')->store('conoce_mas', 'public');
        }

        $conoceMas->update($data);

        return redirect()->route('conoce-mas.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy(ConoceMas $conoceMas)
    {
        Storage::disk('public')->delete($conoceMas->imagen);
        $conoceMas->delete();

        return redirect()->route('conoce-mas.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}