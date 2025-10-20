<?php

namespace App\Http\Controllers;

use App\Models\OfertaLaboral;
use App\Models\Socio;
use Illuminate\Http\Request;

class OfertaLaboralController extends Controller
{
    public function index()
    {
        $ofertas = OfertaLaboral::with('socio')->latest()->paginate(10);
        return view('ofertas_laborales.index', compact('ofertas'));
    }

    public function create()
    {
        $socios = Socio::all();
        return view('ofertas_laborales.create', compact('socios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'socio_id' => 'required|exists:socios,id',
            'puesto_oferta' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1',
            'tipo_vacante' => 'required|in:presencial,semi-presencial,remoto',
            'descripcion_vacante' => 'required',
        ]);

        OfertaLaboral::create($request->all());

        return redirect()->route('ofertas-laborales.index')
            ->with('success', 'Oferta laboral creada exitosamente.');
    }

    public function show(OfertaLaboral $ofertas_laborale)
    {
        return view('ofertas_laborales.show', compact('ofertas_laborale'));
    }

    public function edit(OfertaLaboral $ofertas_laborale)
    {
        $socios = Socio::all();
        return view('ofertas_laborales.edit', compact('ofertas_laborale', 'socios'));
    }

    public function update(Request $request, OfertaLaboral $ofertas_laborale)
    {
        $request->validate([
            'socio_id' => 'required|exists:socios,id',
            'puesto_oferta' => 'required|string|max:255',
            'numero_vacantes' => 'required|integer|min:1',
            'tipo_vacante' => 'required|in:presencial,semi-presencial,remoto',
            'descripcion_vacante' => 'required',
        ]);

        $ofertas_laborale->update($request->all());

        return redirect()->route('ofertas-laborales.index')
            ->with('success', 'Oferta laboral actualizada exitosamente.');
    }

    public function destroy(OfertaLaboral $ofertas_laborale)
    {
        $ofertas_laborale->delete();

        return redirect()->route('ofertas-laborales.index')
            ->with('success', 'Oferta laboral eliminada exitosamente.');
    }
}