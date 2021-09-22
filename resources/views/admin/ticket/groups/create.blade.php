@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de Grupos de Soporte</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            {!! Form::open(['route' => 'admin.ticket.groups.store', 'autocomplete' => 'off', 'files' => true]) !!}
            
            <div class="form-group">
                {!! Form::label('group', 'Nombre') !!}
                {!! Form::text('group', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del grupo de soporte']) !!}
                @error('group')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">   
                <p>
                    {!! Form::label('type_id', 'Tipo de grupo') !!}
                </p>  
                    @foreach ($types as $type)
                        <label class="mr-2" >
                        {!! Form::radio('type_id', $type->id) !!}
                        {{$type->type}}
                        </label>
                    @endforeach  
            @error('type_id')
                <br>
                <small class="text-danger" >{{$message}}</small>
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