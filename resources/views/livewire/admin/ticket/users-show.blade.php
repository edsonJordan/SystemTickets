<div>
   <script>
      (function($) {
         $('.formulario-eliminar').submit(function(e) {
                           e.preventDefault();
                           Swal.fire({
                           title: 'De verdad quieres eliminar el registro?',
                           text: "Una ves eliminado no se podrá recuperar",
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
            })       
                        /* document.getElementById('table').addEventListener('click', (e)=>{                                    
                           if(e.target.getAttribute('btnDel') === 'delete'){
                              e.target.preventDefault();                  
                              //console.log(e.target.parentNode);
                           }                     
                        }) */
               </script>
    <div class="card">
       <div class="card-header">
          <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">  
       </div>
       @if($users->count())
       
       <div class="card-body table-responsive">
          <table class="table table-striped" >
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Área</th>
                   <th>Grupo de soporte</th>
                   <th class="text-center" colspan="3">Operaciones</th>
                </tr>
             </thead>
             <tbody id="table">
                
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
                           <a href="{{route('admin.ticket.users.show', $user)}}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                       <td width="10px">
                          <a href="{{route('admin.ticket.users.edit', $user)}}" class="btn btn-warning btn-sm">Editar</a>
                       </td>
                       <td width="10px">          
                        <form action="{{route('admin.ticket.users.destroy', $user)}}" class="formulario-eliminar" method="POST">
                            @csrf
                            @method('DELETE')
                            <button btnDel="delete" class="btn btn-danger btn-sm" type="">Eliminar</button>
                        </form>
                    
                    </td>
                    </tr>
                @endforeach
             </tbody>
             
          </table>
       </div>
       <div class="card-footer">
          {{$users->links()}}
       </div>
       @else 
       <div class="card-body">
          <span>No se encontraron registros</span>
       </div>
       @endif
    </div>
  
 </div>