@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Imagen</h1>
    
    <form action="{{ route('imagen-seccion-media.update', $imagenSeccionMedia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}" {{ $imagenSeccionMedia->titulo_id == $titulo->id ? 'selected' : '' }}>
                        {{ $titulo->descripcion_titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="imagen">Imagen Actual</label><br>
            <img src="{{ asset('storage/'.$imagenSeccionMedia->imagen) }}" alt="Imagen actual" width="150" class="mb-2">
            <input type="file" name="imagen" id="imagen" class="form-control-file">
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('imagen-seccion-media.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection