<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    public function index()
    {
        $titulos = Titulo::latest()->get();
        return view('titulos.index', compact('titulos'));
    }

    public function create()
    {
        return view('titulos.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required',
    ]);

    // Limpiar el HTML para prevenir XSS
    $cleanHtml = clean($request->titulo);

    Titulo::create(['descripcion_titulo' => $request->descripcion_titulo,
                    'titulo' => $cleanHtml]);

    return redirect()->route('titulos.index')
                     ->with('success', 'Título creado correctamente');
}



    public function show(Titulo $titulo)
    {
        return view('titulos.show', compact('titulo'));
    }

    public function edit(Titulo $titulo)
    {
        return view('titulos.edit', compact('titulo'));
    }

    public function update(Request $request, Titulo $titulo)
{
    $request->validate([
        'titulo' => 'required',
    ]);

    // Limpiar el HTML para prevenir XSS
    $cleanHtml = clean($request->titulo);

    $titulo->update(['descripcion_titulo' => $request->descripcion_titulo,
        'titulo' => $cleanHtml]);

    return redirect()->route('titulos.index')
                     ->with('success', 'Título actualizado correctamente');
}
    public function destroy(Titulo $titulo)
    {
        $titulo->delete();

        return redirect()->route('titulos.index')
                         ->with('success', 'Título eliminado correctamente');
    }
}