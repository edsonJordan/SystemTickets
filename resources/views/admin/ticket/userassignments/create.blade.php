@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario para Asignar Tickets a usuarios</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            
            {!! Form::open(['route' => 'admin.ticket.userassignments.store', 'autocomplete' => 'off', 'files' => true]) !!}

            <div class="form-group">   
                <div class="row ">
                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p>
                            {!! Form::label('user_id', 'Grupo de Soporte') !!}
                        </p>                             
                            {{ Form::select('user_id', $users, null, ['class' => 'select2', 'style' => 'width: 100%;']) }}
                    @error('user_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror
                    </div>

                    <div class="col-md-3 col-lg-6  pb-4 ">
                        <p  >
                            {!! Form::label('typeticket_id', 'Ticket') !!}
                        </p>                        
                            <select class="selectmul" style="width: 100%" multiple="multiple" name="ticket_id[]" id="">
                            @foreach ($tickets as $ticket)
                                <option value="{{$ticket->id}}">{{ $ticket->user->name. ": ". substr($ticket->tittle, 0, 25)."...." }}</option>
                            @endforeach    
                            </select>     
                            {{-- {{ Form::select('typeticket_id', ['' => 'Empresa', $tickets], null, ['class' => 'select2', 'style' => 'width: 100%;']) }} --}}
                    @error('typeticket_id')
                        <br>
                        <small class="text-danger" >{{$message}}</small>
                    @enderror                    
                    </div>

                </div>


            </div>
           
            {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
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

    $(document).ready(function() {
    $('.selectmul').select2();
    });
     
        


});
</script>
@endsection