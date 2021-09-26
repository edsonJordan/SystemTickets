@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de Tickets</h1>
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
                <div class="row">
                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('type_id', 'Usuario') !!}
                        </p>                             
                            {{ Form::select('category_id', $users, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('type_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>
                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p  >
                            {!! Form::label('type_id', 'Tipo de ticket') !!}
                        </p>                             
                            {{ Form::select('category_id', $types, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('type_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    
                    </div>
                    
                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('type_id', 'Prioridad de ticket') !!}
                        </p>                             
                            {{ Form::select('category_id', $prioritys, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('type_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>
                    <div class="col-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('type_id', 'Estado') !!}
                        </p>                             
                            {{ Form::select('category_id', $status, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('type_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del Post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                
                @error('body')
                    <small class="text-danger" >{{$message}}</small>
                @enderror
                </div>
            </div>
           
            {!! Form::submit('Crear Ticket', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>


    $(document).ready(function() {
    $('.select2').select2();

     ClassicEditor
        .create( document.querySelector( '#body'), {
        
    }
         )
        .catch( error => {
            console.error( error );
        } );
        
});
</script>
@endsection