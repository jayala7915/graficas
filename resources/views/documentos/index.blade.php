@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h2>Documentos PDF</h2>
        <a href="{{ route('documentos.create') }}" class="btn btn-primary">Subir Nuevo Documento</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($documentos as $documento)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $documento->nombre_documento }}</h5>
                        <a href="#" onclick="showPdfInModal('{{ asset('storage/' . $documento->documento) }}')" 
                           class="card-button">Ver más</a>
                        
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('¿Estás seguro de eliminar este documento?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection