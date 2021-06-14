@extends('layouts.app')

@section('title','Lista de Tickets')

@section('icon_title')
    <i class="fa fa-fw fa-user"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('ticket.index') }}">Tickets</a></li>
@endsection
@section('content')

<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
</div>

@component('components.card')

    @slot('title')
        Listado de Tickets
    @endslot

    @slot('action')
        <a href="{{ route('ticket.create') }}" title="Crear Ticket">
        <i class="fas fa-plus"></i></a>
    @endslot

    {{-- <div class="col-md-12"> --}}
        @if(count($tickets2)<=0)
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    No hay Tickets
                                </h5>
                                <p class="card-text">
                                    No se registran Tickets
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        @else
        @foreach ($tickets2 as $tickets)
            <div class="card mb-4">
                <div class="card-body text-danger">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/image_profiles/'.$tickets->requesteruser->image_path)}}" alt="user image">
                                <span class="username">
                                <a href="{{ route('ticket.show', $tickets->id)}}">{{$tickets->titulo_tk}}</a>
                                </span>
                                <span class="description">
                                    {{$tickets->requesteruser->first_name.' '. $tickets->requesteruser->last_name}}
                                </span>
                                <span class="description">
                                    {{$tickets->created_at->diffForHumans()}}
                                </span>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="user-block">
                                <span class="description">Estado:
                                    {{$tickets->estado->nombre_est}}
                                </span>
                                <span class="description">Categoria: {{$tickets->categoria->nombre_cat}}</span>
                                <span class="description">Prioridad:
                                    @if ( $tickets->prioridad->nombre_pri === "Alto")
                                        <span class="badge bg-danger">{{$tickets->prioridad->nombre_pri}}</span>
                                    @elseif ( $tickets->prioridad->nombre_pri === "Medio")
                                        <span class="badge bg-warning">{{$tickets->prioridad->nombre_pri}}</span>
                                    @else
                                        <span class="badge bg-success">{{$tickets->prioridad->nombre_pri}}</span>
                                    @endif
                                </span>
                                <span class="description">Tecnico: {{$tickets->tecnicouser->first_name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
        {{ $tickets2->render()}}
    {{-- </div> --}}
@endcomponent
@endsection





