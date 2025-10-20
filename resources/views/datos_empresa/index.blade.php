@extends('layouts.app')

@section('title', 'Datos de Empresas')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Listado de Datos de Empresas</h5>
        <a href="{{ route('datos-empresa.create') }}" class="btn btn-primary btn-sm">Agregar Empresa</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfonos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datosEmpresas as $empresa)
                    <tr>
                        <td>
                            @if($empresa->logo_empresa)
                                <img src="{{ $empresa->logo_empresa }}" alt="Logo" width="50">
                            @else
                                <span class="text-muted">Sin logo</span>
                            @endif
                        </td>
                        <td>{{ $empresa->nombre }}</td>
                        <td>{{ $empresa->correo }}</td>
                        <td>
                            <div>Fijo: {{ $empresa->telefono_fijo }}</div>
                            <div>Móvil: {{ $empresa->telefono_movil }}</div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('datos-empresa.show', $empresa->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('datos-empresa.edit', $empresa->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('datos-empresa.destroy', $empresa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay empresas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection