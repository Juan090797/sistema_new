@extends('layouts.app')

@section('title','Creacion de Area')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('area.index') }}">Areas</a></li>
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

<form method="POST" action="{{ route('area.update', $area->id) }}">
    @method('PATCH')
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Editar Area</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_area">Nombre</label>
                      <input type="text" name="nombre_area" id="nombre_area" class="form-control" value="{{$area->nombre_area}}">
                    </div>
                    <div class="form-group">
                        <label for="estado_area">Estado</label>
                        <select name= "estado_area" class="form-control">
                            @if ($area->estado_area == "Activo")
                                <option value="">Selecionar</option>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @elseif ($area->estado_area == "Inactivo")
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
                      <a href="{{ route('area.index') }}" class="btn btn-outline-danger">Cancel</a>
                  </div>
              </div>
            </div>
        </div>

    </div>
</form>
@endsection
@if (session()->has('process_result'))
    @section('scripts')
        <script type="text/javascript">

            $(function() {

                toastr.{{ session('process_result')['status']}}('{{ session('process_result')['content']}}')

            });
        </script>
    @endsection
@endif
