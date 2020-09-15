@extends('layouts.app')

@section('title','Perfil del Usuario')

@section('icon_title')
    <i class="fa fa-fw fa-user"></i>
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Usuarios</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
            src="{{ asset('storage/image_profiles/'.$user->image_path)}}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{$user->first_name.' '.$user->last_name}}</h3>

          <p class="text-muted text-center">{{$user->username}}</p>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Perfil</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> Estudios</strong>

          <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicacion</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fas fa-pencil-alt mr-1"></i> Habilidades</strong>

          <p class="text-muted">
            <span class="tag tag-danger">UI Design</span>
            <span class="tag tag-success">Coding</span>
            <span class="tag tag-info">Javascript</span>
            <span class="tag tag-warning">PHP</span>
            <span class="tag tag-primary">Node.js</span>
          </p>

          <hr>

          <strong><i class="far fa-file-alt mr-1"></i> Notas</strong>

          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        @component('components.tabs')
            @slot('tabs')
                {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Historial</a></li> --}}
                <strong><i class="fas fa-book mr-1"></i>Informacion</strong>
            @endslot
            {{-- <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('img/user1-128x128.jpg')}}" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('img/user7-128x128.jpg')}}" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('img/user6-128x128.jpg')}}" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="{{ asset('img/photo1.png')}}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="{{ asset('img/photo2.png')}}" alt="Photo">
                          <img class="img-fluid" src="{{ asset('img/photo3.jpg')}}" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="{{ asset('img/photo4.jpg')}}" alt="Photo">
                          <img class="img-fluid" src="{{ asset('img/photo1.png')}}" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
            </div> --}}
              <!-- /.tab-pane -->
            {{-- <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
            </div> --}}
              <!-- /.tab-pane -->
            <div >
                <form method="post" action="{{ route('user.update', $user->id) }}" >
                    @method('PATCH')
                    @csrf
                    {{-- <div class="div col-md-6"> --}}
                        <div class="card">
                            <div class="div card-header">
                              <h3 class="card-title">Creacion de usuario</h3>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">Nombres</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{$user->first_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Apellidos</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{$user->last_name}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" name="email" id="email" class="form-control"  value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"  value="{{$user->username}}">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="empresa_id">Empresa</label>
                                        <select name= "empresa_id" class="form-control">
                                            @foreach($empresas as $empresa)
                                                @if ($user->empresa_id == $empresa->id)
                                                    <option value="{{$empresa->id}}" selected>{{$empresa->nombre_empr}}</option>
                                                @else
                                                    <option value="{{$empresa->id}}">{{$empresa->nombre_empr}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="area_id">Area</label>
                                        <select name= "area_id" class="form-control">
                                            <option value="">seleccionar</option>
                                            @foreach($areas as $area)
                                                @if ($user->area_id == $area->id)
                                                    <option value="{{$area->id}}" selected>{{$area->nombre_area}}</option>
                                                @else
                                                    <option value="{{$area->id}}">{{$area->nombre_area}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 pt-2">
                                        <button type="button" class="btn btn-default mt-4 btn-outline-success" data-toggle="modal" data-target="#imagen-modal">
                                            <i class="fa fa-fa fw- fa-image"></i>Cambiar imagen
                                        </button>
                                    </div>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="row">
                                  <div class="col-md-12">
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-outline-success float-right">Guardar</button>
                                  </div>
                              </div>
                            </div>
                        </div>

                    {{-- </div> --}}
                </form>
            </div>
        @endcomponent
      <!-- /.nav-tabs-custom -->
    </div>

    {{-- MODAL IMAGEN --}}
        <div class="modal fade" id="imagen-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Imagen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('user.image', $user->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                        <div class="div modal-body">
                            <input type="file" name="image">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn_outline-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-success">Grabar</button>
                        </div>
                    </form>

                </div>
            </div>
      </div>
 </div>
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



