@extends('layouts.app')

@section('title','Listado de Areas')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('area.index') }}">Areas</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Areas
        @endslot

        @slot('action')
            <a href="{{ route('area.create') }}" title="Crear Area">
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
                    @foreach ($areas as $area)
                        <tr>
                            <td><a href="{{ route('area.show', $area->id)}}">{{$area->nombre_area}}</a></td>
                            @if ( $area->estado_area === "Activo")
                                <td><span class="badge bg-success">{{$area->estado_area}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$area->estado_area}}</span></td>
                            @endif
                            <td>{{$area->created_at->diffForHumans()}}</td>
                            <td>{{$area->updated_at->diffForHumans()}}</td>
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
