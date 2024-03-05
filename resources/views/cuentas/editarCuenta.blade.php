
@extends('adminlte::page')

@section('title', 'Cuenta')

@section('content_header')
    <h1>Cuenta</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Editar Cliente</h2>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('cuentas.update',$cuentas->cue_id)}}" method="POST" >

                @csrf
                @method('PUT')
                <div class="row g-3">


                    {{-- <div class="col-md-6">
                        <label class="form-label" >Codigo:</label>
                        <input type="number" name="Codigo" class="form-control" placeholder="Codigo">
                    </div> --}}

                    <div class="col-md-6">
                        <label class="form-label" >Correo:</label>
                        <input type="email" name="cue_correo" class="form-control" placeholder="Correo" value="{{ $cuentas->cue_correo }}">
                        @error('cue_correo')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Contraseña:</label>
                        <input type="text" name="cue_contra" class="form-control" placeholder="Contraseña" value="{{ $cuentas->cue_contra }}">
                        @error('cue_contra')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Fecha de compra:</label>
                        <input type="date" name="cue_fecha_compra" class="form-control" placeholder="Fecha de compra" value="{{ $cuentas->cue_fecha_compra }}">
                        @error('cue_fecha_compra')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Fecha de vencimiento:</label>
                        <input type="date" name="cue_fecha_vence" class="form-control" placeholder="Fecha de vencimiento" value="{{ $cuentas->cue_fecha_vence }}">
                        @error('cue_fecha_vence')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Proveedor:</label>
                        <input type="text" name="cue_proveedor" class="form-control" placeholder="Proveedor" value="{{ $cuentas->cue_proveedor }}">
                        @error('cue_proveedor')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="tipo_id">Tipo de cuenta:</label>
                        <select class="form-control" name="tbl_tipo_tipo_id" id="tipo_id">
                            @foreach ($tipos as $tipo)  
                                <option value="{{ $tipo->tipo_id }}" {{ $cuentas->tbl_tipo_tipo_id == $tipo->tipo_id ? 'selected' : '' }}> {{ $tipo->tipo_nombre }} </option>
                            @endforeach
                        </select>
                        @error('tbl_tipo_tipo_id')
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
