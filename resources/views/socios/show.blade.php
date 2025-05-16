@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Socio</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$socio->imagen) }}" alt="Imagen" class="img-fluid mb-3">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title">{{ $socio->socio }}</h5>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $socio->telefono }}</p>
                    <p class="card-text"><strong>Correo:</strong> {{ $socio->correo }}</p>
                    <p class="card-text"><strong>Ubicación:</strong> {{ $socio->ubicacion }}</p>
                    <p class="card-text"><strong>Página Web:</strong> <a href="{{ $socio->pagina_web }}" target="_blank">{{ $socio->pagina_web }}</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('socios.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection