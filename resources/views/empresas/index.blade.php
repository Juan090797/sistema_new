@extends('layouts.app')

@section('title','Listado de Empresas')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('empresa.index') }}">Empresas</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Empresas
        @endslot

        @slot('action')
            <a href="{{ route('empresa.create') }}" title="Crear Empresa">
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
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td><a href="{{ route('empresa.show', $empresa->id)}}">{{$empresa->nombre_empr}}</a></td>
                            @if ( $empresa->estado_empr === "Activo")
                                <td><span class="badge bg-success">{{$empresa->estado_empr}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$empresa->estado_empr}}</span></td>
                            @endif
                            <td>{{$empresa->created_at->diffForHumans()}}</td>
                            <td>{{$empresa->updated_at->diffForHumans()}}</td>
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

