@extends('layouts.app')

@section('title','Listado de usuarios')

@section('icon_title')
    <i class="fa fa-fw fa-users"></i>
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Usuarios</a></li>
@endsection

@section('content')

    @component('components.card')

        @slot('title')
            Listado de Usuarios
        @endslot

        @slot('action')
            <a href="{{ route('user.create') }}" title="Crear Usuario">
            <i class="fas fa-plus"></i></a>
        @endslot

        <div class="table-responsive">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Empresa</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="{{ route('user.show', $user->id)}}">{{$user->first_name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->empresa->nombre_empr}}</td>
                            <td>{{$user->area->nombre_area}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Empresa</th>
                        <th>Area</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{ $users->render()}}
    @endcomponent
@endsection
