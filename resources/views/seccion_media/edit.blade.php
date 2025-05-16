@extends('layouts.app')

@section('title', 'Editar Sección Media')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar Sección Media</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('seccion-media.update', $seccionMedia->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="titulo_seccion" class="form-label">Título de la Sección</label>
                            <input type="text" class="form-control" id="titulo_seccion" name="titulo_seccion" 
                                   value="{{ old('titulo_seccion', $seccionMedia->titulo_seccion) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="texto" class="form-label">Texto</label>
                            <textarea class="form-control" id="texto" name="texto" rows="5" required>{{ old('texto', $seccionMedia->texto) }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Actualizar
                            </button>
                            <a href="{{ route('seccion-media.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection