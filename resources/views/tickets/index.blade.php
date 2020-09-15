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
        @if(count($tickets)<=0)
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
        @foreach ($tickets as $ticket)
            <div class="card mb-4">
                <div class="card-body text-danger">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/image_profiles/'.$ticket->user->image_path)}}" alt="user image">
                                <span class="username">
                                <a href="{{ route('ticket.show', $ticket->id)}}">{{$ticket->titulo_tk}}</a>
                                </span>
                                <span class="description">
                                    {{$ticket->user->first_name.' '. $ticket->user->last_name}}
                                </span>
                                <span class="description">
                                    {{$ticket->created_at->diffForHumans()}}
                                </span>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="user-block">
                                <span class="description">Estado:
                                    @if ( $ticket->estado_tk === "Nuevo")
                                        <span class="badge bg-success">{{$ticket->estado_tk}}</span>
                                    @elseif ( $ticket->estado_tk === "Abierto")
                                        <span class="badge bg-purple">{{$ticket->estado_tk}}</span>
                                    @elseif ( $ticket->estado_tk === "Pendiente")
                                        <span class="badge bg-warning">{{$ticket->estado_tk}}</span>
                                    @elseif ( $ticket->estado_tk === "En espera")
                                        <span class="badge bg-info">{{$ticket->estado_tk}}</span>
                                    @elseif ( $ticket->estado_tk === "Resuelto")
                                        <span class="badge bg-primary">{{$ticket->estado_tk}}</span>
                                    @else
                                        <span class="badge bg-danger">{{$ticket->estado_tk}}</span>
                                    @endif
                                </span>
                                <span class="description">Categoria: {{$ticket->categoria->nombre_cat}}</span>
                                <span class="description">Prioridad:
                                    @if ( $ticket->prioridad->nombre_pri === "Alta")
                                        <span class="badge bg-danger">{{$ticket->prioridad->nombre_pri}}</span>
                                    @elseif ( $ticket->prioridad->nombre_pri === "Media")
                                        <span class="badge bg-warning">{{$ticket->prioridad->nombre_pri}}</span>
                                    @else
                                        <span class="badge bg-success">{{$ticket->prioridad->nombre_pri}}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif

    {{-- </div> --}}
@endcomponent
@endsection





