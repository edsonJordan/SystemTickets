@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">   
@endsection
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.tickets.create')}}">Nuevo Ticket</a>
    <h1>Lista de Grupos de Soporte</h1>
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
            <table id="example" class="table table-striped"  wire:ignore	>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de ticket</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th class="text-center" >Operaciones</th>
                        
                    </tr>
                </thead>
                <tbody>                    
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->user->name}}</td>
                            <td>{{$ticket->typeticket->type}}</td>
                            <td>{{$ticket->priority->priority}}</td>
                            <td>{{$ticket->status->status}}</td>                           
                            <td class="row d-flex-lg justify-content-around" >      
                                <a width="20px" href="{{route('admin.ticket.tickets.show', $ticket)}}" class="btn btn-primary btn-sm">Ver</a>

                                <a href="{{route('admin.ticket.tickets.edit', $ticket)}}" class="btn  btn-sm btn-warning">Editar</a>                                                           
                                
                                <form action="{{route('admin.ticket.tickets.destroy', $ticket)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>  
                            </td>
                        </tr>
                    @endforeach              
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de ticket</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th class="text-center">Operaciones</th>
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
        window.livewire.on('#table',()=>{
            initSelectDrop();
        });

        .
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

