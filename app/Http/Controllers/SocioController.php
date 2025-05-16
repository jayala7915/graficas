<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();
        return view('socios.index', compact('socios'));
    }

    public function create()
    {
        return view('socios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'socio' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'ubicacion' => 'required|string',
            'pagina_web' => 'required|url|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagenPath = $request->file('imagen')->store('socios', 'public');

        Socio::create([
            'socio' => $request->socio,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'ubicacion' => $request->ubicacion,
            'pagina_web' => $request->pagina_web,
            'imagen' => $imagenPath
        ]);

        return redirect()->route('socios.index')
            ->with('success', 'Socio creado exitosamente.');
    }

    public function show(Socio $socio)
    {
        return view('socios.show', compact('socio'));
    }

    public function edit(Socio $socio)
    {
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, Socio $socio)
    {
        $request->validate([
            'socio' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:100',
            'ubicacion' => 'required|string',
            'pagina_web' => 'required|url|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'socio' => $request->socio,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'ubicacion' => $request->ubicacion,
            'pagina_web' => $request->pagina_web
        ];

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($socio->imagen);
            $data['imagen'] = $request->file('imagen')->store('socios', 'public');
        }

        $socio->update($data);

        return redirect()->route('socios.index')
            ->with('success', 'Socio actualizado exitosamente.');
    }

    public function destroy(Socio $socio)
    {
        Storage::disk('public')->delete($socio->imagen);
        $socio->delete();

        return redirect()->route('socios.index')
            ->with('success', 'Socio eliminado exitosamente.');
    }
}