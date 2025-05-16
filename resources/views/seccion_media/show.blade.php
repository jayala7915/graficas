@extends('layouts.app')

@section('title', 'Ver Sección Media')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalles de la Sección</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5>Título:</h5>
                <p>{{ $seccionMedia->titulo_seccion }}</p>
            </div>
            
            <div class="mb-3">
                <h5>Texto:</h5>
                <p>{{ $seccionMedia->texto }}</p>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('seccion-media.edit', $seccionMedia->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Editar
                </a>
                <a href="{{ route('seccion-media.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection