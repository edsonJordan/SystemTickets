@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('css')
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">   
@endsection
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.roles.general.create')}}">Nuevo Rol</a>
    <h1>Lista de Roles</h1>
@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('info')}}</strong>        
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class=" row ">
                  @foreach ($roles as $role)
                    <div class="text-center col-sm card p-2 m-2">
                        <div class="card-header text-success text-bold">
                            {{$role->name}}
                        </div>
                        <div class="card-body row">
                            {{-- <div class="col-sm col-lg p-2">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm">Ver</a>
                            </div> --}}
                            <div class="col-sm col-lg p-2">
                                <a href="{{route('admin.roles.general.edit', $role)}}" class="btn btn-warning btn-sm">Editar</a>
                            </div>
                            <div class="col-sm col-lg p-2">
                                <form action="{{route('admin.roles.general.destroy', $role)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form> 
                            </div>
                        </div>
                    </div>
                  @endforeach

                </div>
              </div>
        </div>
        @if($users->count())
        <div class="card-body table-responsive">
           <table id="table" class="table table-striped" >
              <thead>
                 <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Área</th>
                    <th>Grupo de soporte</th>
                    <th class="text-center" >Operaciones</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach ($users as $user)
                     <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->area->area}}</td>
                        <td >
                         @if (is_object($user->group))
                            <span class="">{{$user->group->group}}</span>                              
                             @else
                             <span class="badge badge-danger">Sin asignar</span>                        
                         @endif
                         </td>
                         <td width="10px">
                            <a href="{{route('admin.roles.edit', $user)}}" class="btn btn-warning btn-sm">Editar</a>
                         </td>                                         
                     </tr>
                 @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Área</th>
                    <th>Grupo de soporte</th>
                    <th class="text-center">Operaciones</th>
                </tr>
            </tfoot>            
           </table>
        </div>
        <div class="card-footer">
          
        </div>
        @else 
        <div class="card-body">
           <span>No se encontraron registros</span>
        </div>
        @endif
     </div>
@stop

@section('js')        
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
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
 $('#table').DataTable({
        responsive:true,
        autoWidth:false
    });
    window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });


}, 3000);
        
</script>
@endsection

