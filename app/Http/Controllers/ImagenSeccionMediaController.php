<?php

namespace App\Http\Controllers;

use App\Models\ImagenSeccionMedia;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenSeccionMediaController extends Controller
{
    public function index()
    {
        $imagenes = ImagenSeccionMedia::with('titulo')->get();
        return view('imagen_seccion_media.index', compact('imagenes'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('imagen_seccion_media.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagenPath = $request->file('imagen')->store('imagen_media', 'public');

        ImagenSeccionMedia::create([
            'titulo_id' => $request->titulo_id,
            'imagen' => $imagenPath
        ]);

        return redirect()->route('imagen-seccion-media.index')
            ->with('success', 'Imagen creada exitosamente.');
    }

    public function show(ImagenSeccionMedia $imagenSeccionMedia)
    {
        return view('imagen_seccion_media.show', compact('imagenSeccionMedia'));
    }

    public function edit(ImagenSeccionMedia $imagenSeccionMedia)
    {
        $titulos = Titulo::all();
        return view('imagen_seccion_media.edit', compact('imagenSeccionMedia', 'titulos'));
    }

    public function update(Request $request, ImagenSeccionMedia $imagenSeccionMedia)
    {
        $request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = ['titulo_id' => $request->titulo_id];

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior
            Storage::disk('public')->delete($imagenSeccionMedia->imagen);
            
            // Guardar la nueva imagen
            $data['imagen'] = $request->file('imagen')->store('imagen_media', 'public');
        }

        $imagenSeccionMedia->update($data);

        return redirect()->route('imagen-seccion-media.index')
            ->with('success', 'Imagen actualizada exitosamente.');
    }

    public function destroy(ImagenSeccionMedia $imagenSeccionMedia)
    {
        Storage::disk('public')->delete($imagenSeccionMedia->imagen);
        $imagenSeccionMedia->delete();

        return redirect()->route('imagen-seccion-media.index')
            ->with('success', 'Imagen eliminada exitosamente.');
    }
}