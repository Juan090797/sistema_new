<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Inicio') | {{ config('app.name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ mix('css/app.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('icon_title') @yield('title','Ticket Nuevo')</h1>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @yield('breadcrumbs')
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">
<div class="container-fluid">
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
                            <h4 style="color:#0A7BBB";>{{$ticket->requesteruser->first_name.' '. $ticket->requesteruser->last_name}}</h4>
                        </span>
                        <span class="description">{{$ticket->created_at->diffForHumans()}}</span>
                        </div>
                        <p>
                            {{$ticket->descripcion_tk}}
                        </p>
                        <p>
                            <a href="#" class="link-black text-sm mr-2"></a>
                            <span class="float-right">
                                <i class="far fa-comments mr-1"></i> Comentarios ({{count($comentarios)}})
                            </span>
                            <span class="float-left">
                                <a href="/download/{{$ticket->archivo_tk}}">{{$ticket->archivo_tk}}</a>
                            </span>
                        </p>
                        <form method="POST" action="{{ route('comentario.guardar') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket->id}}">
                                <input type="hidden" name="user_id" id="user_id" value="{{$ticket->requesteruser->id}}">
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
                            <label for="estado_id">Estado</label>
                            <select name="estado_id" class="form-control" disabled>
                                <option value="">Selecionar</option>
                                @foreach($estados as $estado)
                                    @if ($ticket->estado_id == $estado->id)
                                        <option value="{{$estado->id}}" selected>{{$estado->nombre_est}}</option>
                                    @else
                                        <option value="{{$estado->id}}">{{$estado->nombre_est}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria_id">Categoria</label>
                            <select name="categoria_id" class="form-control" disabled>
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
                            <select name="prioridad_id" class="form-control" disabled>
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
                            <label for="tecnico_user_id">Tecnico</label>
                            <select name="tecnico_user_id" class="form-control" id="tecnico_user_id" disabled>
                                <option value="">Selecionar</option>
                                @foreach($usuarios as $usuario)
                                    @if ($ticket->tecnico_user_id == $usuario->id)
                                        <option value="{{$usuario->id}}" selected>{{$usuario->first_name}}</option>
                                    @else
                                        <option value="{{$usuario->id}}">{{$usuario->first_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
