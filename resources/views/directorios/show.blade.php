@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Directorio</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$directorio->imagen) }}" alt="Imagen" class="img-fluid mb-3">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title">{{ $directorio->nombre }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $directorio->cargo }}</h6>
                    <p class="card-text"><strong>Título:</strong> {{ $directorio->titulo->descripcion_titulo }}</p>
                    <p class="card-text"><strong>Rango en Página:</strong> 
                        <span class="badge bg-{{ 
                            $directorio->rango_pagina == 'Cabecera' ? 'primary' : 
                            ($directorio->rango_pagina == 'Medio' ? 'success' : 'info') 
                        }}">
                            {{ $directorio->rango_pagina }}
                        </span>
                    </p>
                    <p class="card-text"><strong>Texto:</strong> {{ $directorio->texto }}</p>
                    <p class="card-text"><strong>Descripción:</strong> {{ $directorio->texto_descripcion_direc }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('directorios.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection