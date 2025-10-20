@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Registro de Usuario</h5>
        <p class="card-text">Por medio de esta opcion podras registrar los usuarios que administraran el Landing-Page.</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Ir</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Datos de la Empresa</h5>
        <p class="card-text">Configuraciones principales de informacion de la empresa.</p>
        <a href="{{ route('datos-empresa.index') }}" class="btn btn-primary">ir</a>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
@endsection
