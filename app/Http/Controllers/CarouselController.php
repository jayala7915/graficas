<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::with('titulo')->latest()->get();
        return view('carousel.index', compact('carousels'));
    }

    public function create()
    {
        $titulos = Titulo::pluck('descripcion_titulo', 'id');
        return view('carousel.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        
        /*$request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'texto' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png',
            'ruta' => 'required|string|max:255',
            'texto_amplio_html' => 'required',
            'activo' => 'sometimes|boolean'
        ]);*/

        $imagePath = $request->file('imagen')->store('carousel', 'public');

               
        Carousel::create([
            'titulo_id' => $request->titulo_id,
            'texto' => $request->texto,
            'imagen' => $imagePath,
            'ruta' => $request->ruta,
            'texto_amplio_html' => $request->texto_amplio_html,
            'activo' => $request->has('activo')
        ]);

        return redirect()->route('carousel.index')->with('success', 'Item creado correctamente');
    }

    public function show(Carousel $carousel)
    {
        return view('carousel.show', compact('carousel'));
    }

    public function edit(Carousel $carousel)
    {
        $titulos = Titulo::pluck('descripcion_titulo', 'id');
        return view('carousel.edit', compact('carousel', 'titulos'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        /*$request->validate([
            'titulo_id' => 'required|exists:titulos,id',
            'texto' => 'required|string|max:255',
            'imagen' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'ruta' => 'required|string|max:255',
            'texto_amplio_html' => 'required',
            'activo' => 'sometimes|boolean'
        ]);*/

        $data = $request->only(['titulo_id', 'texto', 'ruta', 'texto_amplio_html']);
        $data['activo'] = $request->has('activo');

        if ($request->hasFile('imagen')) {
            Storage::delete('public/'.$carousel->imagen);
            $data['imagen'] = $request->file('imagen')->store('carousel', 'public');
        }

        $carousel->update($data);

        return redirect()->route('carousel.index')->with('success', 'Item actualizado correctamente');
    }

    public function destroy(Carousel $carousel)
    {
        Storage::delete('public/'.$carousel->imagen);
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Item eliminado correctamente');
    }
}