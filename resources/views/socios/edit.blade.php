@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Socio</h1>
    
    <form action="{{ route('socios.update', $socio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="socio">Nombre del Socio</label>
            <input type="text" name="socio" id="socio" class="form-control" value="{{ $socio->socio }}" required maxlength="100">
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $socio->telefono }}" required maxlength="20">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" value="{{ $socio->correo }}" required maxlength="100">
                </div>
            </div>
        </div>
        
        <div class="form-group mb-3">
            <label for="ubicacion">Ubicación</label>
            <textarea name="ubicacion" id="ubicacion" class="form-control" rows="3" required>{{ $socio->ubicacion }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="pagina_web">Página Web</label>
            <input type="url" name="pagina_web" id="pagina_web" class="form-control" value="{{ $socio->pagina_web }}" required maxlength="255">
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen Actual</label><br>
            <img src="{{ asset('storage/'.$socio->imagen) }}" alt="Imagen actual" width="150" class="mb-2">
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('socios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection