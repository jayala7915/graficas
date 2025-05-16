@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Historia</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Título: {{ $historiasEmpresa->titulo->descripcion_titulo }}</h5>
            <img src="{{ asset('storage/'.$historiasEmpresa->imagen) }}" alt="Imagen" class="img-fluid mb-3">
            <h6>Texto:</h6>
            <p class="card-text">{{ $historiasEmpresa->texto }}</p>
        </div>
    </div>
    
    <a href="{{ route('historias-empresa.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection