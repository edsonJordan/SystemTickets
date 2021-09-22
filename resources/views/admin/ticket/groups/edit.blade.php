@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de edición de grupo de soporte</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            
            </div>
        <div class="card-body">
            {!! Form::model($group,['route' => ['admin.ticket.groups.update', $group],'autocomplete' => 'off', 'method'=>'put']) !!}            
            <div class="form-group">
                {!! Form::label('group', 'Nombre') !!}
                {!! Form::text('group', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la área']) !!}
                @error('group')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">     
                <p class="font-weight-blod" >Tipo</p>
                    @foreach ($types as $type)
                        <label class="mr-2" >
                        {!! Form::radio('type_id', $type->id) !!}
                        {{$type->type}}
                        </label>
                    @endforeach    
                <hr>
            @error('type')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>

            {!! Form::submit('Editar Grupo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop