@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Misión/Visón</h1>
    
    <form action="{{ route('mision-vision.update', $misionVision->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}" {{ $misionVision->titulo_id == $titulo->id ? 'selected' : '' }}>
                        {{ $titulo->descripcion_titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen Actual</label><br>
            <img src="{{ asset('storage/'.$misionVision->imagen) }}" alt="Imagen actual" width="150" class="mb-2">
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" rows="5" required>{{ $misionVision->texto }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('mision-vision.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection