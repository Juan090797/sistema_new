@extends('layouts.app')

@section('title','Listado de Estados')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('estado.index') }}">Estados</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Listado de Estados
        @endslot

        @slot('action')
            <a href="{{ route('estado.create') }}" title="Crear Estado">
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
                    @foreach ($estados as $estado)
                        <tr>
                            <td><a href="{{ route('estado.show', $estado->id)}}">{{$estado->nombre_est}}</a></td>
                            @if ( $estado->estado_est === "Activo")
                                <td><span class="badge bg-success">{{$estado->estado_est}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$estado->estado_est}}</span></td>
                            @endif
                            <td>{{$estado->created_at->diffForHumans()}}</td>
                            <td>{{$estado->updated_at->diffForHumans()}}</td>
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
