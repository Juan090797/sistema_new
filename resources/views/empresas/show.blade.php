@extends('layouts.app')

@section('title','Empresa')

@section('icon_title')
    <i class="fa fa-fw fa-user-plus"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('empresa.index') }}">Empresa</a></li>
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

<form method="POST" action="{{ route('empresa.update', $empresa->id) }}">
    @method('PATCH')
    @csrf
    <div class="div col-md-6">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Editar Empresa</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_empr">Nombre</label>
                      <input type="text" name="nombre_empr" id="nombre_empr" class="form-control" value="{{$empresa->nombre_empr}}">
                    </div>
                    <div class="form-group">
                        <select name= "estado_empr" class="form-control">
                            @if ($empresa->estado_empr == "Activo")
                                <option value="">Selecionar</option>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @elseif ($empresa->estado_empr == "Inactivo")
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
                      <a href="{{ route('empresa.index') }}" class="btn btn-outline-danger">Cancelar</a>
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
