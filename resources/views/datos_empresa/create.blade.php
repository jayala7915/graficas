@extends('layouts.app')

@section('title', 'Crear Datos de Empresa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Crear Nuevos Datos de Empresa</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('datos-empresa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre de la Empresa *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="eslogan_empresa" class="form-label">Eslogan (Opcional)</label>
                    <input type="text" class="form-control" id="eslogan_empresa" name="eslogan_empresa">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion" class="form-label">Dirección *</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo Electrónico *</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono_fijo" class="form-label">Teléfono Fijo *</label>
                    <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo" required>
                </div>
                <div class="col-md-6">
                    <label for="telefono_movil" class="form-label">Teléfono Móvil *</label>
                    <input type="text" class="form-control" id="telefono_movil" name="telefono_movil" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="direccion_pagina" class="form-label">Sitio Web (URL)</label>
                    <input type="url" class="form-control" id="direccion_pagina" name="direccion_pagina">
                </div>
                <div class="col-md-6">
                    <label for="logo_empresa" class="form-label">Logo de la Empresa</label>
                    <input type="file" class="form-control" id="logo_empresa" name="logo_empresa" accept="image/*">
                </div>
            </div>
<div class="card mb-3">
    <div class="card-header">
        <h6 class="mb-0">Redes Sociales</h6>
    </div>
    <div class="card-body">
        <div id="redes-container">
            <!-- Red Social Base -->
            <div class="row mb-3 red-social">
                <div class="col-md-4">
                    <label class="form-label">Red Social *</label>
                    <select class="form-select red-icon" name="red_icon[]">
                                        <option value="">Seleccione una red</option>
                                        @foreach($redesDisponibles as $key => $red)
                                        <option value="{{ $key }}">{{ $red }}</option>
                                        @endforeach
                                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">URL *</label>
                    <input type="url" class="form-control" name="red_url[]" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Activa</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="red_activa[]" checked>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm" disabled>
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <button type="button" id="btn-agregar-red" class="btn btn-secondary btn-sm mt-2">
            <i class="fas fa-plus"></i> Agregar otra red
        </button>
    </div>
</div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('datos-empresa.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Empresa</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript directo en el documento -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnAgregar = document.getElementById('btn-agregar-red');
    const contenedorRedes = document.getElementById('redes-container');
    let contador = 1;

    btnAgregar.addEventListener('click', function() {
        // Clonar la primera red social
        const primeraRed = contenedorRedes.querySelector('.red-social');
        const nuevaRed = primeraRed.cloneNode(true);
        
        // Limpiar valores
        nuevaRed.querySelector('select').selectedIndex = 0;
        nuevaRed.querySelector('input[type="url"]').value = '';
        nuevaRed.querySelector('input[type="checkbox"]').checked = true;
        
        // Habilitar botón eliminar
        const btnEliminar = nuevaRed.querySelector('.btn-danger');
        btnEliminar.disabled = false;
        btnEliminar.addEventListener('click', function() {
            contenedorRedes.removeChild(nuevaRed);
        });
        
        // Agregar al contenedor
        contenedorRedes.appendChild(nuevaRed);
        contador++;
    });
});
</script>

@endsection