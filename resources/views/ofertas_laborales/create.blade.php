@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Oferta Laboral</h1>

    <form method="POST" action="{{ route('ofertas-laborales.store') }}">
        @csrf

        <div class="mb-3">
            <label for="socio_id" class="form-label">Socio</label>
            <select class="form-select" id="socio_id" name="socio_id" required>
                <option value="">Seleccione un socio</option>
                @foreach($socios as $socio)
                    <option value="{{ $socio->id }}">{{ $socio->socio }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="puesto_oferta" class="form-label">Puesto ofertado</label>
            <input type="text" class="form-control" id="puesto_oferta" name="puesto_oferta" required>
        </div>

        <div class="mb-3">
            <label for="numero_vacantes" class="form-label">Número de vacantes</label>
            <input type="number" class="form-control" id="numero_vacantes" name="numero_vacantes" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tipo_vacante" class="form-label">Tipo de vacante</label>
            <select class="form-select" id="tipo_vacante" name="tipo_vacante" required>
                <option value="">Seleccione un tipo</option>
                <option value="presencial">Presencial</option>
                <option value="semi-presencial">Semi-presencial</option>
                <option value="remoto">Remoto</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion_vacante" class="form-label">Descripción de la vacante</label>
            <textarea id="jodit-editor" name="descripcion_vacante" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('ofertas-laborales.index') }}" class="btn btn-secondary">Cancelar</a>
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