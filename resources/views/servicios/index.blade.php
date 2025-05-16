@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Servicios</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('servicios.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Servicio
        </a>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Título</th>
                            <th>Imagen</th>
                            <th>URL</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->titulo->descripcion_titulo }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="Imagen" class="img-thumbnail" width="80">
                            </td>
                            <td>
                                <a href="{{ $servicio->url }}" target="_blank">{{ Str::limit($servicio->url, 30) }}</a>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-sm btn-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No se encontraron servicios</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .img-thumbnail {
        max-height: 60px;
        object-fit: cover;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection