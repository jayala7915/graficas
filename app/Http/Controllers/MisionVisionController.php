<?php

namespace App\Http\Controllers;

use App\Models\MisionVision;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MisionVisionController extends Controller
{
    public function index()
    {
        $misionesVisiones = MisionVision::with('titulo')->get();
        return view('mision_vision.index', compact('misionesVisiones'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('mision_vision.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto' => 'required|string'
        ]);

        $imagenPath = $request->file('imagen')->store('mision_vision', 'public');

        MisionVision::create([
            'titulo_id' => $request->titulo_id,
            'imagen' => $imagenPath,
            'texto' => $request->texto
        ]);

        return redirect()->route('mision-vision.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    public function show(MisionVision $misionVision)
    {
        return view('mision_vision.show', compact('misionVision'));
    }

    public function edit(MisionVision $misionVision)
    {
        $titulos = Titulo::all();
        return view('mision_vision.edit', compact('misionVision', 'titulos'));
    }

    public function update(Request $request, MisionVision $misionVision)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'texto' => 'required|string'
        ]);

        $data = [
            'titulo_id' => $request->titulo_id,
            'texto' => $request->texto
        ];

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior
            Storage::disk('public')->delete($misionVision->imagen);
            
            // Guardar la nueva imagen
            $data['imagen'] = $request->file('imagen')->store('mision_vision', 'public');
        }

        $misionVision->update($data);

        return redirect()->route('mision-vision.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy(MisionVision $misionVision)
    {
        Storage::disk('public')->delete($misionVision->imagen);
        $misionVision->delete();

        return redirect()->route('mision-vision.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}