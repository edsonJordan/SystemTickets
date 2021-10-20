@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">   
@endsection
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.tickets.create')}}">Nuevo Ticket</a>
    <h1>Lista de mis Tickets de </h1>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('info')}}</strong>        
      </div>
    @endif
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de ticket</th>
                        <th>Titulo</th>
                        <th>Prioridad</th>
                        <th>Asignado</th>
                        <th class="text-center" >Operaciones</th>                        
                    </tr>
                </thead>
                <tbody>                    
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->ticket->user->name}}</td>
                            <td>{{$ticket->ticket->typeticket->type}}</td>
                            <td>{{  substr($ticket->ticket->tittle, 0, 50)."...." }}</td>
                            <td>{{$ticket->ticket->priority->priority}}</td>
                            <td>{{$ticket->created_at->formatLocalized('%d %B %Y %I:%M %p')}}</td>                           
                            <td class="row d-flex-lg justify-content-around" >                                  
                                <a href="{{route('admin.ticket.tickets.edit', $ticket->ticket)}}" class="btn  btn-sm btn-warning">Dar de alta</a>                                                           
                                <a width="20px" href="{{route('admin.ticket.tickets.show', $ticket->ticket)}}" class="btn btn-primary btn-sm">Ver</a>                                                   
                            </td>
                        </tr>
                    @endforeach              
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de ticket</th>
                        <th>Titulo</th>
                        <th>Prioridad</th>
                        <th>Asignado</th>
                        <th class="text-center" >Operaciones</th>  
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@stop

@section('js')        
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        responsive:true,
        autoWidth:false
    });

    } );    
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'De verdad quieres eliminar el registro?',
        text: "Una ves eliminado no se podra recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar!'
            }).then((result) => {
              if(result.value){
                this.submit();   
              }         
    })
    })
    window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
@endsection

