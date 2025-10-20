@extends('layouts.app')

@section('title', 'Editar Datos de Empresa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Editar Datos de Empresa</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('datos-empresa.update', $datosEmpresa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre de la Empresa *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $datosEmpresa->nombre) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="eslogan_empresa" class="form-label">Eslogan (Opcional)</label>
                    <input type="text" class="form-control" id="eslogan_empresa" name="eslogan_empresa" value="{{ old('eslogan_empresa', $datosEmpresa->eslogan_empresa) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion" class="form-label">Dirección *</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $datosEmpresa->direccion) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo Electrónico *</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', $datosEmpresa->correo) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono_fijo" class="form-label">Teléfono Fijo *</label>
                    <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo" value="{{ old('telefono_fijo', $datosEmpresa->telefono_fijo) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="telefono_movil" class="form-label">Teléfono Móvil *</label>
                    <input type="text" class="form-control" id="telefono_movil" name="telefono_movil" value="{{ old('telefono_movil', $datosEmpresa->telefono_movil) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion_pagina" class="form-label">Sitio Web (URL)</label>
                    <input type="url" class="form-control" id="direccion_pagina" name="direccion_pagina" value="{{ old('direccion_pagina', $datosEmpresa->direccion_pagina) }}">
                </div>
                <div class="col-md-6">
                    <label for="logo_empresa" class="form-label">Logo de la Empresa</label>
                    <input type="file" class="form-control" id="logo_empresa" name="logo_empresa" accept="image/*">
                    @if($datosEmpresa->logo_empresa)
                        <div class="mt-2">
                            <img src="{{ $datosEmpresa->logo_empresa }}" alt="Logo actual" width="100">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_logo" id="remove_logo">
                                <label class="form-check-label" for="remove_logo">Eliminar logo actual</label>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Redes Sociales</h6>
                </div>
                <div class="card-body">
                    <div id="redes-container">
                        @if($datosEmpresa->redes_sociales && count($datosEmpresa->redes_sociales) > 0)
                            @foreach($datosEmpresa->redes_sociales as $index => $red)
                            <div class="row mb-3 red-social">
                                <div class="col-md-4">
                                    <label class="form-label">Red Social *</label>
                                    <select class="form-select red-icon" name="red_icon[]" required>
                                        <option value="">Seleccione una red</option>
                                        @foreach($redesDisponibles as $key => $nombre)
                                        <option value="{{ $key }}" {{ $red['icono'] == $key ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">URL *</label>
                                    <input type="url" class="form-control red-url" name="red_url[]" value="{{ $red['url'] ?? '' }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Activa</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input red-activa" type="checkbox" name="red_activa[{{ $index }}]" {{ ($red['activa'] ?? false) ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm remove-red" {{ $loop->first ? 'disabled' : '' }}>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="row mb-3 red-social">
                                <div class="col-md-4">
                                    <label class="form-label">Red Social *</label>
                                    <select class="form-select red-icon" name="red_icon[]" required>
                                        <option value="">Seleccione una red</option>
                                        @foreach($redesDisponibles as $key => $red)
                                        <option value="{{ $key }}">{{ $red }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">URL *</label>
                                    <input type="url" class="form-control red-url" name="red_url[]" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Activa</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input red-activa" type="checkbox" name="red_activa[0]" checked>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm remove-red" disabled>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="btn-agregar-red" class="btn btn-secondary btn-sm mt-2">
                        <i class="fas fa-plus"></i> Agregar otra red
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('datos-empresa.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnAgregar = document.getElementById('btn-agregar-red');
    const contenedorRedes = document.getElementById('redes-container');
    let contador = {{ $datosEmpresa->redes_sociales ? count($datosEmpresa->redes_sociales) : 1 }};

    // Función para agregar nueva red social
    function agregarRedSocial() {
        const primeraRed = contenedorRedes.querySelector('.red-social');
        const nuevaRed = primeraRed.cloneNode(true);
        
        // Limpiar valores
        nuevaRed.querySelector('.red-icon').selectedIndex = 0;
        nuevaRed.querySelector('.red-url').value = '';
        nuevaRed.querySelector('.red-activa').checked = true;
        
        // Actualizar el nombre del checkbox con nuevo índice
        const activaCheck = nuevaRed.querySelector('.red-activa');
        activaCheck.name = `red_activa[${contador}]`;
        
        // Configurar botón de eliminar
        const btnEliminar = nuevaRed.querySelector('.remove-red');
        btnEliminar.disabled = false;
        btnEliminar.addEventListener('click', function() {
            contenedorRedes.removeChild(nuevaRed);
        });
        
        // Agregar al contenedor
        contenedorRedes.appendChild(nuevaRed);
        contador++;
    }

    // Configurar evento para el botón "Agregar otra red"
    btnAgregar.addEventListener('click', agregarRedSocial);

    // Configurar eventos para botones de eliminar existentes
    document.querySelectorAll('.remove-red:not(:disabled)').forEach(btn => {
        btn.addEventListener('click', function() {
            const redSocial = this.closest('.red-social');
            contenedorRedes.removeChild(redSocial);
        });
    });
});
</script>
@endsection