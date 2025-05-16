@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>
    
    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="titulo_id">Título</label>
            <select name="titulo_id" id="titulo_id" class="form-control" required>
                @foreach($titulos as $titulo)
                    <option value="{{ $titulo->id }}" {{ $servicio->titulo_id == $titulo->id ? 'selected' : '' }}>
                        {{ $titulo->descripcion_titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="imagen">Imagen Actual</label><br>
            <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="Imagen actual" width="150" class="mb-2">
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small class="form-text text-muted">Dejar en blanco para mantener la imagen actual</small>
        </div>
        
        <div class="form-group mb-3">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ $servicio->url }}" required>
        </div>
        
        <div class="mb-3">
            <label for="texto_enriquesido_html" class="form-label">Contenido enriquecido</label>
            <textarea id="jodit-editor" name="texto_enriquesido_html">{{ $servicio->texto_enriquesido_html }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
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