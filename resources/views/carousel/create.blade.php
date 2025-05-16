@extends('layouts.app')

@section('title', 'Nuevo Item de Carousel')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Crear Nuevo Item</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('carousel.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="titulo_id" class="form-label">Título (Seleccione de la lista)</label>
                        <select class="form-select" id="titulo_id" name="titulo_id" required>
                            <option value="">Seleccione un título</option>
                            @foreach($titulos as $id => $descripcion_titulo)
                                <option value="{{ $id }}" {{ old('titulo_id') == $id ? 'selected' : '' }}>{{ $descripcion_titulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="texto" class="form-label">Texto breve</label>
                        <input type="text" class="form-control" id="texto" name="texto" value="{{ old('texto') }}" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ruta" class="form-label">Ruta/Identificador</label>
                        <input type="text" class="form-control" id="ruta" name="ruta" value="{{ old('ruta') }}" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="texto_amplio_html" class="form-label">Contenido enriquecido</label>
                    <textarea id="jodit-editor" name="texto_amplio_html">{{ old('texto_amplio_html') }}</textarea>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="activo" name="activo" checked>
                    <label class="form-check-label" for="activo">Activo</label>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                    <a href="{{ route('carousel.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Incluir Jodit desde CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.js"></script>

<script>
    // Inicializar editor
    const editor = new Jodit('#jodit-editor', {
        height: 400,
        toolbarAdaptive: false,
        toolbarSticky: true,
        buttons: [
            'bold', 'italic', 'underline', 'strikethrough',
            '|', 'fontsize', 'font','brush', 'paragraph',
            '|', 'align', 'ul', 'ol', 'outdent', 'indent',
            '|', 'link', 'image', 'table', 'hr',
            '|', 'undo', 'redo', 'eraser',
            '|', 'fullsize'

            
        ],
        uploader: {
            url: '{{ route("upload.image") }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
@endsection