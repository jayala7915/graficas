@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de "Conoce Más"</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Título: {{ $conoceMas->titulo->descripcion_titulo }}</h5>
            <img src="{{ asset('storage/'.$conoceMas->imagen) }}" alt="Imagen" class="img-fluid mb-3">
            <h6>Texto Corto:</h6>
            <p class="card-text">{{ $conoceMas->texto_corto }}</p>
            <h6>Texto Largo:</h6>
            <div class="card-text">
                {!! $conoceMas->texto_largo !!}
            </div>
            <h6 class="mt-3">Ruta:</h6>
            <p>{{ $conoceMas->ruta }}</p>
        </div>
    </div>
    
    <a href="{{ route('conoce-mas.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection