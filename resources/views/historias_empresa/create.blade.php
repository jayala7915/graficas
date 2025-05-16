@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Historia</h1>
    
    <form action="{{ route('historias-empresa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                <option value="">Seleccione un título</option>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->descripcion_titulo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" rows="5" required></textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('historias-empresa.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection