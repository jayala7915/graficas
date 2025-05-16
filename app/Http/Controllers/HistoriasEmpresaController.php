<?php

namespace App\Http\Controllers;

use App\Models\HistoriasEmpresa;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoriasEmpresaController extends Controller
{
    public function index()
    {
        $historias = HistoriasEmpresa::with('titulo')->get();
        return view('historias_empresa.index', compact('historias'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('historias_empresa.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'texto' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagenPath = $request->file('imagen')->store('historias_empresa', 'public');

        HistoriasEmpresa::create([
            'titulo_id' => $request->titulo_id,
            'texto' => $request->texto,
            'imagen' => $imagenPath
        ]);

        return redirect()->route('historias-empresa.index')
            ->with('success', 'Historia creada exitosamente.');
    }

    public function show(HistoriasEmpresa $historiasEmpresa)
    {
        return view('historias_empresa.show', compact('historiasEmpresa'));
    }

    public function edit(HistoriasEmpresa $historiasEmpresa)
    {
        $titulos = Titulo::all();
        return view('historias_empresa.edit', compact('historiasEmpresa', 'titulos'));
    }

    public function update(Request $request, HistoriasEmpresa $historiasEmpresa)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'texto' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'titulo_id' => $request->titulo_id,
            'texto' => $request->texto
        ];

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($historiasEmpresa->imagen);
            $data['imagen'] = $request->file('imagen')->store('historias_empresa', 'public');
        }

        $historiasEmpresa->update($data);

        return redirect()->route('historias-empresa.index')
            ->with('success', 'Historia actualizada exitosamente.');
    }

    public function destroy(HistoriasEmpresa $historiasEmpresa)
    {
        Storage::disk('public')->delete($historiasEmpresa->imagen);
        $historiasEmpresa->delete();

        return redirect()->route('historias-empresa.index')
            ->with('success', 'Historia eliminada exitosamente.');
    }
}