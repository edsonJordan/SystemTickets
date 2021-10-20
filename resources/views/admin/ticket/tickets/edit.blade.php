@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de Tickets</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            {!! Form::model($ticket,['route' => ['admin.ticket.tickets.update', $ticket], 'method'=>'put']) !!}            
            <div class="form-group">   
                <div class="row">
                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('user_id', 'Usuario') !!}
                        </p>                             
                            {{ Form::select('user_id', $users, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('user_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>

                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p  >
                            {!! Form::label('typeticket_id', 'Tipo de ticket') !!}
                        </p>                             
                            {{ Form::select('typeticket_id', $typestickets, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('typeticket_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror                    
                    </div>
                    

                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('priority_id', 'Prioridad de ticket') !!}
                        </p>                             
                            {{ Form::select('priority_id', $prioritys, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('priority_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>

                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('status_id', 'Estado') !!}
                        </p>                             
                            {{ Form::select('status_id', $status, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('status_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('tittle', 'Titulo del Ticket:') !!}
                    {!! Form::text('tittle', null, ['class' => 'form-control']) !!}
                
                @error('tittle')
                    <small class="text-danger" >{{$message}}</small>
                @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Cuerpo del Ticket:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                
                @error('description')
                    <small class="text-danger" >{{$message}}</small>
                @enderror
                </div>
            </div>
           
            {!! Form::submit('Editar Ticket', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')
{{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
        ClassicEditor
        .create(document.querySelector('#description'), {
            removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
        })
        .catch( error => {
            console.error( error );
        } );

        
});
</script>
@endsection