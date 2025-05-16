@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Misión/Visón</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Título: {{ $misionVision->titulo->descripcion_titulo }}</h5>
            <img src="{{ asset('storage/'.$misionVision->imagen) }}" alt="Imagen" class="img-fluid mb-3">
            <p class="card-text">{{ $misionVision->texto }}</p>
        </div>
    </div>
    
    <a href="{{ route('mision-vision.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection