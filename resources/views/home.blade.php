@extends('layouts.app')


@section('icon_title')
    <i class="fa fa-lg fa-fw fa-home"></i>
@endsection

@section('title')
    Reportes
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bell"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Nuevos Tickets</span>
                        <span class="info-box-number">
                            {{count($ticket_nuevo)}}
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Tickets Urgentes</span>
                        <span class="info-box-number">{{count($ticket_alto)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fa fa-ticket-alt"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Total Tickets</span>
                        <span class="info-box-number">{{count($ticket_total)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Tickets Cerrados</span>
                        <span class="info-box-number">{{count($ticket_cerrados)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Tickets Juan Marquina</span>
                        <span class="info-box-number">{{count($ticket_juan)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Tickets Noel</span>
                        <span class="info-box-number">{{count($ticket_noel)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Tickets Edwin</span>
                        <span class="info-box-number">{{count($ticket_edwin)}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <h5 class="card-title">Ultimos Tickets</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Solicitante</th>
                                            <th>Tecnico</th>
                                            <th>Estado</th>
                                            <th>Fecha Creacion</th>
                                            <th>Fecha Actualizacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticket_ultimos as $ticket_ultimo)
                                            <tr>
                                                <td><a href="{{ route('ticket.show', $ticket_ultimo->id)}}">{{$ticket_ultimo->titulo_tk}}</a></td>
                                                <td>{{$ticket_ultimo->requesteruser->first_name}}</td>
                                                <td>{{$ticket_ultimo->tecnicouser->first_name}}</td>
                                                <td>{{$ticket_ultimo->estado->nombre_est}}</td>
                                                <td>{{$ticket_ultimo->created_at->diffForHumans()}}</td>
                                                <td>{{$ticket_ultimo->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Solicitante</th>
                                            <th>Tecnico</th>
                                            <th>Estado</th>
                                            <th>Fecha Creacion</th>
                                            <th>Fecha Actualizacion</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- ./card-body -->
                    </div>
                <!-- /.card -->
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Estado Tickets</h5>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Cantidad de Tickets</th>
                                    <th>Detalle</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><a>Ticket1</a></td>
                                        <td>Nombres</td>
                                        <td>acciones</td>
                                    </tr>
                                    <tr>
                                        <td><a>Ticket2</a></td>
                                        <td>Nombres</td>
                                        <td>acciones</td>
                                    </tr>
                                    <tr>
                                        <td><a>Ticket3</a></td>
                                        <td>Nombres</td>
                                        <td>acciones</td>
                                    </tr>
                                    <tr>
                                        <td><a>Ticket4</a></td>
                                        <td>Nombres</td>
                                        <td>acciones</td>
                                    </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cantidad de Tickets</th>
                                    <th>Detalle</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                  </div>
                  <!-- ./card-body -->
                </div>
                <!-- /.card -->
              </div>

            </div> --}}
            <div class="col-md-5">
                <div class="card">
                    <canvas id="myChart" width="50" height="50"></canvas>
                </div>
            </div>
        </div>
    </section>
      <!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ventas', 'Finanzas', 'RR.HH', 'Administracion', 'Almacen', 'Comercial'],
                datasets: [{
                    label: 'Cantidad de tickets por Area',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>
@endsection


