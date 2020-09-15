@extends('layouts.app')

@section('title','Listado de Prioridades')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('prioridad.index') }}">Prioridades</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Listado de Prioridades
        @endslot

        @slot('action')
            <a href="{{ route('prioridad.create') }}" title="Crear Prioridad">
            <i class="fas fa-plus"></i></a>
        @endslot

        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>estado</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prioridades as $prioridad)
                        <tr>
                            <td><a href="{{ route('prioridad.show', $prioridad->id)}}">{{$prioridad->nombre_pri}}</a></td>
                            @if ( $prioridad->estado_pri === "Activo")
                                <td><span class="badge bg-success">{{$prioridad->estado_pri}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$prioridad->estado_pri}}</span></td>
                            @endif
                            <td>{{$prioridad->created_at->diffForHumans()}}</td>
                            <td>{{$prioridad->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>estado</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endcomponent
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
