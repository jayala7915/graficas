@extends('layouts.app')

@section('content')
    <h2>Editar Documento</h2>
    
    <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre_documento" class="form-label">Nombre del Documento</label>
            <input type="text" class="form-control" id="nombre_documento" name="nombre_documento" 
                   value="{{ $documento->nombre_documento }}" required>
        </div>
        
        <div class="mb-3">
            <label for="documento" class="form-label">Archivo PDF (Actualizar)</label>
            <input type="file" class="form-control" id="documento" name="documento" accept=".pdf">
            <div class="form-text">Dejar en blanco para mantener el archivo actual</div>
            <div class="mt-2">
                <small>Documento actual: {{ basename($documento->documento) }}</small>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Documento</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection