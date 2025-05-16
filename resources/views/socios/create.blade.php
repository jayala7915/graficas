@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Socio</h1>
    
    <form action="{{ route('socios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="socio">Nombre del Socio</label>
            <input type="text" name="socio" id="socio" class="form-control" required maxlength="100">
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required maxlength="20">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required maxlength="100">
                </div>
            </div>
        </div>
        
        <div class="form-group mb-3">
            <label for="ubicacion">Ubicación</label>
            <textarea name="ubicacion" id="ubicacion" class="form-control" rows="3" required></textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="pagina_web">Página Web</label>
            <input type="url" name="pagina_web" id="pagina_web" class="form-control" placeholder="https://ejemplo.com" required maxlength="255">
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required>
            <small class="form-text text-muted">Formatos aceptados: jpeg, png, jpg, gif. Tamaño máximo: 2MB</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('socios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection