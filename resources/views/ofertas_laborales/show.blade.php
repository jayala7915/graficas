@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detalles de la Oferta Laboral</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Socio:</h5>
                    <p>{{ $ofertas_laborale->socio->socio }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Puesto ofertado:</h5>
                    <p>{{ $ofertas_laborale->puesto_oferta }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Número de vacantes:</h5>
                    <p>{{ $ofertas_laborale->numero_vacantes }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Tipo de vacante:</h5>
                    <p>{{ ucfirst($ofertas_laborale->tipo_vacante) }}</p>
                </div>
            </div>

            <div class="mb-3">
                <h5>Descripción de la vacante:</h5>
                <div class="border p-3">
                    {!! $ofertas_laborale->descripcion_vacante !!}
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('ofertas-laborales.index') }}" class="btn btn-secondary">Volver</a>
                <div>
                    <a href="{{ route('ofertas-laborales.edit', $ofertas_laborale->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ofertas-laborales.destroy', $ofertas_laborale->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection