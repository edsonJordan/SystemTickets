@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">   
@endsection
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.assignments.create')}}">Asignar un nuevo ticket</a>
    <h1>Tickets a Equipos de trabajos </h1>
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
            <table id="table" class="table table-striped" style="width:100%" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Titulo de Ticket</th>
                        <th>Estatus</th>
                        <th>Creado</th>
                        <th>Ultima modificación</th>
                        <th class="text-center" >Operaciones</th>                        
                    </tr>
                </thead>
                <tbody>                    
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td>{{$assignment->id}}</td>
                            <td>{{$assignment->group->group}}</td>
                            <td>{{ substr($assignment->ticket->tittle, 0, 50)."...." }}</td>                             
                            <td>{{$assignment->ticket->status->status}}</td>        
                            <td>{{$assignment->created_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>
                            <td>{{$assignment->updated_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>                 
                            <td class="row d-flex-lg justify-content-around" >      
                                <a  href="{{route('admin.ticket.tickets.show', $assignment->ticket->id)}}" class="btn btn-primary btn-sm">Ver</a>
                                <form action="{{route('admin.ticket.assignments.destroy', $assignment)}}" class="formulario-eliminar" method="POST">
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
                        <th>Grupo</th>
                        <th>Tipo de ticket</th>
                        <th>Estatus</th>
                        <th>Creado</th>
                        <th>Ultima modificación</th>
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
        $('#table').DataTable({
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

