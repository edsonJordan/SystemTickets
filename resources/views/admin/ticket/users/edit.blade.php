@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de edición de usuarios</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            {!! Form::model($user,['route' => ['admin.ticket.users.update', $user], 'method'=>'put']) !!}            
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del usuario']) !!}
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('pass', 'Nueva Contraseña') !!}
                {{ Form::password('pass', array('placeholder'=>'Ingrese nueva contraseña del usuario', 'class'=>'form-control' ) ) }}
                @error('pass')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Editar Usuario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop
<script src="{{ mix('js/app.js') }}" defer></script>