@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.groups.create')}}">Nueva Área</a>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Tipo</th>
                        <th class="text-center" width="20px" colspan="3">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->group}}</td>
                            <td>{{$group->type->type}}</td>
                            {{-- <td  width="10px">
                                <a href="{{route('admin.ticket.groups.show', $group)}}" class="btn btn-primary btn-sm">Ver</a>
                             </td> --}}
                            <td width="10px" >                               
                                <a href="{{route('admin.ticket.groups.edit', $group)}}" class="btn  btn-sm btn-warning">Editar</a>                                                           
                            </td>
                            <td width="10px" >                                
                                <form action="{{route('admin.ticket.groups.destroy', $group)}}" class="formulario-eliminar" method="POST">
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
            </table>
        </div>
    </div>
@stop

@section('js')        

<script>
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

