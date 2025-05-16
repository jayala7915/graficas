@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nueva Imagen</h1>
    
    <form action="{{ route('imagen-seccion-media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                <option value="">Seleccione un título</option>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->descripcion_titulo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control-file" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('imagen-seccion-media.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection