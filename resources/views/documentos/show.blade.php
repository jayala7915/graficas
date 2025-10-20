@extends('layouts.app')

@section('title', 'Detalles de Empresa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detalles de la Empresa</h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-3 text-center">
                @if($datosEmpresa->logo_empresa)
                    <img src="{{ $datosEmpresa->logo_empresa }}" alt="Logo" class="img-fluid mb-3" style="max-height: 150px;">
                @else
                    <div class="bg-light p-5 text-center text-muted">
                        <i class="fas fa-image fa-3x"></i>
                        <p class="mt-2">Sin logo</p>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h2>{{ $datosEmpresa->nombre }}</h2>
                @if($datosEmpresa->eslogan_empresa)
                    <p class="lead">{{ $datosEmpresa->eslogan_empresa }}</p>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Información de Contacto</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Dirección:</strong> {{ $datosEmpresa->direccion }}
                    </li>
                    <li class="list-group-item">
                        <strong>Correo:</strong> {{ $datosEmpresa->correo }}
                    </li>
                    <li class="list-group-item">
                        <strong>Teléfono Fijo:</strong> {{ $datosEmpresa->telefono_fijo }}
                    </li>
                    <li class="list-group-item">
                        <strong>Teléfono Móvil:</strong> {{ $datosEmpresa->telefono_movil }}
                    </li>
                    <li class="list-group-item">
                        <strong>Sitio Web:</strong> 
                        @if($datosEmpresa->direccion_pagina)
                            <a href="{{ $datosEmpresa->direccion_pagina }}" target="_blank">{{ $datosEmpresa->direccion_pagina }}</a>
                        @else
                            No especificado
                        @endif
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <h5>Redes Sociales</h5>
                @if($datosEmpresa->redes_sociales && count($datosEmpresa->redes_sociales) > 0)
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($datosEmpresa->redes_sociales as $red)
                            @if($red['activa'] ?? false)
                                <a href="{{ $red['url'] }}" target="_blank" class="btn btn-outline-primary btn-lg" 
                                   title="{{ ucfirst($red['icono']) }}" data-bs-toggle="tooltip">
                                    <i class="fab fa-{{ $red['icono'] }}"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">No hay redes sociales configuradas</div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('datos-empresa.index') }}" class="btn btn-secondary me-2">Volver</a>
            <a href="{{ route('datos-empresa.edit', $datosEmpresa->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>


@push('scripts')
<script>
    // Inicializar tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
@endsection