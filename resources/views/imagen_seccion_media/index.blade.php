@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Imágenes de Sección Media</h1>
    <a href="{{ route('imagen-seccion-media.create') }}" class="btn btn-primary mb-3">Nueva Imagen</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imagenes as $imagen)
            <tr>
                <td>{{ $imagen->titulo->descripcion_titulo }}</td>
                <td>
                    <img src="{{ asset('storage/'.$imagen->imagen) }}" alt="Imagen" width="100">
                </td>
                <td>
                    <a href="{{ route('imagen-seccion-media.edit', $imagen->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('imagen-seccion-media.destroy', $imagen->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection