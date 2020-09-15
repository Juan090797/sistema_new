@extends('layouts.app')

@section('title','Creacion de Ticket')

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

<form method="POST" action="{{ route('ticket.store') }}">
    @csrf
    <div class="div col-md-10">
        <div class="card">
            <div class="div card-header">
              <h3 class="card-title">Nuevo Ticket</h3>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="titulo_tk">Titulo</label>
                      <input type="text" name="titulo_tk" id="titulo_tk" class="form-control" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="descripcion_tk">Descripcion</label>
                        <textarea type="text" name="descripcion_tk" id="descripcion_tk" class="form-control" placeholder="Descripcion del problema"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="estado_tk">Estado</label>
                        <select name="estado_tk" class="form-control">
                            <option value="">Selecionar</option>
                            <option value="Nuevo" selected>Nuevo</option>
                            <option value="Abierto">Abierto</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Abierto">En Espera</option>
                            <option value="Pendiente">Resuelto</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_id">Tipo de Ticket</label>
                        <select name="tipo_id" class="form-control">
                            <option value="">seleccionar</option>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre_tip}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoria</label>
                        <select name="categoria_id" class="form-control">
                            <option value="">seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_cat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prioridad_id">Prioridad</label>
                        <select name="prioridad_id" class="form-control">
                            <option value="">seleccionar</option>
                            @foreach($prioridades as $prioridad)
                                <option value="{{$prioridad->id}}">{{$prioridad->nombre_pri}}</option>
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
                    <a href="{{ route('ticket.index') }}" class="btn btn-outline-danger">Cancelar</a>
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
