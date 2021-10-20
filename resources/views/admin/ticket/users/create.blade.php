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
            {!! Form::open(['route' => 'admin.ticket.users.store', 'autocomplete' => 'off', 'files' => true]) !!}
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
                {!! Form::label('password', 'Contraseña') !!}
                {{ Form::password('password', array('placeholder'=>'Ingrese nueva contraseña del usuario', 'class'=>'form-control' ) ) }}
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('type_id', 'Tipo de Usuario') !!}
                {{ Form::select('type_id', $types, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                @error('type_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('group', 'Grupo de Soporte') !!}
                {{ Form::select('group', [[''], $groups], null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                @error('group')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('area_id', 'Area') !!}
                {{ Form::select('area_id', $areas, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                @error('area_id')
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
@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection