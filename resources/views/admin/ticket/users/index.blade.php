@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Lista de usuarios</h1>
@stop
@section('content')
    @livewire('admin.ticket.users-show')
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script></script>
@stop

