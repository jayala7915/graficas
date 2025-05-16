@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Servicio</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="Imagen" class="img-fluid mb-3">
                    <p><strong>URL:</strong> <a href="{{ $servicio->url }}" target="_blank">{{ $servicio->url }}</a></p>
                </div>
                <div class="col-md-8">
                    <h5 class="card-title">{{ $servicio->titulo->descripcion_titulo }}</h5>
                    <div class="card-text">
                        {!! $servicio->texto_enriquesido_html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('servicios.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection