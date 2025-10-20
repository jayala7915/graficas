@extends('layouts.app')

@section('content')
    <h2>Subir Nuevo Documento PDF</h2>
    
    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        
        <div class="mb-3">
            <label for="nombre_documento" class="form-label">Nombre del Documento</label>
            <input type="text" class="form-control" id="nombre_documento" name="nombre_documento" required>
        </div>
        
        <div class="mb-3">
            <label for="documento" class="form-label">Archivo PDF</label>
            <input type="file" class="form-control" id="documento" name="documento" accept=".pdf" required>
            <div class="form-text">Solo se permiten archivos PDF (máximo 2MB)</div>
        </div>
        
        <button type="submit" class="btn btn-primary">Subir Documento</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection