@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Directorio</h1>
    
    <form action="{{ route('directorios.update', $directorio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control"  >
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}" {{ $directorio->titulo_id == $titulo->id ? 'selected' : '' }}>
                        {{ $titulo->descripcion_titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $directorio->nombre }}"  >
        </div>
        
        <div class="form-group mb-3">
            <label for="cargo">Cargo</label>
            <select name="cargo" id="cargo" class="form-control"  >
                @foreach($cargos as $cargo)
                    <option value="{{ $cargo }}" {{ $directorio->cargo == $cargo ? 'selected' : '' }}>
                        {{ $cargo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto">Texto</label>
            <textarea name="texto" id="texto" class="form-control" rows="3"  >{{ $directorio->texto }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto_descripcion_direc">Descripción</label>
            <textarea name="texto_descripcion_direc" id="texto_descripcion_direc" class="form-control" rows="3"  >{{ $directorio->texto_descripcion_direc }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="rango_pagina">Rango en Página</label>
            <select name="rango_pagina" id="rango_pagina" class="form-control"  >
                @foreach($rangosPagina as $rango)
                    <option value="{{ $rango }}" {{ $directorio->rango_pagina == $rango ? 'selected' : '' }}>
                        {{ $rango }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen Actual</label><br>
            <img src="{{ asset('storage/'.$directorio->imagen) }}" alt="Imagen actual" width="150" class="mb-2">
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('directorios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection