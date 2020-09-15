@extends('layouts.app')

@section('title','Listado de Tipos de Tickets')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('tipo_tk.index') }}">Tipos de Tickets</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Tipos de Tickets
        @endslot

        @slot('action')
            <a href="{{ route('tipo_tk.create') }}" title="Crear Tipo">
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
                    @foreach ($tipos_tk as $tipo_tk)
                        <tr>
                            <td><a href="{{ route('tipo_tk.show', $tipo_tk->id)}}">{{$tipo_tk->nombre_tip}}</a></td>
                            @if ( $tipo_tk->estado_tip === "Activo")
                                <td><span class="badge bg-success">{{$tipo_tk->estado_tip}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$tipo_tk->estado_tip}}</span></td>
                            @endif
                            <td>{{$tipo_tk->created_at->diffForHumans()}}</td>
                            <td>{{$tipo_tk->updated_at->diffForHumans()}}</td>
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
