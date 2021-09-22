@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Información de usuario</h1>

@stop
@section('content')
    <div class="row">
        <div class="col-md-3  ">
            <div class="box box-primary card p-2">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
    
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
    
                  <p class="text-muted text-center">{{$user->type->type_user}}</p>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item d-flex justify-content-between">
                      <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>
    
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-9 ">
          <div class="box box-primary card p-2">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Acerca de mi</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong><i class="fas fa-fw fa-building margin-r-5"></i> Área</strong>  
                  <p class="text-muted">
                    {{$user->area->area}}
                  </p>
                <hr>  
                <strong><i class="fas fa-fw fa-users margin-r-5"></i> Grupo de soporte</strong>
                  
                <hr>
  
                <strong><i class="far fa-fw fa-envelope margin-r-5"></i> Correo</strong>
  
                <p>
                  <span class="label label-danger">{{$user->email}}</span>              
                </p>
  
                <hr>
  
                <strong><i class="fa fa-fw fa-user margin-r-5"></i>Creado</strong>  
                <p>
                  {{$user->created_at->toFormattedDateString()}}
                </p>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
    </div>
@stop
@section('js')
    <script></script>
@stop
