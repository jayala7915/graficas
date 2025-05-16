@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conoce Más</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('conoce-mas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Registro
        </a>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0" style="width: fit-content;">
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
                            <th width="15%">Título</th>
                            <th width="15%">Imagen</th>
                            <th width="20%">Texto Corto</th>
                            <th width="15%">Ruta</th>
                            <th width="25%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($conoceMas as $item)
                        <tr>
                            <td>{{ $item->titulo->descripcion_titulo }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->imagen) }}" alt="Imagen" class="img-thumbnail" width="80">
                            </td>
                            <td>{{ Str::limit($item->texto_corto, 50) }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $item->ruta }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('conoce-mas.show', $item->id) }}" class="btn btn-sm btn-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('conoce-mas.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('conoce-mas.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No se encontraron registros</td>
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

<!-- Incluir Font Awesome para los íconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Incluir Bootstrap JS para el alert dismissible -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection