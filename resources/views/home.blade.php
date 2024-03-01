@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="fondo ">
    <div class="row g-3">
        <div class="col-md-3">
            <x-adminlte-small-box title="" text="Centros" icon="fas fa-synagogue text-dark" theme="success" url="/centros" url-text="Ver centros"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-small-box title="" text="Archivos" icon="fas fa-file-alt text-dark" theme="success" url="" url-text="Ver archivos"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-small-box title="" text="Usuarios" icon="fas fa-user-plus text-dark" theme="success" url="" url-text="Ver usuarios"/>
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="" text="Programas" icon="fas fa-graduation-cap text-dark" theme="success" url="" url-text="Ver programas" />
        </div>

        <div class="col-md-3 ">
            <x-adminlte-small-box title="" text="Fichas" icon="fas fa-tags text-dark" theme="success" url="" url-text="Ver fichas" />
        </div>
        <div class="col-md-3 ">

            <x-adminlte-small-box title="" text="Vigencias" icon="fas fa-folder text-dark" theme="success" url="" url-text="Ver vigencia" />
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="" text="Instructores" icon="fas fa-id-badge text-dark" theme="success" url="" url-text="Ver instructores"/>
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="" text="Regionales" icon="fas fa-map text-dark" theme="success" url="" url-text="Ver regionales"/>
        </div>

    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop