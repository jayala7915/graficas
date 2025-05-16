<?php

namespace App\Http\Controllers;

use App\Models\SeccionMedia;
use Illuminate\Http\Request;

class SeccionMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkMaxRecords')->only(['create', 'store']);
    }

    public function index()
    {
        $secciones = SeccionMedia::latest()->get();
        return view('seccion_media.index', compact('secciones'));
    }

    public function create()
    {
        if (!SeccionMedia::canCreateMore()) {
            abort(403, 'No se pueden crear más de 3 registros');
        }
        return view('seccion_media.create');
    }

    public function store(Request $request)
    {
        if (!SeccionMedia::canCreateMore()) {
            abort(403, 'No se pueden crear más de 3 registros');
        }

        $request->validate([
            'titulo_seccion' => 'required|string|max:255',
            'texto' => 'required|string'
        ]);

        SeccionMedia::create($request->all());

        return redirect()->route('seccion-media.index')
                         ->with('success', 'Sección creada correctamente');
    }

    public function show(SeccionMedia $seccionMedia)
{
    return view('seccion_media.show', compact('seccionMedia'));
}

    public function edit(SeccionMedia $seccionMedia)
    {
        return view('seccion_media.edit', compact('seccionMedia'));
    }

    public function update(Request $request, SeccionMedia $seccionMedia)
    {
        $request->validate([
            'titulo_seccion' => 'required|string|max:255',
            'texto' => 'required|string'
        ]);

        $seccionMedia->update($request->all());

        return redirect()->route('seccion-media.index')
                         ->with('success', 'Sección actualizada correctamente');
    }

    public function destroy(SeccionMedia $seccionMedia)
    {
        $seccionMedia->delete();

        return redirect()->route('seccion-media.index')
                         ->with('success', 'Sección eliminada correctamente');
    }
}