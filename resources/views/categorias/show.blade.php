@extends('layouts.app')

@section('title','Creacion de Categoria')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('categoria.index') }}">Categorias</a></li>
@endsection
@section('content')

<form method="POST" action="{{ route('categoria.update', $categoria->id) }}">
    @method('PATCH')
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Editar Categoria</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_cat">Nombre</label>
                      <input type="text" name="nombre_cat" id="nombre_cat" class="form-control" value="{{$categoria->nombre_cat}}">
                    </div>
                    <div class="form-group">
                        <label for="estado_cat">Estado</label>
                        <select name= "estado_cat" class="form-control">
                            @if ($categoria->estado_cat == "Activo")
                                <option value="">Selecionar</option>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @elseif ($categoria->estado_cat == "Inactivo")
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
                      <a href="{{ route('categoria.index') }}" class="btn btn-outline-danger">Cancel</a>
                  </div>
              </div>
            </div>
        </div>

    </div>
</form>
@endsection
