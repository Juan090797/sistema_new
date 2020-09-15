@extends('layouts.app')

@section('title','Ticket')

@section('icon_title')
    <i class="nav-icon fa fa-ticket-alt"></i>
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item active"><a href="{{ route('ticket.index') }}">Ticket</a></li>
@endsection
@section('content')

{{-- <form method="POST" action="{{ route('ticket.update', $ticket->id) }}">
    @method('PATCH')
    @csrf --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1 class="card-title"><strong>#{{$ticket->id}}-{{$ticket->titulo_tk}}</strong></h1>
                </div>
                <div class="card-body">
                    <div class="post">
                        <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('img/user1-128x128.jpg')}}" alt="user image">
                        <span class="username">
                            <h4 style="color:#0A7BBB";>{{$ticket->user->first_name.' '. $ticket->user->last_name}}</h4>
                        </span>
                        <span class="description">{{$ticket->created_at->diffForHumans()}}</span>
                        </div>
                        <p>
                            {{$ticket->descripcion_tk}}
                        </p>
                        <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Compartir</a>
                            <span class="float-right">
                            <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comentarios ({{count($comentarios)}})
                            </a>
                            </span>
                        </p>
                        <form method="POST" action="{{ route('comentario.guardar') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket->id}}">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Comentar">
                                <div class="input-group-append">
                                <button class="btn btn-outline-success float-righ" type="submit" id="button-addon2">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(count($comentarios)<=0)
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    No hay comentarios
                                </h5>
                                <p class="card-text">
                                    No se registran comentarios
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            @foreach($comentarios as $comentario)
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ asset('storage/image_profiles/'.$comentario->user->image_path)}}" alt="user image">
                                    <span class="username">
                                    <strong style="color:#0A7BBB";>{{$comentario->user->first_name.' '. $comentario->user->last_name }}</strong>
                                    </span>
                                    <span class="description">
                                        <strong>{{$comentario->descripcion}}</strong>
                                    </span>
                                    <span class="description">
                                        {{$comentario->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>


        <div class="col-md-4">
            <div class="card">
                    <div class="card-header">
                    <h6><strong>Propiedades</strong></h6>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ route('ticket.update', $ticket->id) }}">
                    @method('PATCH')
                    @csrf
                        <div class="form-group">
                            <label for="estado_tk">Estado</label>
                            <select class="form-control" id="estado_tk">
                                @if ($ticket->estado_tk == "Activo")
                                    <option value="">Selecionar</option>
                                    <option value="Activo" selected>Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                @elseif ($ticket->estado_tk == "Inactivo")
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
                        <div class="form-group">
                            <label for="categoria_id">Categoria</label>
                            <select name="categoria_id" class="form-control">
                                <option value="">Selecionar</option>
                                @foreach($categorias as $categoria)
                                    @if ($ticket->categoria_id == $categoria->id)
                                        <option value="{{$categoria->id}}" selected>{{$categoria->nombre_cat}}</option>
                                    @else
                                        <option value="{{$categoria->id}}">{{$categoria->nombre_cat}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prioridad_id">Prioridad</label>
                            <select name="prioridad_id" class="form-control">
                                <option value="">Selecionar</option>
                                @foreach($prioridades as $prioridad)
                                    @if ($ticket->prioridad_id == $prioridad->id)
                                        <option value="{{$prioridad->id}}" selected>{{$prioridad->nombre_pri}}</option>
                                    @else
                                        <option value="{{$prioridad->id}}">{{$prioridad->nombre_pri}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Tecnico</label>
                            <select name="user_id" class="form-control">
                                <option value="">Selecionar</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success float-right">Guardar</button>
                        <a href="{{ route('empresa.index') }}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                    </form>
            </div>
        </div>
</div>
@endsection
