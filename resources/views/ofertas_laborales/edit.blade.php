@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Oferta Laboral</h1>

    <form method="POST" action="{{ route('ofertas-laborales.update', $ofertas_laborale->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="socio_id" class="form-label">Socio</label>
            <select class="form-select" id="socio_id" name="socio_id" required>
                @foreach($socios as $socio)
                    <option value="{{ $socio->id }}" {{ $ofertas_laborale->socio_id == $socio->id ? 'selected' : '' }}>{{ $socio->socio }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="puesto_oferta" class="form-label">Puesto ofertado</label>
            <input type="text" class="form-control" id="puesto_oferta" name="puesto_oferta" value="{{ $ofertas_laborale->puesto_oferta }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_vacantes" class="form-label">Número de vacantes</label>
            <input type="number" class="form-control" id="numero_vacantes" name="numero_vacantes" min="1" value="{{ $ofertas_laborale->numero_vacantes }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_vacante" class="form-label">Tipo de vacante</label>
            <select class="form-select" id="tipo_vacante" name="tipo_vacante" required>
                <option value="presencial" {{ $ofertas_laborale->tipo_vacante == 'presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="semi-presencial" {{ $ofertas_laborale->tipo_vacante == 'semi-presencial' ? 'selected' : '' }}>Semi-presencial</option>
                <option value="remoto" {{ $ofertas_laborale->tipo_vacante == 'remoto' ? 'selected' : '' }}>Remoto</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion_vacante" class="form-label">Descripción de la vacante</label>
            <textarea id="jodit-editor" name="descripcion_vacante" class="form-control">{{ $ofertas_laborale->descripcion_vacante }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
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