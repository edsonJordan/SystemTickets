@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario para Crear Rol</h1>
@stop

@section('content')

<div class="card">
<div class="card-header">
       
<div class="card-body">
    {!! Form::open(['route' => 'admin.roles.general.store', 'autocomplete' => 'off', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
            @error('name')
                <strong class="text-danger">
                    {{$message}}
                </strong>
            @enderror
        </div>            
        <h2 class="h5 text-center py-4">
            Listado de Permisos
        </h2>
        <div class="container col-12">
            <div class="row text-center">
            @foreach ($persmissions as $persmission)
                <label class="m-2" >
                {!! Form::checkbox('permissions[]', $persmission->id, null, ['class' => 'mr-1']) !!}                        
                            <div class=" bg-success  col col-lg-12 col-sm-12 p-2">{{$persmission->description}}</div>
                </label>
            @endforeach
            </div>
        </div>
    {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2 text-center']) !!}
    {!! Form::close() !!}
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