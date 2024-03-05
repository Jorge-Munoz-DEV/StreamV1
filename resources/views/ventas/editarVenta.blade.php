@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')
    <h1>Cuenta</h1>
@stop

@php
use Illuminate\Support\Facades\Auth;
// Obtener el usuario que inició sesión
$usuario = Auth::user();
@endphp

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Crear venta</h2>
            </div>
        </div>

        <div class="card-body">
                <form action="{{ route('ventas.update', ['id' => $ventas->idtbl_ventas]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    {{-- <input type="text" name="users_id" class="form-control" value="{{ $usuario->id }}" hidden> --}}

                    <div class="col-md-6">
                        <label class="form-label">Cliente:</label>

                        <input type="hidden" name="tbl_perfiles_per_id" value="{{$ventas->tbl_perfiles_per_id}}">
                        <div class="input-group">
                            <input type="text" id="clienteSeleccionado" class="form-control" placeholder="Cliente" readonly value="{{$ventas->cli_nombre}}">
                            <input type="hidden" name="tbl_Clientes_cli_id" id="clienteId" value="{{$ventas->cli_id}}">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-search"></i> Seleccionar Cliente
                            </button>
                        </div>
                        @error('tbl_Clientes_cli_id')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nombre del perfil:</label>
                        <input type="text" name="ven_nombre_perfil" class="form-control" placeholder="Nombre del perfil" value="{{ $ventas->ven_nombre_perfil }}">

                        @error('ven_nombre_perfil')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>



                    <div class="col-md-6">                        
                        <label class="form-label">fecha actual:</label>
                        <input type="date" name="ven_fecha_compra" class="form-control" placeholder="nombre del perfil" value="{{$ventas->ven_fecha_compra}}">             
                        @error('ven_fecha_compra')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                    @enderror           
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >fecha de vencimiento:</label>
                        <input type="date" name="ven_fecha_vence" class="form-control" placeholder="fecha de vencimiento" value="{{$ventas->ven_fecha_vence}}">
                        @error('ven_fecha_vence')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Precio:</label>
                        <input type="number" name="ven_precio" class="form-control" placeholder="Precio" value="{{$ventas->ven_precio}}">
                        @error('ven_precio')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Pin:</label>
                        <input type="number" name="ven_pin" class="form-control" placeholder="Pin" value="{{$ventas->ven_pin}}">
                        @error('ven_pin')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Nota:</label>
                        <input type="text" name="ven_notas" class="form-control" placeholder="Anotacion" value="{{$ventas->ven_notas}}">
                        @error('ven_notas')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="number" name="tbl_perfiles_per_id" class="form-control" placeholder="Perfil" value="{{ $ventas->per_id }}" hidden>
                        @error('tbl_perfiles_per_id')
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

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contenido del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body table-responsive p-2">
                            <table id="datatables_cliente" class="display shadow-sm text-capitalize">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Notas</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->cli_id }}</td>
                                            <td>{{ $cliente->cli_nombre }}</td>
                                            <td>{{ $cliente->cli_apellido }}</td>
                                            <td>{{ $cliente->cli_telefono }}</td>
                                            <td>{{ $cliente->cli_correo }}</td>
                                            <td>{{ $cliente->cli_notas }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm mr-2 btn-seleccionar"
                                                        data-id="{{ $cliente->cli_id }}"
                                                        style="width: 30px; height: 30px; border-radius: 50%">
                                                    Seleccionar
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        const dataTableOpciones = {
            "order": [[ 0, 'asc' ]],
        }

        $(document).ready(function () {
            // Agrega el evento show.bs.modal cuando el modal se muestra
            $('#exampleModal').on('shown.bs.modal', function () {
                $('#datatables_cliente').DataTable(dataTableOpciones);
            });

            let clienteSeleccionadoInput = $('#clienteSeleccionado');
            let clienteIdInput = $('#clienteId');

            // Agrega el evento clic para los botones de selección
            $('.btn-seleccionar').on('click', function() {
                // Obtiene la información del cliente seleccionado
                let clienteNombre = $(this).closest('tr').find('td:eq(1)').text(); // Ajusta el índice según la posición del nombre en tu tabla
                let clienteId = $(this).data('id');

                // Muestra el nombre del cliente seleccionado y actualiza el input oculto con el ID
                clienteSeleccionadoInput.val(clienteNombre);
                clienteIdInput.val(clienteId);

                // Cierra el modal
                $('#exampleModal').modal('hide');
            });

            // Restablece los valores al cerrar el modal
            $('#exampleModal').on('hidden.bs.modal', function () {

            });
        });
    </script>

@stop
