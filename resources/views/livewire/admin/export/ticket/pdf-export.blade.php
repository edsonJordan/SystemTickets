<div>
    {{-- @dump($inputDateStart) --}}
     <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group  col-md col-lg-4">
                    {{-- <input type="text" name="inputUser" id="" wire:model="inputUser"> --}}
                    {{-- {{ Form::select('inputUser', $users, null, ['class' => 'select2', 'wire:model'=>'inputUser' , 'style' => 'width: 100%;']) }} --}}
                    <select class="form-control" id="inputUser" name="inputUser" wire:model="inputUser">
                        <option value="">Select Usuario</option>                       
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md col-lg-2">
                    <input wire:model="inputDateStart" type="date" class="form-control" > 
                </div>
                <div class="form-group  col-md col-lg-2">
                    <input wire:model="inputDateEnd" type="date" class="form-control" > 
                </div>
                <div class="form-group  col-md col-lg-2">
                    <select class="form-control " name="course" wire:model="inputStatus">
                        <option value=""> Select Estatus</option>                       
                        @foreach($getStatus as $statu)
                        <option value="{{ $statu->id }}">{{ $statu->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md col-lg-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-danger btn-sm " href="">Exportar</a>
                </div>
            </div> 
        </div>
        @if($tickets->count())
        <div class="card-body table-responsive">            
           <table id="table" class="table table-striped" >
              <thead>
                 <tr>                    
                    <th>Usuario</th>
                    <th>Status</th>
                    <th>Titulo</th>
                    <th>Fecha de creación</th>
                    <th>Ultima Actualización</th>
                 </tr>
              </thead>
              <tbody id="table">                 
                    @foreach($tickets as $ticket)               
                     <tr>                        
                        <td>{{$ticket->user->name }}</td>
                        <td>{{$ticket->typeticket_id }}</td>
                        <td>{{$ticket->tittle }}</td>
                        <td>{{$ticket->created_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>
                        <td>{{$ticket->updated_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>              
                     </tr>
                     @endforeach
              </tbody>             
           </table>
        </div>
        <div class="card-footer ">
            <div class="row flex d-flex justify-content-between">
                <div class="col-md col-lg-6">{{$tickets->links()}}</div>
                <div class="col-md col-lg-2">
                    <select class="form-control"  wire:model="perPage">
                        <option value="2">2 por página</option>                       
                        <option value="5">5 por página</option>   
                        <option value="10">10 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>   
                    </select>
                </div>
            </div>
        </div>
        @else 
        <div class="card-body">
           <span>No se encontraron registros</span>
        </div>
        @endif
     </div>

    @section('js')

     <script>
     
     
         $(document).ready(function() {
        
         $('.select2').select2();         
     });
     </script>
     @endsection
  </div>