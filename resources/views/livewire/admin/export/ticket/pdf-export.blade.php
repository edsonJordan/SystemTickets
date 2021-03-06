<div>
    <style>
        /* you will need to apply scopes yourself manually */
        @media screen and ( max-width: 400px ){

li.page-item {

    display: none;
}

.page-item:first-child,
.page-item:nth-child( 2 ),
.page-item:nth-last-child( 2 ),
.page-item:last-child,
.page-item.active,
.page-item.disabled {
    display: block;
    }
}
        </style>
     <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="form-group  col-md col-lg-3">
                    {!! Form::label('inputUser', 'Usuario') !!}
                    {{-- <input type="text" name="inputUser" id="" wire:model="inputUser"> --}}
                    {{-- {{ Form::select('inputUser', $users, null, ['class' => 'select2', 'wire:model'=>'inputUser' , 'style' => 'width: 100%;']) }} --}}
                    <select class="form-control" id="inputUser" name="inputUser" wire:model="inputUser">
                        <option value="">Seleccione Usuario</option>                       
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md col-lg-2">
                    {!! Form::label('inputDateStart', 'Desde') !!}
                    <input wire:model="inputDateStart" type="date" class="form-control" > 
                </div>
                <div class="form-group  col-md col-lg-2">
                    {!! Form::label('inputDateEnd', 'Hasta') !!}
                    <input wire:model="inputDateEnd" type="date" class="form-control" > 
                </div>
                <div class="form-group  col-md col-lg-3">
                    {!! Form::label('course', 'Estado del ticket') !!}
                    <select class="form-control " style="width: 100%;" name="course" wire:model="inputStatus">
                        <option value=""> Seleccione Estado de ticket </option>                       
                        @foreach($getStatus as $statu)
                        <option value="{{ $statu->id }}">{{ $statu->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md col-lg-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-danger btn-sm " wire:click="like">
                        <i class="fas fa-fw fa-file-pdf "></i>
                        Exportar</a>
                </div>
            </div> 
        </div>
        @if($tickets->count())
        <div class="card-body table-responsive">  
            <div class="row flex d-flex justify-content-between">
                <div class="col-md col-lg-6">{{$tickets->onEachSide(2)->links()}}</div>
                <div class="col-md col-lg-2">
                    <select class="form-control"  wire:model="perPage">
                        <option value="2">2 por p??gina</option>                       
                        <option value="5">5 por p??gina</option>   
                        <option value="10">10 por p??gina</option>
                        <option value="50">50 por p??gina</option>
                        <option value="100">100 por p??gina</option>   
                    </select>
                </div>
            </div>          
           <table id="table" class="table table-striped" >
              <thead>
                 <tr>                    
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th>Fecha de creaci??n</th>
                    <th>Ultima Actualizaci??n</th>
                 </tr>
              </thead>
              <tbody id="table">                 
                    @foreach($tickets as $ticket)               
                     <tr>                        
                        <td>{{$ticket->user->name }}</td>
                        <td>{{$ticket->typeticket->type }}</td>
                        <td>{{$ticket->tittle }}</td>
                        <td>{{$ticket->created_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>
                        <td>{{$ticket->updated_at->formatLocalized('%d %B %Y %I:%M %p') }}</td>              
                     </tr>
                     @endforeach
              </tbody>             
           </table>
        </div>
        <div class="card-footer ">
            
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