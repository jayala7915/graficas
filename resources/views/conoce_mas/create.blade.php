@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Nuevo "Conoce Más"</h1>
    
    <form action="{{ route('conoce-mas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                <option value="">Seleccione un título</option>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}">{{ $titulo->descripcion_titulo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="texto_corto">Texto Corto</label>
            <input type="text" name="texto_corto" id="texto_corto" class="form-control" required maxlength="255">
        </div>
        
        <div class="mb-3">
            <label for="texto_largo" class="form-label">Contenido enriquecido</label>
            <textarea id="jodit-editor" name="texto_largo">{{ old('texto_largo') }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="ruta">Ruta</label>
            <input type="text" name="ruta" id="ruta" class="form-control" required>
            <small class="form-text text-muted">Ejemplo: 'nosotros' o 'servicios' (sin espacios ni caracteres especiales)</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('conoce-mas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
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