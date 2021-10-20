@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')

    <h1>Lista de Tickets a exportar</h1>
@stop

@section('content')
    @livewire('admin.export.ticket.pdf-export')
@stop

@section('js')        


@endsection

