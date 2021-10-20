@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.ticket.users.create')}}">Nueva Usuario</a>
    <h1>Lista de usuarios</h1>
@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('info')}}</strong>        
        </div>
    @endif
    @livewire('admin.ticket.users-show')
@stop

@section('js')        
<script>

    document.addEventListener('livewire:load', function () {
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
    
   
    window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
@endsection

