@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Directorio</h1>
    
    <form action="{{ route('directorios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control"  >
                <option value="">Seleccione un título</option>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->descripcion_titulo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"  >
        </div>
        
        <div class="form-group mb-3">
            <label for="cargo">Cargo</label>
            <select name="cargo" id="cargo" class="form-control"  >
                <option value="">Seleccione un cargo</option>
                @foreach($cargos as $cargo)
                    <option value="{{ $cargo }}">{{ $cargo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" rows="3"  ></textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto_descripcion_direc">Descripción</label>
            <textarea name="texto_descripcion_direc" id="texto_descripcion_direc" class="form-control" rows="3"  ></textarea>
        </div>
        
        <div class="form-group mb-3">
    <label for="rango_pagina">Rango en Página</label>
    <select name="rango_pagina" id="rango_pagina" class="form-control" required>
        @foreach($rangosDisponibles as $rango)
            <option value="{{ $rango }}">{{ $rango }}</option>
        @endforeach
    </select>
</div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control"  >
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('directorios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection