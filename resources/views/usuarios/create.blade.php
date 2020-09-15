@extends('layouts.app')

@section('title','Creacion de usuario')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection

@section('content')

<form method="POST" action="{{ route('user.store') }}">
    @csrf
    {{-- <div class="div col-md-6"> --}}
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Creacion de usuario</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="first_name">Nombres</label>
                      <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                      <label for="last_name">Apellidos</label>
                      <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"  placeholder="Username">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="empresa_id">Empresa</label>
                        <select name= "empresa_id" class="form-control">
                            <option value="">seleccionar</option>
                            @foreach($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->nombre_empr}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="area_id">Area</label>
                        <select name= "area_id" class="form-control">
                            <option value="">seleccionar</option>
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->nombre_area}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-success float-right">Guardar</button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-danger">Cancelar</a>
                  </div>
              </div>
            </div>
        </div>

    {{-- </div> --}}
</form>
@endsection
