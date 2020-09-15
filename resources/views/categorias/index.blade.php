@extends('layouts.app')

@section('title','Listado de Categorias')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('categoria.index') }}">Categorias</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Listado de Categorias
        @endslot

        @slot('action')
            <a href="{{ route('categoria.create') }}" title="Crear Categoria">
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
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td><a href="{{ route('categoria.show', $categoria->id)}}">{{$categoria->nombre_cat}}</a></td>
                            @if ( $categoria->estado_cat === "Activo")
                                <td><span class="badge bg-success">{{$categoria->estado_cat}}</span></td>
                            @else
                                <td><span class="badge bg-danger">{{$categoria->estado_cat}}</span></td>
                            @endif
                            <td>{{$categoria->created_at->diffForHumans()}}</td>
                            <td>{{$categoria->updated_at->diffForHumans()}}</td>
                            <td>{{$categoria->area}}</td>
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
