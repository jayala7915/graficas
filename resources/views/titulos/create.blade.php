@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ isset($titulo) ? route('titulos.update', $titulo->id) : route('titulos.store') }}">
        @csrf
        @if(isset($titulo))
            @method('PUT')
        @endif
        
        <div class="mb-3">
           <label for="descripcion_titulo" class="form-label">Descripcion breve titulo</label>
           <input type="text" class="form-control" id="descripcion_titulo" name="descripcion_titulo" value="{{ old('descripcion_titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Contenido enriquecido</label>
            <textarea id="jodit-editor" name="titulo" class="form-control">{{ isset($titulo) ? $titulo->titulo : old('titulo') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
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