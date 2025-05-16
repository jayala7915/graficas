@extends('layouts.app')

@section('title', 'Administrar Carousel')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Items del Carousel</h5>
            <a href="{{ route('carousel.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Item
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Texto</th>
                            <th>Ruta</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carousels as $item)
                        <tr>
                            <td><img src="{{ asset('storage/'.$item->imagen) }}" width="80" class="img-thumbnail"></td>
                            <td>{{ $item->titulo->descripcion_titulo }}</td>
                            <td>{{ Str::limit($item->texto, 30) }}</td>
                            <td><code>{{ $item->ruta }}</code></td>
                            <td>
                                @if($item->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('carousel.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('carousel.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este item?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection