@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ofertas Laborales</h1>
        <a href="{{ route('ofertas-laborales.create') }}" class="btn btn-primary">Nueva Oferta</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Socio</th>
                    <th>Puesto</th>
                    <th>Vacantes</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->id }}</td>
                    <td>{{ $oferta->socio->socio }}</td>
                    <td>{{ $oferta->puesto_oferta }}</td>
                    <td>{{ $oferta->numero_vacantes }}</td>
                    <td>{{ ucfirst($oferta->tipo_vacante) }}</td>
                    <td>
                        <a href="{{ route('ofertas-laborales.show', $oferta->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('ofertas-laborales.edit', $oferta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('ofertas-laborales.destroy', $oferta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $ofertas->links() }}
</div>
@endsection