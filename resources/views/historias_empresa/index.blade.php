@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historias de la Empresa</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('historias-empresa.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Historia
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
                            <th width="20%">Título</th>
                            <th width="20%">Imagen</th>
                            <th width="40%">Texto</th>
                            <th width="20%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($historias as $historia)
                        <tr>
                            <td>{{ $historia->titulo->descripcion_titulo }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$historia->imagen) }}" alt="Imagen" class="img-thumbnail" width="80">
                            </td>
                            <td>{{ Str::limit($historia->texto, 100) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('historias-empresa.show', $historia->id) }}" class="btn btn-sm btn-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('historias-empresa.edit', $historia->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('historias-empresa.destroy', $historia->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta historia?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No se encontraron historias</td>
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