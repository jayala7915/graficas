@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Imagen</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Título: {{ $imagenSeccionMedia->titulo->descripcion_titulo }}</h5>
            <img src="{{ asset('storage/'.$imagenSeccionMedia->imagen) }}" alt="Imagen" class="img-fluid">
        </div>
    </div>
    
    <a href="{{ route('imagen-seccion-media.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection