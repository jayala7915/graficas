@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detalles del Título</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Contenido:</label>
                <div class="border p-3 bg-light">
                    {!! $titulo->titulo !!}
                </div>
            </div>
            <a href="{{ route('titulos.edit', $titulo->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('titulos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection