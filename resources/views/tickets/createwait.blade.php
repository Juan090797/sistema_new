<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Inicio') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="container">
    {{-- <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('icon_title') @yield('title','Ticket Nuevo')</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
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
                                    <h3 class="card-title">Ticket</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requester_user_id">Usuario</label>
                                                <select name="requester_user_id" class="form-control">
                                                    <option value="">seleccionar</option>
                                                    @foreach($usuarios as $usuario)
                                                    <option value="{{$usuario->id}}">{{$usuario->first_name.' '.$usuario->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="titulo_tk">Titulo</label>
                                                <input type="text" name="titulo_tk" id="titulo_tk" class="form-control" placeholder="Titulo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion_tk">Descripcion</label>
                                                <textarea type="text" name="descripcion_tk" id="descripcion_tk" class="form-control" placeholder="Descripcion del problema"></textarea>
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
                </div>
            </section>
        </div>
        @include('layouts.footer')
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div> --}}
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            </div>
        </div>
    </div> --}}

    <header>
        <h1>Nuevo Ticket</h1>
    </header>
    <section class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
         @endif
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ route('ticket.store') }}">
                @csrf
                    <div class="card">
                        <div class="div card-header">
                            <h3 class="card-title">Ticket</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="requester_user_id">Usuario</label>
                                        <select name="requester_user_id" class="form-control">
                                            <option value="">seleccionar</option>
                                            @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->first_name.' '.$usuario->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titulo_tk">Titulo</label>
                                        <input type="text" name="titulo_tk" id="titulo_tk" class="form-control" placeholder="Titulo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_tk">Descripcion</label>
                                        <textarea type="text" name="descripcion_tk" id="descripcion_tk" class="form-control" placeholder="Descripcion del problema"></textarea>
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
            </form>
        </div>
    </section>
    {{-- <footer>
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">{{ config('app.name') }}</a>.</strong> All rights
        reserved.
    </footer> --}}

<script src="{{ mix('js/vendor.js')}}"></script>
<script src="{{ mix('js/app.js')}}"></script>
    @if (session()->has('process_result'))
        <script type="text/javascript">
            $(function() {
                toastr.{{ session('process_result')['status']}}('{{ session('process_result')['content']}}')
            });
        </script>
    @endif
</body>
</html>
