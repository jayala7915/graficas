@extends('layouts.app')

@section('title', 'Editar Título')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Editar Título #{{ $titulo->id }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('titulos.update', $titulo->id) }}">
                @csrf
                @method('PUT')
                

                <div class="mb-3">
                   <label for="texto" class="form-label">Descripcion del Titulo</label>
                   <input type="text" class="form-control" id="descripcion_titulo" name="descripcion_titulo" value="{{ old('descripcion_titulo', $titulo->descripcion_titulo) }}" required>
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Contenido enriquecido</label>
                    <textarea id="jodit-editor" name="titulo" class="form-control">{{ old('titulo', $titulo->titulo) }}</textarea>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('titulos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Incluir Jodit desde CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.js"></script>

<!-- Incluir FontAwesome para íconos (opcional) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    // Inicializar editor con el contenido existente
    const editor = new Jodit('#jodit-editor', {
        height: 500,
        toolbarAdaptive: false,
        toolbarSticky: true,
        buttons: [
            'bold', 'italic', 'underline', 'strikethrough',
            '|', 'fontsize', 'font','brush', 'paragraph',
            '|', 'align', 'ul', 'ol', 'outdent', 'indent',
            '|', 'link', 'image', 'table', 'hr',
            '|', 'undo', 'redo', 'eraser',
            '|', 'fullsize', 'preview'
        ],
        uploader: {
            url: '{{ route("upload.image") }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            format: 'json',
            imagesExtensions: ['jpg', 'png', 'jpeg', 'gif'],
            filesVariableName: 'file'
        },
        imageDefaultWidth: 300,
        editHTMLDocumentMode: false,
        spellcheck: true,
        language: 'es',
        placeholder: 'Escribe tu contenido aquí...',
        iframe: true,
        iframeStyle: 'html{margin:0;padding:0;min-height: 0;}',
        disablePlugins: ['paste', 'stat'],
        showXPathInStatusbar: false
    });
</script>

<style>
    /* Estilos adicionales para mejor visualización */
    .jodit-container:not(.jodit_inline) {
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
    }
    .jodit-toolbar__box:not(:empty) {
        border-radius: 0.375rem 0.375rem 0 0 !important;
    }
    .jodit-status-bar {
        border-radius: 0 0 0.375rem 0.375rem !important;
    }
</style>
@endsection