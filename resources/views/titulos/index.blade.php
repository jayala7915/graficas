@extends('layouts.app')

@section('title', 'Listado de Títulos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Listado de Títulos</h5>
            <a href="{{ route('titulos.create') }}" class="btn btn-primary">Nuevo Título</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($titulos as $titulo)
                    <tr>
                        <td>{{ $titulo->id }}</td>
                        <td>{!! Str::limit(strip_tags($titulo->descripcion_titulo), 50) !!}</td>
                        <td>
                            <a href="{{ route('titulos.show', $titulo->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('titulos.edit', $titulo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('titulos.destroy', $titulo->id) }}" method="POST" style="display: inline;">
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
    </div>
@endsection