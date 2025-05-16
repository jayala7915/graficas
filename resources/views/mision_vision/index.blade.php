@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Misión y Visión</h1>
    <a href="{{ route('mision-vision.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>
    
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
                <th>Texto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($misionesVisiones as $item)
            <tr>
                <td>{{ $item->titulo->descripcion_titulo }}</td>
                <td>
                    <img src="{{ asset('storage/'.$item->imagen) }}" alt="Imagen" width="100">
                </td>
                <td>{{ Str::limit($item->texto, 50) }}</td>
                <td>
                    <a href="{{ route('mision-vision.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('mision-vision.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('mision-vision.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection