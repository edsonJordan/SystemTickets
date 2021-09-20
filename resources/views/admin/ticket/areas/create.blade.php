@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de Áreas</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            {!! Form::open(['route' => 'admin.ticket.areas.store', 'autocomplete' => 'off', 'files' => true]) !!}
            
            <div class="form-group">
                {!! Form::label('area', 'Nombre') !!}
                {!! Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del area']) !!}
                @error('area')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
           
            {!! Form::submit('Crear Área', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')


@endsection