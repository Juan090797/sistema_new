@extends('layouts.app')

@section('title','Creacion de Categoria')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('categoria.store') }}">
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Creacion de Categoria</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_cat">Nombre</label>
                      <input type="text" name="nombre_cat" id="nombre_cat" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="estado_cat">Estado</label>
                        <select name= "estado_cat" class="form-control">
                            <option value="">Selecionar</option>
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-success float-right">Guardar</button>
                    <a href="{{ route('categoria.index') }}" class="btn btn-outline-danger">Cancelar</a>
                  </div>
              </div>
            </div>
        </div>

    </div>
</form>
@endsection
