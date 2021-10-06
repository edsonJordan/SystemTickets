@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administrador de roles</h1>
@stop

@section('content')

<div class="card">
<div class="card-header">
    {!! Form::model($user, ['route' => ['admin.roles.update', $user], 'method'=>'put']) !!}            
        <h2 class="h5">
            Listado de Roles
        </h2>
       @foreach ($roles as $rol)
       <div class="form-group">
           <label >
               {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
               {{$rol->name}}
           </label>
        </div>
       @endforeach
    
    {!! Form::submit('Editar Roles', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
<div class="card-body">

</div>
<div class="card-footer">

</div>
</div>
@stop

@section('css')
   
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop