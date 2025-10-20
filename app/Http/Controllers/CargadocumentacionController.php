<?php

namespace App\Http\Controllers;

use App\Models\CargaDocumentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargaDocumentacionController extends Controller
{
    public function index()
    {
        $documentos = CargaDocumentacion::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_documento' => 'required|string|max:255',
            'documento' => 'required|mimes:pdf|max:2048',
        ]);

        $documentoPath = $request->file('documento')->store('documentos', 'public');

        CargaDocumentacion::create([
            'nombre_documento' => $request->nombre_documento,
            'documento' => $documentoPath,
        ]);

        return redirect()->route('documentos.index')->with('success', 'Documento subido correctamente.');
    }

    public function show(CargaDocumentacion $documento)
    {
        return response()->file(storage_path('app/public/' . $documento->documento));
    }

    public function edit($id)
{
    $documento = CargaDocumentacion::findOrFail($id);
    return view('documentos.edit', compact('documento'));
}

   public function update(Request $request, $id)
{
    $request->validate([
        'nombre_documento' => 'required|string|max:255',
        'documento' => 'nullable|mimes:pdf|max:2048',
    ]);

    $documento = CargaDocumentacion::findOrFail($id);
    
    $data = ['nombre_documento' => $request->nombre_documento];

    if ($request->hasFile('documento')) {
        // Eliminar el archivo antiguo
        Storage::disk('public')->delete($documento->documento);
        
        // Guardar el nuevo archivo
        $data['documento'] = $request->file('documento')->store('documentos', 'public');
    }

    $documento->update($data);

    return redirect()->route('documentos.index')->with('success', 'Documento actualizado correctamente.');
}

    public function destroy($id)
{
    try {
        $documento = CargaDocumentacion::findOrFail($id);
        
        // Eliminar el archivo físico
        Storage::disk('public')->delete($documento->documento);
        
        // Eliminar el registro de la base de datos
        $documento->delete();
        
        return redirect()->route('documentos.index')->with('success', 'Documento eliminado correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al eliminar el documento: '.$e->getMessage());
    }
}
}