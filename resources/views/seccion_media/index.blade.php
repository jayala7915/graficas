@extends('layouts.app')

@section('title', 'Secciones Media')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Secciones Media</h6>
            @if(App\Models\SeccionMedia::canCreateMore())
                <a href="{{ route('seccion-media.create') }}" class="btn btn-primary btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
            @endif
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($secciones->isEmpty())
                <div class="alert alert-info">
                    No hay secciones creadas aún.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Texto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($secciones as $seccion)
                            <tr>
                                <td>{{ $seccion->titulo_seccion }}</td>
                                <td>{{ Str::limit($seccion->texto, 100) }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('seccion-media.show', $seccion->id) }}" class="btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('seccion-media.edit', $seccion->id) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('seccion-media.destroy', $seccion->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta sección?')">
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
            @endif
        </div>
    </div>
</div>
@endsection