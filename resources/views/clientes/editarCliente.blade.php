
@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Editar Cliente</h2>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('clientes.update',$cliente->cli_id)}}" method="POST" >

                @csrf
                @method('PUT')
                <div class="row g-3">


                    {{-- <div class="col-md-6">
                        <label class="form-label" >Codigo:</label>
                        <input type="number" name="Codigo" class="form-control" placeholder="Codigo">
                    </div> --}}


                    <div class="col-md-6">
                        <label class="form-label" >Nombres:</label>
                        <input type="text" name="cli_nombre" class="form-control" placeholder="Nombre" value="{{ $cliente->cli_nombre }}">
                        @error('cli_nombre')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Apellidos:</label>
                        <input type="text" name="cli_apellido" class="form-control" placeholder="Nombre" value="{{ $cliente->cli_apellido }}">
                        @error('cli_apellidos')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Telefono:</label>
                        <input type="text" name="cli_telefono" class="form-control" placeholder="Nombre" value="{{ $cliente->cli_telefono }}">
                        @error('cli_telefono')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Coreo:</label>
                        <input type="email" name="cli_correo" class="form-control" placeholder="Nombre" value="{{ $cliente->cli_correo }}">
                        @error('cli_correo')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >notas:</label>
                        <input type="text" name="cli_notas" class="form-control" placeholder="Nombre" value="{{ $cliente->cli_notas }}">
                        @error('cli_notas')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>



                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-secondary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stop
