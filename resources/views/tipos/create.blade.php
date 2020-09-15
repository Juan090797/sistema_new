@extends('layouts.app')

@section('title','Creacion de Tipo de ticket')

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

<form method="POST" action="{{ route('tipo_tk.store') }}">
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Creacion de Tipo de ticket</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_tip">Nombre</label>
                      <input type="text" name="nombre_tip" id="nombre_tip" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="estado_tip">Estado</label>
                        <select name= "estado_tip" class="form-control">
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
                    <a href="{{ route('tipo_tk.index') }}" class="btn btn-outline-danger">Cancelar</a>
                  </div>
              </div>
            </div>
        </div>

    </div>
</form>
@endsection
