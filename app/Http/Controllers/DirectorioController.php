<?php

namespace App\Http\Controllers;

use App\Models\Directorio;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorioController extends Controller
{
    public function index()
    {
        $directorios = Directorio::with('titulo')->get();
        return view('directorios.index', compact('directorios'));
    }

    /*public function create()
    {
        $titulos = Titulo::all();
        $cargos = Directorio::$cargos;
        $rangosPagina = Directorio::$rangosPagina;
        return view('directorios.create', compact('titulos', 'cargos', 'rangosPagina'));
    }
*/

public function create()
{
    $titulos = Titulo::all();
    $cargos = Directorio::$cargos;
    
    // Obtener todos los rangos disponibles
    $rangosDisponibles = Directorio::$rangosPagina;
    
    // Si ya existe un registro con Cabecera, lo eliminamos del array
    if (Directorio::where('rango_pagina', 'Cabecera')->exists()) {
        $rangosDisponibles = array_diff($rangosDisponibles, ['Cabecera']);
    }
    
    return view('directorios.create', compact('titulos', 'cargos', 'rangosDisponibles'));
}

    public function store(Request $request)
    {
       /* $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'texto' => 'required|string',
            'texto_descripcion_direc' => 'required|string',
            'rango_pagina' => 'required|in:Cabecera,Medio,Carousel'
        ]);*/

        $imagenPath = $request->file('imagen')->store('directorios', 'public');

        Directorio::create([
            'titulo_id' => $request->titulo_id,
            'imagen' => $imagenPath,
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'texto' => $request->texto,
            'texto_descripcion_direc' => $request->texto_descripcion_direc,
            'rango_pagina' => $request->rango_pagina
        ]);

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio creado exitosamente.');
    }

    public function show(Directorio $directorio)
    {
        return view('directorios.show', compact('directorio'));
    }

    public function edit(Directorio $directorio)
    {
        $titulos = Titulo::all();
        $cargos = Directorio::$cargos;
        $rangosPagina = Directorio::$rangosPagina;
        return view('directorios.edit', compact('directorio', 'titulos', 'cargos', 'rangosPagina'));
    }

    public function update(Request $request, Directorio $directorio)
    {
       /* $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'texto' => 'required|string',
            'texto_descripcion_direc' => 'required|string',
            'rango_pagina' => 'required|in:Cabecera,Medio,Carousel'
        ]);*/

        $data = [
            'titulo_id' => $request->titulo_id,
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'texto' => $request->texto,
            'texto_descripcion_direc' => $request->texto_descripcion_direc,
            'rango_pagina' => $request->rango_pagina
        ];

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($directorio->imagen);
            $data['imagen'] = $request->file('imagen')->store('directorios', 'public');
        }

        $directorio->update($data);

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio actualizado exitosamente.');
    }

    public function destroy(Directorio $directorio)
    {
        Storage::disk('public')->delete($directorio->imagen);
        $directorio->delete();

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio eliminado exitosamente.');
    }
}