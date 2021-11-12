@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Información de usuario</h1>

@stop
@section('content')
    <div class="row">
        <div class="col-md-3">
        <x-adminlte-profile-widget name="{{$user->name}}" desc="{{$user->type->type_user}}" class="elevation-4"
        img="{{$user->profile_photo_url}}" cover="https://picsum.photos/id/130/550/200"
        layout-type="classic" header-class="text-right" footer-class="bg-gradient-teal">
        <x-adminlte-profile-col-item class="border-right text-dark" icon="fas fa-lg fa-tasks"
            title="Projects Done" text="25" size=6 badge="lime"/>
        <x-adminlte-profile-col-item class="text-dark" icon="fas fa-lg fa-tasks"
            title="Projects Pending" text="5" size=6 badge="danger"/>
        <x-adminlte-profile-row-item title="Contact me on:" class="text-center text-dark border-bottom"/>
        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-instagram text-dark" title="Instagram"
            url="#" size=4/>
        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-facebook text-dark" title="Facebook"
            url="#" size=4/>
        <x-adminlte-profile-row-item icon="fab fa-fw fa-2x fa-twitter text-dark" title="Twitter"
            url="#" size=4/>
        </x-adminlte-profile-widget>
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
