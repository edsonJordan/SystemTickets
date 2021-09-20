@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de tecnologia</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            {!! Form::model($area,['route' => ['admin.ticket.areas.update', $area], 'method'=>'put']) !!}            
            <div class="form-group">
                {!! Form::label('area', 'Nombre') !!}
                {!! Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la área']) !!}
                @error('area')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Editar Tecnologia', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop