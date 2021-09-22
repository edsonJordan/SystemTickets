<div>
    <div class="card">
       <div class="card-header">
          <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">  
       </div>
       @if($areas->count())
       <div class="card-body">
          <table class="table table-striped" >
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th colspan="3" class="text-center" >Operaciones</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($areas as $area)
                    <tr>
                       <td>{{$area->id}}</td>
                       <td>{{$area->area}}</td>
                       <td width="10px">
                          <a href="{{route('admin.ticket.areas.edit', $area)}}" class="btn btn-warning btn-sm">Editar</a>
                       </td>
                        <td width="10px">          
                            <form action="{{route('admin.ticket.areas.destroy', $area)}}" class="formulario-eliminar" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        
                        </td>
                       
                    </tr>
                @endforeach
             </tbody>
             
          </table>
       </div>
       <div class="card-footer">
          {{$areas->links()}}
       </div>
       @else 
       <div class="card-body">
          <span>No se encontraron registros</span>
       </div>
       @endif
    </div>
 </div>