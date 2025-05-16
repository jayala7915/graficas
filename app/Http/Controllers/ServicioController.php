<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('titulo')->get();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('servicios.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto_enriquesido_html' => 'required|string',
            'url' => 'required|string'
        ]);

        $imagenPath = $request->file('imagen')->store('servicios', 'public');

        Servicio::create([
            'titulo_id' => $request->titulo_id,
            'imagen' => $imagenPath,
            'texto_enriquesido_html' => $request->texto_enriquesido_html,
            'url' => $request->url
        ]);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        $titulos = Titulo::all();
        return view('servicios.edit', compact('servicio', 'titulos'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto_enriquesido_html' => 'required|string',
            'url' => 'required|string'
        ]);

        $data = [
            'titulo_id' => $request->titulo_id,
            'texto_enriquesido_html' => $request->texto_enriquesido_html,
            'url' => $request->url
        ];

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($servicio->imagen);
            $data['imagen'] = $request->file('imagen')->store('servicios', 'public');
        }

        $servicio->update($data);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy(Servicio $servicio)
    {
        Storage::disk('public')->delete($servicio->imagen);
        $servicio->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado exitosamente.');
    }
}