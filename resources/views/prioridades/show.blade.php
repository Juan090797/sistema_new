@extends('layouts.app')

@section('title','Creacion de Prioridad')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('prioridad.index') }}">Prioridades</a></li>
@endsection
@section('content')

<form method="POST" action="{{ route('prioridad.update', $prioridad->id) }}">
    @method('PATCH')
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Editar Prioridad</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_pri">Nombre</label>
                      <input type="text" name="nombre_pri" id="nombre_pri" class="form-control" value="{{$prioridad->nombre_pri}}">
                    </div>
                    <div class="form-group">
                        <label for="estado_pri">Estado</label>
                        <select name= "estado_pri" class="form-control">
                            @if ($prioridad->estado_pri == "Activo")
                                <option value="">Selecionar</option>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @elseif ($prioridad->estado_pri == "Inactivo")
                                <option value="">Selecionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo" selected>Inactivo</option>
                            @else
                                <option value="" selected>Selecionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @endif
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-outline-success float-right">Guardar</button>
                      <a href="{{ route('prioridad.index') }}" class="btn btn-outline-danger">Cancel</a>
                  </div>
              </div>
            </div>
        </div>

    </div>
</form>
@endsection
