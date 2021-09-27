@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
    <style>
        .description:hover, .tittle:hover{
            color: black;
            cursor: pointer;
        }
    </style>
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">   
@endsection
@section('content_header')
<h1>Información del ticket</h1>
@stop
@section('content')

    <div class="row gap-2">
        <div class="col-md-2">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Información
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <dl>
                <dt>Usuario</dt>
                <dd>{{$ticket->user->name }}</dd>
                <dt>Tipo de ticket</dt>
                <dd>{{$ticket->typeticket->type}}</dd>
                <dt>Prioridad</dt>
                <dd>{{$ticket->priority->priority }}</dd>
                <dt>Estado</dt>
                <dd>{{$ticket->status->status }}</dd>
              </dl>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- ./col -->
        <div class="card col-md-10">
            <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Description
                </h3>
            </div>
            <div class=" col-lg-12 col-md-12 col-lg-4 order-1 order-md-2 p-4">
                <div class="text-muted">
                  <p class="text-sm">Titulo
                    <b class="tittle d-block"><dd>{!!$ticket->tittle !!}</dd></b>
                  </p>
                  <p class="text-md">Descripción
                    <b style="" class=" description d-block"> {!!$ticket->description !!} </b>
                  </p>
                </div>
  
                <h5 class="mt-5 text-muted">Información Adicional</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-clock"></i>Creado : {{$ticket->created_at->toFormattedDateString() }}</a>
                  </li>
                  <li>
                    <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-clock"></i>Actualizado: {{$ticket->created_at->toFormattedDateString() }}</a>
                  </li>                
                </ul>

              </div>
          <!-- /.card -->
        </div>
        <!-- ./col -->
      </div>

@stop

@section('js')        

@endsection

